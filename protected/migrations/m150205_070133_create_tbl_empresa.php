<?php

class m150205_070133_create_tbl_empresa extends CDbMigration
{
//	public function up()
//	{
//	}
//
//	public function down()
//	{
//		echo "m150205_070133_create_tbl_empresa does not support migration down.\n";
//		return false;
//	}

	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
           $this->createTable('tbl_empresa',array(
                'id'=>'pk',
                'razon_social'=>'varchar(50) NOT NULL',
                'ruc'=>'varchar(20) NOT NULL', // und de medida
                'direccion'=>'varchar(50) NOT NULL',
                'observacion'=>'text DEFAULT NULL',
                'activo'=>'bool DEFAULT 0', // 0=si ;1=no
                //registro para el sistema
                'create_time'=>'datetime DEFAULT NULL',
                'create_user_id'=> 'int(11) DEFAULT NULL',
                'update_time'=>'datetime DEFAULT NULL',
                'update_user_id'=>'int(11) DEFAULT NULL',
            ),'ENGINE=InnoDB'); 
            
	}

	public function safeDown()
	{
            $this->dropTable('tbl_empresa');
	}
	
}