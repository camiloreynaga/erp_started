<?php

class m141211_185832_tbls_moneda extends CDbMigration
{
    /*
	public function up()
	{
	}

	public function down()
	{
		echo "m141211_185832_tbls_moneda does not support migration down.\n";
		return false;
	}

	*/
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
            
            //tablas para Color
            $this->createTable('tbl_currency',array(
                   'id'=>'pk',
                   'currency'=>'varchar(50) UNIQUE NOT NULL',
                   'symbol'=>'varchar(5) NOT NULL' ,
                   'iso_code'=>'varchar(5) NOT NULL',
                   'create_time'=>'datetime DEFAULT NULL',
                   'create_user_id'=> 'int(11) DEFAULT NULL',
                   'update_time'=>'datetime DEFAULT NULL',
                   'update_user_id'=>'int(11) DEFAULT NULL',
               ),'ENGINE=InnoDB');
            
	}

	public function safeDown()
	{
            $this->dropTable('tbl_currency');
	}
	
}