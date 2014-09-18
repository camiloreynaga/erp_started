<?php

class m140701_174809_create_tables_almacen_adicionales extends CDbMigration
{
//	public function up()
//	{
//	}
//
//	public function down()
//	{
//		echo "m140701_174809_create_tables_almacen_adicionales does not support migration down.\n";
//		return false;
//	}

	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
             $this->createTable('tbl_ubicacion',array(
                'id'=>'pk',
                'ubicacion'=>'varchar(50) NOT NULL',
                'activo'=>'bool DEFAULT 0', //0=Si 1=No
                //
                'create_time'=>'datetime DEFAULT NULL',
                'create_user_id'=> 'int(11) DEFAULT NULL',
                'update_time'=>'datetime DEFAULT NULL',
                'update_user_id'=>'int(11) DEFAULT NULL',
            ) ,'ENGINE=InnoDB');
             
            //ingresando primera ubicación
             $this->insert('tbl_ubicacion', array(
                 'id'=>'1',
                'ubicacion'=>'Cusco',
                //
                'create_time'=>  date('Y-m-d H:i:s'),
                'create_user_id'=> '1',
                'update_time'=>date('Y-m-d H:i:s'),
                'update_user_id'=>'1',
             ));
             
             $this->addForeignKey('fk_almacen_ubicacion', 'tbl_almacen', 'ubicacion_id', 'tbl_ubicacion', 'id');
	}

	public function safeDown()
	{   
            $this->dropForeignKey('fk_almacen_ubicacion', 'tbl_almacen');
            $this->delete('tbl_ubicacion');
            $this->dropTable('tbl_ubicacion');
	}
	
}