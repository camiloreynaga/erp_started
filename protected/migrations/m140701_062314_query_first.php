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
            
            
            
             #insert default cargos 
            $this->insert('tbl_cargo',array(
                'id'=>1,
                'cargo'=>'Administrador',
                'activo'=>'0',
                'create_user_id'=>'1',
                'update_user_id'=>'1',
                'create_time'=>date("Y-m-d H:i:s"),
                'update_time'=>date("Y-m-d H:i:s"),
            ));
            $this->insert('tbl_cargo',array(
                'id'=>2,
                'cargo'=>'Facturador',
                'activo'=>'0',
                'create_user_id'=>'1',
                'update_user_id'=>'1',
                'create_time'=>date("Y-m-d H:i:s"),
                'update_time'=>date("Y-m-d H:i:s"),
            ));
            $this->insert('tbl_cargo',array(
                'id'=>3,
                'cargo'=>'Almacenero',
                'activo'=>'0',
                'create_user_id'=>'1',
                'update_user_id'=>'1',
                'create_time'=>date("Y-m-d H:i:s"),
                'update_time'=>date("Y-m-d H:i:s"),
            ));
            $this->insert('tbl_cargo',array(
                'id'=>4,
                'cargo'=>'Preventista',
                'activo'=>'0',
                'create_user_id'=>'1',
                'update_user_id'=>'1',
                'create_time'=>date("Y-m-d H:i:s"),
                'update_time'=>date("Y-m-d H:i:s"),
            ));
            //empleados
            $this->insert('tbl_empleado',array(
                'id'=>1,
                'nombre'=>'root',
                'ap_paterno'=>'root',
                'fecha_nacimiento'=> date("Y-m-d H:i:s"),
                'cargo_id'=>'1',
                'doc_identidad'=>'0',
                'create_user_id'=>'1',
                'update_user_id'=>'1',
                'create_time'=>date("Y-m-d H:i:s"),
                'update_time'=>date("Y-m-d H:i:s"),
            ));
            
            $this->insert('tbl_user', array(
                'id'=>1,
                'username' => 'admin',
                'email' => 'camilo.reynaga@gmail.com',
                'password' => md5('admin'),
                'empleado_id'=>1,
                'create_user_id'=>'1',
                'update_user_id'=>'1',
                'create_time'=>date("Y-m-d H:i:s"),
                'update_time'=>date("Y-m-d H:i:s"),
            ));
            
            
            //data de ingreso inicial de clientes
            $this->insert('tbl_cliente',array(
                'id'=>'1',
                'nombre_rz'=>'SIN NOMBRE',
                'ruc'=>'00000000000',
                'linea_credito'=>0,
                'credito_disponible'=>0,
                'activo'=>'0',
                'create_user_id'=>'1',
                'update_user_id'=>'1',
                'create_time'=>date("Y-m-d H:i:s"),
                'update_time'=>date("Y-m-d H:i:s"),
            ));
	}

	public function safeDown()
	{
            $this->delete('tbl_empleado');
            $this->delete('tbl_user');
            $this->delete('tbl_cargo');
            $this->delete('tbl_cliente');
	}
	
}