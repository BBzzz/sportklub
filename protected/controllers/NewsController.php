<?php

class NewsController extends SController
{
	public $layout='/layouts/column2';

	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('News', array(
    	'criteria'=>array(
				'condition'=>'lang = "'.Yii::app()->language.'"',
        'order'=>'n_date DESC, id DESC',
    	),
		)); 
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
}
