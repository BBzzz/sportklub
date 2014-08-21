<?php

/**
 * This is the model class for table "tbl_score".
 *
 * The followings are the available columns in table 'tbl_score':
 * @property integer $game_id
 * @property integer $q_no
 * @property integer $score_a
 * @property integer $score_h
 */
class Score extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_score';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('game_id, q_no', 'required'),
			array('game_id, q_no, score_a, score_h', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('game_id, q_no, score_a, score_h', 'safe', 'on'=>'search'),
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
			'game_id' => 'Game',
			'q_no' => 'Q No',
			'score_a' => 'Score A',
			'score_h' => 'Score H',
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

		$criteria->compare('game_id',$this->game_id);
		$criteria->compare('q_no',$this->q_no);
		$criteria->compare('score_a',$this->score_a);
		$criteria->compare('score_h',$this->score_h);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Score the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
