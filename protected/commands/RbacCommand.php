<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class RbacCommand extends CConsoleCommand
{
   
    private $_authManager;
 
    
	public function getHelp()
	{
		
		$description = "DESCRIPTION\n";
		$description .= '    '."This command generates an initial RBAC authorization hierarchy.\n";
		return parent::getHelp() . $description;
	}
 
	
	/**
	 * The default action - create the RBAC structure.
	 */
	public function actionIndex()
	{
		 
		$this->ensureAuthManagerDefined();
		
		//provide the oportunity for the use to abort the request
		$message = "This command will create three roles: Owner, Member, and Reader\n";
		$message .= " and the following permissions:\n";
		$message .= "create, read, update and delete \n";
		$message .= "create, read, update and delete project\n";
		$message .= "create, read, update and delete issue\n";
		$message .= "Would you like to continue?";
	    
	    //check the input from the user and continue if 
		//they indicated yes to the above question
	    if($this->confirm($message)) 
		{
		     //first we need to remove all operations, 
			 //roles, child relationship and assignments
			 $this->_authManager->clearAll();
 
			 //create the lowest level operations for users
			 $this->_authManager->createOperation(
				"createUser",
				"create a new user"); 
			 $this->_authManager->createOperation(
				"readUser",
				"read user profile information"); 
			 $this->_authManager->createOperation(
				"updateUser",
				"update a users in-formation"); 
			 $this->_authManager->createOperation(
				"deleteUser",
				"remove a user from a project"); 
 
			 //create the lowest level operations for projects
			 $this->_authManager->createOperation(
				"createCaracteristica",
				"create a new project"); 
			 $this->_authManager->createOperation(
				"readCaracteristica",
				"read project information"); 
	 		 $this->_authManager->createOperation(
				"updateCaracteristica",
				"update project information"); 
			 $this->_authManager->createOperation(
				"deleteCaracteristica",
				"delete a project"); 
 
			 //create the lowest level operations for issues
			 $this->_authManager->createOperation(
				"createPresentacion",
				"create a new issue"); 
			 $this->_authManager->createOperation(
				"readPresentacion",
				"read issue information"); 
			 $this->_authManager->createOperation(
				"updatePresentacion",
				"update issue information"); 
			 $this->_authManager->createOperation(
				"deletePresentacion",
				"delete an Presentacion from a project");     
 
			 //create the reader role and add the appropriate 
			 //permissions as children to this role
			 $role=$this->_authManager->createRole("reader"); 
			 $role->addChild("readUser");
			 $role->addChild("readCaracteristica"); 
			 $role->addChild("readPresentacion"); 
 
			 //create the member role, and add the appropriate 
			 //permissions, as well as the reader role itself, as children
			 $role=$this->_authManager->createRole("member"); 
			 $role->addChild("reader"); 
			 $role->addChild("createPresentacion"); 
			 $role->addChild("updatePresentacion"); 
			 $role->addChild("deletePresentacion"); 
 
			 //create the owner role, and add the appropriate permissions, 
			 //as well as both the reader and member roles as children
			 $role=$this->_authManager->createRole("owner"); 
			 $role->addChild("reader"); 
			 $role->addChild("member");    
			 $role->addChild("createUser"); 
			 $role->addChild("updateUser"); 
			 $role->addChild("deleteUser");  
			 $role->addChild("createCaracteristica"); 
			 $role->addChild("updateCaracteristica"); 
			 $role->addChild("deleteCaracteristica");	
		
		     //provide a message indicating success
		     echo "Authorization hierarchy successfully generated.\n";
        }
 		else
			echo "Operation cancelled.\n";
    }
 
	public function actionDelete()
	{
		$this->ensureAuthManagerDefined();
		$message = "This command will clear all RBAC definitions.\n";
		$message .= "Would you like to continue?";
	    //check the input from the user and continue if they indicated 
	    //yes to the above question
	    if($this->confirm($message)) 
	    {
			$this->_authManager->clearAll();
			echo "Authorization hierarchy removed.\n";
		}
		else
			echo "Delete operation cancelled.\n";
			
	}
	
	protected function ensureAuthManagerDefined()
	{
		//ensure that an authManager is defined as this is mandatory for creating an auth heirarchy
		if(($this->_authManager=Yii::app()->authManager)===null)
		{
		    $message = "Error: an authorization manager, named 'authManager' must be con-figured to use this command.";
			$this->usageError($message);
		}
	}
}
?>
