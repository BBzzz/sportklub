<?php

class PersonalController extends SController
{
	public $layout='/layouts/column2';

	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionStaff()
	{
		$dataProvider=new CActiveDataProvider('Personal', array(
    	'criteria'=>array(
        	'condition'=>'p_function<>1 AND active=1',
    	),
			'pagination'=>false
		));
		$this->render('staff',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionTeam()
	{
		$dataProvider=new CActiveDataProvider('Player',array(
       'criteria'=>array(
          'with'=>array('person'=>array('joinType'=>'INNER JOIN')),
					'condition'=>'p_function=1 AND active=1',
          'order'=>'jersey_no',
        ),
			 'pagination'=>false
     ));
		
		$this->render('team',array(
			'dataProvider'=>$dataProvider,
		));
	}


	public function loadModel($id)
	{
		$model=Personal::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}
