<?php

/**
 * This is the model class for table "tbl_team".
 *
 * The followings are the available columns in table 'tbl_team':
 * @property string $id
 * @property string $name
 * @property string $off_name
 * @property string $short_name
 * @property string $logo
 * @property string $link
 * @property string $place
 * @property integer $participant
 */
class Team extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_team';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, short_name, place', 'required'),
			array('participant', 'numerical', 'integerOnly'=>true),
			array('name, off_name, place', 'length', 'max'=>100),
			array('short_name', 'length', 'max'=>3),
			array('logo, link', 'length', 'max'=>50),
			array('logo', 
						'file',
						'types'=>'jpg, gif, png', 
						'allowEmpty'=>true, 
						'on'=>'update'
			),
/*			array('logo', 
						'file',
						'maxSize'=>1024 * 1024 * 50, // 50MB
            'tooLarge'=>'The file was larger than 50MB. Please upload a smaller file.',
			),*/
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'name' => 'Név',
			'off_name' => 'Hivatalos név',
			'short_name' => 'Rövidítés',
			'logo' => 'Logó',
			'link' => 'Hivatalos honlap',
			'place' => 'Hol játsza a mérkőzéseit',
			'participant' => 'Részt vesz az aktuális szezonban?',
		);
	}

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('off_name',$this->off_name,true);
		$criteria->compare('short_name',$this->short_name,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('place',$this->place,true);
		$criteria->compare('participant',$this->participant);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
