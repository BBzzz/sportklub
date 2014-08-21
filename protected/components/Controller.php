<?php

class Controller extends CController
{
	public $layout='/layouts/column1';
	public $menu=array();
	public $breadcrumbs=array();

	private static $menuTree = array();
 
  public static function getMenuTree($lang)
	{
  	if (empty(self::$menuTree)){
    	$rows = Menu::model()->findAll('parent_id = 0');
     	foreach ($rows as $item)
				if ($item->lang == $lang)
      		self::$menuTree[] = self::getMenuItems($item);
    }
    return self::$menuTree;
  }
 
  private static function getMenuItems($modelRow)
	{
 		if (!$modelRow)
    	return;
 
    if (isset($modelRow->children)){
    	$chump = self::getMenuItems($modelRow->children);
			
			if ($modelRow->action){
				$isActive = strpos(Yii::app()->request->requestUri, $modelRow->action) !== false;
				$url = Yii::app()->createUrl($modelRow->action);
			}elseif ($modelRow->page){
				$isActive = strpos(Yii::app()->request->requestUri, $modelRow->page->slug) !== false;
				$url = Yii::app()->createUrl('page/view', array('slug' => $modelRow->page->slug));
			}
			else {
				$isActive = false;
				$url = "#";
			}
			
			if ($isActive)
					$child_class="open";
			else $child_class="closed";

			if ($chump != null)
      	$res = array('label' => $modelRow->title, 'items' => $chump, 'url' => '#','active'=>$isActive, 'itemOptions'=>array('class'=>$child_class));
      else
        $res = array('label' => $modelRow->title, 'url' =>$url,'active'=>$isActive);
      return $res;
    } else{
    	if (is_array($modelRow)){
      	$arr = array();
        foreach ($modelRow as $leaves) {
        	$arr[] = self::getMenuItems($leaves);
        }
        return $arr;
      } else					
        	return array('label' => $modelRow->title, 'url' => '#',/*'active'=>$isActive*/);
    }
  }

	public function sendEmail($name,$from_addr,$subject,$content,$to_admin = true)
	{
		if ($to_admin) {
			$to = Yii::app()->params['adminEmail'];
			$from = $from_addr;
		}else{
			$to = $from_addr;
			$from = Yii::app()->params['adminEmail'];
		}

		$headers = "From: $name <{$from}>\r\n".
							"Reply-To: {$from}\r\n".
							"MIME-Version: 1.0\r\n".
							"Content-type: text/plain; charset=UTF-8";

		mail($to,$subject,$content,$headers);
	}

	function init()
  {
  	parent::init();
    Yii::app()->setLanguage(isset(Yii::app()->session['lang']) ? Yii::app()->session['lang'] : 'hu');
  }

	public function normalize($string)
	{
		// remove whitespace, leaving only a single space between words. 
    $string = preg_replace('/\s+/', '_', $string);
    // flick diacritics off of their letters
    $string = preg_replace('~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml|caron);~i', '$1', htmlentities($string, ENT_COMPAT, 'UTF-8'));  
		//replace special hungarian and romanian chars		
		$string = str_replace(array('ű', 'ő', '-'), array('u', 'o','_'), $string);
		// lower case 
   	$string = strtolower($string);
    return $string;
	}

	public function createUpFile($model,$field_name)
	{
		$rnd = rand(0,9999);  // generate random number between 0-9999
 		$uploadedFile = CUploadedFile::getInstance($model,$field_name);
		if ($uploadedFile !== null) {
      	$fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
      	$model->$field_name = $fileName;
		}
		return $uploadedFile;
	}

	public function saveUpFile($uploadedFile,$fileName,$old_file='')
	{
		$path = Yii::app()->basePath.'/../photos/';
		if ($old_file)
			if (file_exists($path.$old_file))
				unlink($path.$old_file);
		$uploadedFile->saveAs($path.$fileName);
	}

	public function createPage($denom,$content,$short_d,$date,$lang)
	{
		$page=new Page;
		$page->menu_id = 0;
		$page->generated = 1;
		$page->title = $denom;
		$page->slug=$this->normalize($denom);
		$page->content = $content;
		$page->short_desc = $short_d;
		$page->create_time = $date;
		$page->lang = $lang;
		$page->save();
		return $page;
	}

	public function modifyPage($id,$denom,$content)
	{
		$page=Page::model()->findByPk($id);
		if($page->title != $denom){
			Page::model()->updateByPk($id, array('title'=>$denom));
			$slug=$this->normalize($denom);
			Page::model()->updateByPk($id, array('slug'=>$slug));
		}
		if($page->content != $content)
			Page::model()->updateByPk($id, array('content'=>$content));
	}

	public function getActualData($field)
	{
		$params=Params::model()->findByAttributes(array('current' => 1));
		if ($params)
		return $params->$field;
	}

	public function runJKBApi($method,$params,$type = 0/*no output*/)
	{
		$key = "550da7661f578f9751be1f58c058aaff0b21c398";
		$secret = "1ec48566eccb6d2614ce10bfc5951ac78bd00466";

		$requestId = 'HSC'; // arbitrary number or string id

		$request = array(
  		'key' => $key,
  		'method' => $method,
  		'params' => array($params),
  		'id' => $requestId
		);

		$requestBody = json_encode($request);

		$signature = sha1($secret.':'.$requestBody);
		$requestUrl = 'http://jegkorongblog.hu/api.php?sig='.$signature;

		$ch = curl_init($requestUrl); 
		curl_setopt_array($ch, array(
		  CURLOPT_POST => 1, 
		  CURLOPT_RETURNTRANSFER => 1, 
		  CURLOPT_HTTPHEADER => array(
		    "Content-Type: application/json", 
		    "Cache-Control: max-age=0", 
		    "User-Agent: Jegkorongblog.API (CURL)"
	  	),
	  	CURLOPT_POSTFIELDS => $requestBody
		));
		$response = curl_exec($ch); 
		curl_close($ch);  

		$responseObj = json_decode($response);
		if(empty($responseObj)) {
		return false;
		}		

/*		if ($type){
			print_r($responseObj);
		}else*/
			return $responseObj;
	}
}
