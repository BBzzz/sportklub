<?php

class Recap extends PActiveRecord
{
	public function tableName()
	{
		return 'tbl_recap';
	}
	public function rules()
	{
		return array(
			array('author, short_desc', 'required'),
			array('author', 'length', 'max'=>100),
		); 
	}

	public function relations()
	{
		return array(
			'page' => array(self::BELONGS_TO, 'Page', 'page_id'),
			'game' => array(self::HAS_ONE, 'Game', 'id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'author' => 'Szerző',
			'denomination' => 'Cím',
			'content' => 'Leírás',
			'short_desc' => 'Rövid leírás (kivonat)',
		);
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
