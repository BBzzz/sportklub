<?php

class Personal extends CActiveRecord
{

	public function tableName()
	{
		return 'tbl_personal';
	}

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, f_name, p_function', 'required'),
			array('p_function, active', 'numerical', 'integerOnly'=>true),
			array('name, f_name', 'length', 'max'=>20),
			array('b_place, photo', 'length', 'max'=>50),
			array('b_date', 'safe'),
			array('photo', 
						'file',
						'types'=>'jpg, gif, png', 
						'allowEmpty'=>true, 
						'on'=>'update'
			),
		);
	}

	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'position'=>array(self::BELONGS_TO, 'PersFunction', 'p_function'),
			'player' => array(self::HAS_ONE, 'Player', 'pers_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => Yii::t('default','Név'),
			'fullname' => Yii::t('default','Név'),
			'f_name' => 'Keresztnév',
			'p_function' => 'Funkció',
			'pfunction' => 'Funkció',
			'b_place' => 'Születési hely',
			'b_date' => 'Születési dátum',
			'cv' => 'CV',
			'photo' => 'Fotó',
			'active' => 'Aktív',
		);
	}

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('f_name',$this->f_name,true);
		$criteria->compare('p_function',$this->p_function);
		$criteria->compare('b_place',$this->b_place,true);
		$criteria->compare('b_date',$this->b_date,true);
		$criteria->compare('cv',$this->cv,true);
		$criteria->compare('photo',$this->photo,true);
		$criteria->compare('active',$this->active);
		$criteria->order='p_function, active DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getFunctions()
	{
		$optionsarray = array ();
		$funcs = PersFunction::model()->findAll();
		foreach ($funcs as $func)
			$optionsarray[$func->id] = $func->description;
		return $optionsarray;
	}

	public function getPFunction()
	{
		$f_desc = "";
		$func = PersFunction::model()->findByPk($this->p_function);
		if ($func)
			$f_desc = $func->description;
		return $f_desc;
	}

	public function getFullName()
	{
		return $this->name.' '.$this->f_name;
	}
}
