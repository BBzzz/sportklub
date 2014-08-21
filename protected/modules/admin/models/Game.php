<?php

class Game extends CActiveRecord
{

	public function tableName()
	{
		return 'tbl_game';
	}

	public function rules()
	{
		return array(
			array('ext_id, g_date, g_time, team_a, team_h, season, place', 'required'),
			array('team_a, team_h, g_cat, score_a, score_h, g_state', 'numerical', 'integerOnly'=>true),
			array('place', 'length', 'max'=>100),
		);
	}

	public function relations()
	{
		return array(
			'gametype' => array(self::BELONGS_TO, 'GameType', 'g_cat'),
			'a_team' => array(self::BELONGS_TO, 'Team', 'team_a'),
			'h_team' => array(self::BELONGS_TO, 'Team', 'team_h'),
			'recap' => array(self::HAS_ONE, 'Recap', 'g_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'ext_id' => 'Külső hivatkozás',
			'g_date' => 'Dátum',
			'g_time' => 'Időpont',
			'team_a' => 'Vendégek',
			'team_h' => 'Hazaiak',
			'g_cat' => 'Mérkőzés típusa',
			'score' => 'Eredmény',
			'score_h' => 'Hazai gólok száma',
			'score_a' => 'Vendég gólok száma',
			'g_state' => 'Állapot',
			'season' => 'Szezon',
			'place' => 'Helyszín',
		);
	}

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('g_date',$this->g_date,true);
		$criteria->compare('g_time',$this->g_time,true);
		$criteria->compare('team_a',$this->team_a);
		$criteria->compare('team_h',$this->team_h);
		$criteria->compare('g_cat',$this->g_cat);
		$criteria->compare('score_a',$this->score_a);
		$criteria->compare('score_h',$this->score_h);
		$criteria->compare('g_state','0');
		$criteria->compare('season',$this->season,true);
		$criteria->compare('place',$this->place,true);
		$criteria->order = 'g_date';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getTitle()
	{
		return $this->h_team->short_name." - ".$this->a_team->short_name."/".$this->g_date;
	}

	public function getScore()
	{
		return $this->score_h." : ".$this->score_a;
	}

	public function getTeams()
	{
		$dataProvider=new CActiveDataProvider('Team', array());
		$optionsarray = CHtml::listData($dataProvider->getData(),'id', 'name');
		return $optionsarray;
	}

	public function getGameType()
	{
		$dataProvider=new CActiveDataProvider('GameType', array());
		$optionsarray = CHtml::listData($dataProvider->getData(),'id', 'description');
		return $optionsarray;
	}
}
