<?php

class m141208_065243_rbac_default_assign extends CDbMigration
{
    /*
	public function up()
	{
	}

	public function down()
	{
		echo "m141208_065243_rbac_default_assign does not support migration down.\n";
		return false;
	}
*/
	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
            $auth= yii::app()->authManager;
            $auth->createRole('root');
            $auth->createRole('admin');
            $auth->assign('root',1);
            
	}

	public function safeDown()
	{
            $auth= yii::app()->authManager;
            $auth->revoke('root',1);
            $auth->removeAuthItem("root");
            $auth->removeAuthItem("admin");
	}
}