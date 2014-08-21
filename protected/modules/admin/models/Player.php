<?php

class Player extends CActiveRecord
{
	public function tableName()
	{
		return 'tbl_player';
	}

	public function rules()
	{
		return array(
			array('pers_id, jersey_no, position, height, weight', 'required'),
			array('jersey_no, height, weight', 'numerical', 'integerOnly'=>true),
			array('pers_id', 'length', 'max'=>11),
			array('position', 'length', 'max'=>2),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pers_id, jersey_no, position, height, weight', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'person' => array(self::HAS_ONE, 'Personal', 'id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'jersey_no' => Yii::t('default','Mez szám'),
			'position' => Yii::t('default','Pozició'),
			'height' => Yii::t('default','Magasság'),
			'weight' => Yii::t('default','Testsúly'),
			'shoots'=> Yii::t('default','Botfogás')
		);
	}

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('pers_id',$this->pers_id,true);
		$criteria->compare('jersey_no',$this->jersey_no);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('height',$this->height);
		$criteria->compare('weight',$this->weight);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
