<?php

class MainPage extends CActiveRecord
{
	public $type_arr;

	public function tableName()
	{
		return 'tbl_main_page';
	}

/*	public function init()
	{
		$type_arr = array("Rólunk","Elérhetőség");
	}*/

	public function rules()
	{
		return array(
			array('title, content, lang, type', 'required'),
			array('lang', 'length', 'max'=>2),
			array('title', 'length', 'max'=>256),
			array('id, lang, title, content', 'safe', 'on'=>'search'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'type'=>'Típus',
			'typedesc'=>'Típus',
			'title' => 'Cím',
			'content' => 'Tartalom',
			'lang' => 'Nyelv',
		);
	}

	public function search()
	{

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('lang',$this->lang,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getType()
	{
		$type_arr = array("Rólunk","Elérhetőség");
		return $type_arr;
	}

	public function getTypeDesc()
	{
		$type_arr = array("Rólunk","Elérhetőség");
		return $type_arr[0];
	}	
}
