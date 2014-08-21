<?php

class GameType extends CActiveRecord
{

	public function tableName()
	{
		return 'tbl_game_type';
	}

	public function rules()
	{
		return array(
			array('description', 'required'),
			array('description', 'length', 'max'=>50),
		);
	}

	public function attributeLabels()
	{
		return array(
			'description' => 'Mérkőzés típus',
		);
	}

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
