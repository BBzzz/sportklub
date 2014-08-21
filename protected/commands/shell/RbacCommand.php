<?php
class RbacCommand extends CConsoleCommand
{
	private $_authManager;
	public function getHelp()
	{
		return <<<EOD

USAGE
 rbac
DESCRIPTION
 This command generates an initial RBAC authorization hierarchy.
EOD;
	}
	/**
	* Execute the action.
	* @param array command line parameters specific for this command
	*/
	public function run($args)
	{
		//ensure that an authManager is defined as this is mandatory for creating an auth heirarchy
		if(($this->_authManager=Yii::app()->authManager)===null)
		{
			echo "Error: an authorization manager, named 'authManager' must be configured to use this command.\n";
			echo "If you already added 'authManager' component in application configuration,\n";
			echo "please quit and re-enter the yiic shell.\n";
			return;
		}
		//provide the oportunity for the use to abort the request
		echo "This command will create the roles necessary for the application.\n";
		echo "Would you like to continue? [Yes|No] ";
		//check the input from the user and continue if they indicated yes to the above question
		if(!strncasecmp(trim(fgets(STDIN)),'y',1))
		{
			//first we need to remove all operations, roles, child relationship and assignments
			$this->_authManager->clearAll();
			//create the lowest level operations for users
			$this->_authManager->createOperation("createUser","create a new user");
			$this->_authManager->createOperation("readUser","read user profile information");
			$this->_authManager->createOperation("updateUser","update a users information");
			$this->_authManager->createOperation("deleteUser","remove a user from a project");
			//create the lowest level operations for documents
			$this->_authManager->createOperation("createDocuments","create a new document");
			$this->_authManager->createOperation("readDocuments","read document information");
			$this->_authManager->createOperation("updateDocuments","update document information");
			$this->_authManager->createOperation("deleteDocuments","delete a document");
			//create the lowest level operations for clients
			$this->_authManager->createOperation("createClients","create a new document");
			$this->_authManager->createOperation("readClients","read document information");
			$this->_authManager->createOperation("updateClients","update document information");
			$this->_authManager->createOperation("deleteClients","delete a document");
			//create the lowest level operations for settings
			$this->_authManager->createOperation("createSettings","create a new document");
			$this->_authManager->createOperation("readSettings","read document information");
			$this->_authManager->createOperation("updateSettings","update document information");
			$this->_authManager->createOperation("deleteSettings","delete a document");
			//create the lowest level operations for base data
			$this->_authManager->createOperation("createBaseData","create a new document");
			$this->_authManager->createOperation("readBaseData","read document information");
			$this->_authManager->createOperation("updateBaseData","update document information");
			$this->_authManager->createOperation("deleteBaseData","delete a document");
			//create the client role, and add the appropriate permissions
			$role=$this->_authManager->createRole("user");
			$role->addChild("readUser");
			$role->addChild("updateUser");
			$role->addChild("createDocuments");
			$role->addChild("readDocuments");
			$role->addChild("updateDocuments");
			$role->addChild("deleteDocuments");
			//create the contabil role, and add the appropriate permissions
			$role=$this->_authManager->createRole("editor");
			$role->addChild("user");
			$role->addChild("createClients");
			$role->addChild("readClients");
			$role->addChild("updateClients");
			$role->addChild("deleteClients");
			$role->addChild("createBaseData");
			$role->addChild("readBaseData");
			$role->addChild("updateBaseData");
			$role->addChild("deleteBaseData");
			//create the supercontabil role, and add the appropriate permissions
			$role=$this->_authManager->createRole("admin");
			$role->addChild("user");
			$role->addChild("editor");
			//create the administrator role, and add the appropriate permissions
			$role=$this->_authManager->createRole("supervisor");
			$role->addChild("user");
			$role->addChild("editor");
			$role->addChild("admin");
			$role->addChild("createSettings");
			$role->addChild("readSettings");
			$role->addChild("updateSettings");
			$role->addChild("deleteSettings");
			//ensure we have one admin in the system (force it to be user id #1)
			$this->_authManager->assign("supervisor",1);
			//provide a message indicating success
			echo "Authorization hierarchy successfully generated.";
		}
	}
}
