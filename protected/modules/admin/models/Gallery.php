<?php
class Gallery extends CActiveRecord
{
	public function tableName()
	{
		return 'tbl_gallery';
	}

	public function rules()
	{
		return array(
			array('page_id, title', 'required'),
			array('page_id', 'length', 'max'=>11),
			array('title, description', 'length', 'max'=>256),
			array('page_id, title, description', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'page' => array(self::BELONGS_TO, 'Page', 'page_id'),
			'images' => array(self::HAS_MANY, 'Image', 'gallery_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'page_id' => 'Oldalhoz csatolva',
			'title' => 'Cím',
			'description' => 'Leírás',
		);
	}

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('page_id',$this->page_id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getPages()
	{
		$optionsarray = array ();
		$pages = Page::model()->findAll();
		foreach ($pages as $page)
			$optionsarray[$page->id] = $page->title;
		return $optionsarray;
	}
}
