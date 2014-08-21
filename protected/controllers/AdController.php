<?php

class AdController extends Controller
{
	public function loadModel($id)
	{
		$model=Ad::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function actionRedirect($id)
	{
		$model=$this->loadModel($id);
		$model->no_visits += 1;
		if ($model->save())
			$this->redirect('http://'.$model->web);
	}
}
