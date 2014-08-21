<?php

class Menu extends CActiveRecord
{
	public function tableName()
	{
		return 'tbl_menu';
	}

	public function rules()
	{
		return array(
			array('title, lang', 'required'),
			array('parent_id', 'length', 'max'=>11),
			array('title', 'length', 'max'=>50),
		);
	}

	public function relations()
	{
		return array(
			'page' => array(self::HAS_ONE, 'Page', 'menu_id'),
			'parent' => array(self::BELONGS_TO, 'Menu', 'parent_id'),
      'children' => array(self::HAS_MANY, 'Menu', 'parent_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'parent_id' => 'Szülő',
			'title' => 'Felirat',
			'lang' => 'Nyelv',
		);
	}

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('parent_id',0,true);
		$criteria->compare('title',$this->title,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
