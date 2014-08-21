<?php

class MenuController extends Controller
{
	public $layout='/layouts/column2';

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin','delete','view','ajaxfilltree'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionCreate($pid = 0)
	{
		$model=new Menu;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Menu']))
		{
			$model->attributes=$_POST['Menu'];
			$model->lang = Yii::app()->params->languages[$_POST['Menu']['lang']];
			$model->parent_id = $pid;
			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('create',array(
			'model'=>$model,
//			'pid'=>$pid,
		));
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Menu']))
		{
			$model->attributes=$_POST['Menu'];
			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Menu');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionAdmin()
	{
		$model=new Menu;
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Menu']))
			$model->attributes=$_GET['Menu'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function loadModel($id)
	{
		$model=Menu::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='menu-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionAjaxFillTree()
  {
        // accept only AJAX request (comment this when debugging)
/*        if (!Yii::app()->request->isAjaxRequest) {
            exit();
        }*/
        // parse the user input
        $parentId = 0;
        if (isset($_GET['root']) && $_GET['root'] !== 'source') {
            $parentId = (int) $_GET['root'];
        }
        // read the data (this could be in a model)
        $children = Yii::app()->db->createCommand(
            "SELECT m1.id, m1.title AS text, m2.id IS NOT NULL AS hasChildren "
            . "FROM tbl_menu AS m1 LEFT JOIN tbl_menu AS m2 ON m1.id=m2.parent_id "
            . "WHERE m1.parent_id <=> $parentId "
            . "GROUP BY m1.id ORDER BY m1.title ASC"
        )->queryAll();
        echo str_replace(
            '"hasChildren":"0"',
            '"hasChildren":false',
            CTreeView::saveDataAsJson($children)
        );
    }
}
