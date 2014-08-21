<?php
abstract class PActiveRecord extends CActiveRecord
{
	public $denomination;
	public $content;

	public function relations()
	{
		return array(
			'page' => array(self::BELONGS_TO, 'Page', 'page_id'),
		);
	}
}
