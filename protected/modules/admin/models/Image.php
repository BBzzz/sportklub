<?php
class Image extends CActiveRecord
{
	public function tableName()
	{
		return 'tbl_image';
	}

	public function rules()
	{
		return array(
			array('gallery_id, name, title', 'required'),
			array('gallery_id', 'length', 'max'=>11),
			array('title, description', 'length', 'max'=>256),
			array('name', 
						'file',
						'types'=>'jpg, gif, png', 
						'allowEmpty'=>true, 
						'on'=>'update'
			),
			array('name', 
						'file',
						'maxSize'=>1024 * 1024 * 50, // 50MB
            'tooLarge'=>'A feltölteni kívánt fájl nagyobb mint 50MB. Kérjük csökkentse a méretét mielőtt újból próbálkozna!',
			),
			array('title, description', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'gallery' => array(self::BELONGS_TO, 'Gallery', 'gallery_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'title' => 'Cím',
			'description' => 'Leírás',
			'name' => 'Fájlnév',
		);
	}

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('gallery_id',$this->gallery_id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

/*	public function getImageUrl()
	{
    return Yii::app()->baseUrl."/photos/".$this->name;
	}*/
}
