<?php

class AdController extends Controller
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
			array('allow',
				'actions'=>array('create','update','view','admin','delete'),
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

	public function actionCreate()
	{
		$model=new Ad;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Ad']))
		{
			$model->attributes=$_POST['Ad'];
			$model->date_from = date("Y-m-d",strtotime('now'));
			$uploadedFile = $this->createUpFile($model,'banner');
			if($model->save()){
				if (!empty($uploadedFile)) 
					$this->saveUpFile($uploadedFile,$model->banner);
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Ad']))
		{
			$model->attributes=$_POST['Ad'];
			if(isset($_POST['Ad']['banner']))
					$uploadedFile = $this->createUpFile($model,'banner');
			if($model->save()){
				if (!empty($uploadedFile)) 
					$this->saveUpFile($uploadedFile,$model->banner);
				$this->redirect(array('view','id'=>$model->id));
			}
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
		$dataProvider=new CActiveDataProvider('Ad');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionAdmin()
	{
		$model=new Ad('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Ad']))
			$model->attributes=$_GET['Ad'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function loadModel($id)
	{
		$model=Ad::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ad-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
