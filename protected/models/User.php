<?php

class User extends SActiveRecord
{
	public $password_repeat;
	
	public function tableName()
	{
		return 'tbl_user';
	}

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, username, password', 'required'),
			array('create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
			array('email, username, password', 'length', 'max'=>256),
			array('email, username', 'unique'),
			array('email', 'email'),
			array('password_repeat', 'required', 'on'=>'create'),
			array('password','compare', 'on'=>'create'),
			array('password_repeat', 'safe', 'on'=>'create'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'email' => 'E-mail cím',
			'username' => 'Felhasználónév',
			'password' => 'Jelszó',
			'password_repeat' => 'Megismételt jelszó',
			'last_login_time' => 'Legutóbbi bejelentkezés ideje',
		);
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function associateUserToRole($role, $userId)
	{
		$sql = "INSERT INTO AuthAssignment (itemname, userid) VALUES (:role, :userId)";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindValue(":role", $role, PDO::PARAM_INT);
		$command->bindValue(":userId", $userId, PDO::PARAM_INT);
		return $command->execute();
	}

	protected function afterValidate()
	{
		parent::afterValidate();
		if ($this->getScenario() == 'insert')
			$this->password = $this->encrypt($this->password);
	}

	public function encrypt($value)
	{
		return md5($value);
	}
}
