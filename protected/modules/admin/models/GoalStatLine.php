<?php

/**
 * This is the model class for table "tbl_goal_stat_line".
 *
 * The followings are the available columns in table 'tbl_goal_stat_line':
 * @property string $id
 * @property string $e_type
 * @property string $pl_id
 * @property string $t_id
 * @property string $pl_name
 */
class GoalStatLine extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_goal_stat_line';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, e_type, pl_name', 'required'),
			array('id, pl_id, t_id', 'length', 'max'=>11),
			array('e_type', 'length', 'max'=>3),
			array('pl_name', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, e_type, pl_id, t_id, pl_name', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'e_type' => 'E Type',
			'pl_id' => 'Pl',
			't_id' => 'T',
			'pl_name' => 'Pl Name',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('e_type',$this->e_type,true);
		$criteria->compare('pl_id',$this->pl_id,true);
		$criteria->compare('t_id',$this->t_id,true);
		$criteria->compare('pl_name',$this->pl_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GoalStatLine the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
