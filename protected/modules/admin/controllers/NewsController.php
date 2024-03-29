<?php

class NewsController extends Controller
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
		$model=new News;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['News']))
		{
			$model->attributes=$_POST['News'];
			$model->lang = Yii::app()->params->languages[$model->lang];
			$page=$this->createPage($model->denomination,$model->content,$model->short_desc,$model->n_date,$model->lang);
			$model->page_id = $page->id;
			$uploadedFile = $this->createUpFile($model,'photo');
			if($model->save()){
				if (!empty($uploadedFile)) 
					$this->saveUpFile($uploadedFile,$model->photo);
				$this->redirect(array('view','id'=>$model->id));
			} else $page->delete();
		}
		$model->n_date = date("Y-m-d",strtotime("now"));
		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['News']))
		{
			$_POST['News']['photo'] = $model->photo;
			$model->attributes=$_POST['News'];
			$model->lang = Yii::app()->params->languages[$model->lang];
			
			$uploadedFile = $this->createUpFile($model,'photo');
	
			if($model->save()){
				if ($model->denomination != $model->page->title || $model->content != $model->page->content)
					$this->modifyPage($model->page_id,$model->denomination,$model->content);
				if (!empty($uploadedFile)) 
					$this->saveUpFile($uploadedFile,$model->photo);
				$this->redirect(array('view','id'=>$model->id));
			}
		}
		$model->denomination = $model->page->title;
		$model->content = $model->page->content;
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
		$dataProvider=new CActiveDataProvider('News');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionAdmin()
	{
		$model=new News('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['News']))
			$model->attributes=$_GET['News'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function loadModel($id)
	{
		$model=News::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='news-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
