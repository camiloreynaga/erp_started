<?php

class m140525_044431_create_empleado_user_tables extends CDbMigration
{
//	public function up()
//	{
//	}
//
//	public function down()
//	{
//		echo "m140525_044431_create_empleado_user_tables does not support migration down.\n";
//		return false;
//	}

	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
            //tabla empleado
            
            $this->createTable('tbl_empleado',array(
                'id'=>'pk',
                'nombre'=>'varchar(50) NOT NULL',
                'ap_paterno'=>'varchar(50) NOT NULL',
                'ap_materno'=>'varchar(50) DEFAULT NULL',
                'doc_identidad'=>'varchar(10) NOT NULL',
                'direccion'=>'varchar(100) DEFAULT NULL',
                'telefono'=>'varchar(50)',
                'movil'=>'varchar(50)',
                'fecha_nacimiento'=>'date',
                //
                'create_time'=>'datetime DEFAULT NULL',
                'create_user_id'=> 'int(11) DEFAULT NULL',
                'update_time'=>'datetime DEFAULT NULL',
                'update_user_id'=>'int(11) DEFAULT NULL',
            ) ,'ENGINE=InnoDB');
            
            //tabla usuario
           $this->createTable('tbl_usuario',array(
                'id'=>'pk',
                'username' => 'string NOT NULL',
                'email' => 'string ',
                'password' => 'string NOT NULL',
                'empleado_id'=>'int(11) NOT NULL',
                'last_login_time' => 'datetime DEFAULT NULL',
                'create_time' => 'datetime DEFAULT NULL',
                'create_user_id' => 'int(11) DEFAULT NULL',
                'update_time' => 'datetime DEFAULT NULL',
                'update_user_id' => 'int(11) DEFAULT NULL',
           ), 'ENGINE=InnoDB');
	}

	public function safeDown()
	{
             $this->dropTable('tbl_empleado');
             $this->dropTable('tbl_usuario');
	}
	
}