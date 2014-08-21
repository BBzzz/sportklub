<?php
class News extends PActiveRecord
{
	public function tableName()
	{
		return 'tbl_news';
	}

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('denomination, content, lang, n_date, short_desc', 'required'),
			array('lang', 'length', 'max'=>2),
			array('photo', 'length', 'max'=>50),
			array('source', 'safe'),
			array('photo', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true, 'on'=>'update'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'denomination' => 'Cím',
			'content' => 'Leírás',
			'lang' => 'Nyelv',
			'n_date' => 'Hír dátuma',
			'photo' => 'Fotó',
			'source' => 'Forrás',
			'short_desc' => 'Rövid leírás (kivonat)',
		);
	}

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('lang',$this->lang,true);
		$criteria->compare('n_date',$this->n_date,true);
		$criteria->compare('photo',$this->photo,true);
		$criteria->compare('source',$this->source,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
