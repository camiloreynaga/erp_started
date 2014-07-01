<?php

class m140701_062314_query_first extends CDbMigration
{
//	public function up()
//	{
//	}
//
//	public function down()
//	{
//		echo "m140701_062314_query_first does not support migration down.\n";
//		return false;
//	}

	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
            $this->insert('tbl_empleado',array(
                'id'=>1,
                'nombre'=>'root',
                'ap_paterno'=>'root',
                'fecha_nacimiento'=> date("m/d/y g:i A"),
                'doc_identidad'=>'0',
                
                'create_time'=>date("m/d/y g:i A"),
                'update_time'=>date("m/d/y g:i A"),
            ));
            
            $this->insert('tbl_usuario', array(
                'id'=>1,
                'username' => 'admin',
                'email' => 'camilo.reynaga@gmail.com',
                'password' => md5('admin'),
                'empleado_id'=>1,
                'create_time'=>date("m/d/y g:i A"),
                'update_time'=>date("m/d/y g:i A"),
            ));
	}

	public function safeDown()
	{
            $this->delete('tbl_empleado');
            $this->delete('tbl_usuario');
	}
	
}