<?php

class PersonalController extends Controller
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
				'actions'=>array('create','update','view','admin','delete','activate','getplayers'),
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
		$model=new Personal;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Personal']))
		{
			$model->attributes=$_POST['Personal'];
			$uploadedFile = $this->createUpFile($model,'photo');
			if($model->save()){
				if (!empty($uploadedFile))
					$this->saveUpFile($uploadedFile,$model->photo);
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

		if(isset($_POST['Personal']))
		{
			$model->attributes=$_POST['Personal'];
			$uploadedFile = $this->createUpFile($model,'photo');
	
			if($model->save()){
				if (!empty($uploadedFile))
					$this->saveUpFile($uploadedFile,$model->photo);
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionDelete($id)
	{
		$model = $this->loadModel($id);
		if ($model->player)
			Player::model()->deleteByPk($model->id);
		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actiongetPlayers()
	{
		$response = $this->runJKBApi('team.players',array('tid'=>$this->getActualData('team_id')));
		if (!$response->error){
			Personal::model()->deleteAll('p_function = :func',array(':func' => 1));
			Player::model()->deleteAll();
			foreach($response->result as $player){
				$personal = new Personal;
			
				$personal->name = $player->ln;
				$personal->f_name = $player->fn;
				$personal->p_function = 1;
				$personal->nf = $player->nf;
				$personal->citizenship = $player->c;
				$personal->citizenship2 = $player->c2;
				$personal->b_place = $player->bp;
				$personal->b_date = $player->bd;
				$personal->save();

				$hplayer = new Player;

				$hplayer->pers_id = $personal->id;		
				$hplayer->ext_id = $player->pid;
				$hplayer->jersey_no = $player->n;
				$hplayer->position = $player->p;
				$hplayer->shoots = $player->hl;
				$hplayer->height = $player->h;
				$hplayer->weight = $player->w;
				$hplayer->save(false);
			}
		}
		$this->redirect('admin');
	}

	public function actionAdmin()
	{
		$model=new Personal('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Personal']))
			$model->attributes=$_GET['Personal'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function loadModel($id)
	{
		$model=Personal::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='personal-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionActivate()
	{
		$id = $_POST['sel'];
		$model=$this->loadModel($id);
		$model->updateByPk($id, array('active'=>$model->active ? 0 : 1));
	}
}
