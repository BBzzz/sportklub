<?php
class Page extends CActiveRecord
{
	public function tableName()
	{
		return 'tbl_page';
	}

	public function rules()
	{
		return array(
			array('menu_id, title, slug, content, short_desc', 'required'),
			array('menu_id', 'length', 'max'=>11),
			array('title, slug', 'length', 'max'=>256),
			array('menu_id, title, slug, content', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'menu' => array(self::BELONGS_TO, 'Menu', 'menu_id'),
			'news' => array(self::HAS_ONE, 'News', 'page_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'menu_id' => 'Menühöz csatolva',
			'title' => 'Cím',
			'slug' => 'Slug',
			'content' => 'Tartalom',
			'short_desc' => 'Rövid leírás (kivonat)',
		);
	}

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('menu_id',$this->menu_id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('content',$this->content,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getMenus()
	{
		$optionsarray = array ();
		$optionsarray[0] = 'aloldal';
		$menus = Menu::model()->findAll();
		foreach ($menus as $menu)
			$optionsarray[$menu->id] = $menu->title;
		return $optionsarray;
	}

	public function getMenu()
	{
		if ($this->menu)
			return $this->menu->title;
		else return 'aloldal';
	}
}
