<?php

class PersFunction extends CActiveRecord
{

	public function tableName()
	{
		return 'tbl_pers_function';
	}

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('description', 'required'),
			array('description', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, description', 'safe', 'on'=>'search'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'description' => 'Leírás',
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
