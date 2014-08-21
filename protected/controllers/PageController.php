<?php

class PageController extends SController
{
	public $layout='/layouts/column2';

	public function actionView($slug)
	{
		$model=Page::model()->findByAttributes(array('slug'=>$slug));
		if ($model)
			$this->render('view',array(
				'model'=>$this->loadModel($model->id),
			));
	}

	public function loadModel($id)
	{
		$model=Page::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}
