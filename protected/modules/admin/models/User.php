<?php

class User extends CActiveRecord
{
	public function tableName()
	{
		return 'tbl_user';
	}


	public function rules()
	{
		return array(
			array('email, username, password', 'required'),
			array('create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
			array('email, username, password', 'length', 'max'=>256),
			array('last_login_time, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, email, username, password, last_login_time, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
		);
	}

	public function attributeLabels()
	{
		return array(
			'email' => 'E-mail cím',
			'username' => 'Felhasználónév',
			'password' => 'Jelszó',
			'last_login_time' => 'Legutóbbi belépés ideje',
			'userrole' => 'Jogosultsági szint',
		);
	}

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('last_login_time',$this->last_login_time,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function associateUserToRole($role, $userId)
	{
		$this->removeUserFromAuth($userId);
		$sql = "INSERT INTO AuthAssignment (itemname, userid) VALUES (:role, :userId)";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindValue(":role", $role, PDO::PARAM_INT);
		$command->bindValue(":userId", $userId, PDO::PARAM_INT);
		return $command->execute();
	}
	/**
	* removes an association between the project, the user and theuser's role within the project
*/
	public function removeUserFromAuth($userId)
	{
		$sql = "DELETE FROM AuthAssignment WHERE userid=:userId";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindValue(":userId", $userId, PDO::PARAM_INT);
		return $command->execute();
	}
	/**
	* Returns an array of available roles in which a user can be placed when being added to a project
	*/
	public static function getUserRoleOptions()
	{
		return CHtml::listData(Yii::app()->authManager->getRoles(),'name', 'name');
	}

	public function getUserRole()
	{
		$role = "";
		$arrayAuthRoleItems = Yii::app()->authManager->getRoles($this->id);
		$arrayKeys = array_keys($arrayAuthRoleItems);
		if ($arrayKeys)
			$role = strtolower ($arrayKeys[0]);
		return $role;
	}
}
