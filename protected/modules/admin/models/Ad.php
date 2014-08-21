<?php
class Ad extends CActiveRecord
{
	public function tableName()
	{
		return 'tbl_ad';
	}

	public function rules()
	{
		return array(
			array('owner, banner', 'required'),
			array('ad_status, tot_app, apps', 'numerical', 'integerOnly'=>true),
			array('owner, banner, web', 'length', 'max'=>100),
			array('no_visits', 'length', 'max'=>10),
			array('ad_type', 'length', 'max'=>1),
			array('script, date_from, date_to', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, owner, banner, script, web, date_from, date_to, ad_status, tot_app, apps, no_visits, ad_type', 'safe', 'on'=>'search'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'owner' => 'Owner',
			'banner' => 'Banner',
			'script' => 'Script',
			'web' => 'Web',
			'date_from' => 'Date From',
			'date_to' => 'Date To',
			'ad_status' => 'Ad Status',
			'tot_app' => 'Tot App',
			'apps' => 'Apps',
			'no_visits' => 'No Visits',
			'ad_type' => 'Ad Type',
		);
	}

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('owner',$this->owner,true);
		$criteria->compare('banner',$this->banner,true);
		$criteria->compare('script',$this->script,true);
		$criteria->compare('web',$this->web,true);
		$criteria->compare('date_from',$this->date_from,true);
		$criteria->compare('date_to',$this->date_to,true);
		$criteria->compare('ad_status',$this->ad_status);
		$criteria->compare('tot_app',$this->tot_app);
		$criteria->compare('apps',$this->apps);
		$criteria->compare('no_visits',$this->no_visits,true);
		$criteria->compare('ad_type',$this->ad_type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
