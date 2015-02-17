<?php

class m150206_221908_create_tbl_caja_chica extends CDbMigration
{
//	public function up()
//	{
//	}
//
//	public function down()
//	{
//		echo "m150206_221908_create_tbl_caja_chica does not support migration down.\n";
//		return false;
//	}

	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
            //caja chica
            $this->createTable('tbl_caja_chica',array(
                'id'=>'pk',
                'punto_venta_id'=>'int(11) NOT NULL',
                'caja_chica'=>'varchar(100) NOT NULL',
                'saldo'=>'decimal(10,2) DEFAULT 0',              
                'activo'=>'bool DEFAULT 0',
                'observacion'=>'text DEFAULT NULL',
                //registro para el sistema
                'create_time'=>'datetime DEFAULT NULL',
                'create_user_id'=> 'int(11) DEFAULT NULL',
                'update_time'=>'datetime DEFAULT NULL',
                'update_user_id'=>'int(11) DEFAULT NULL',
                    ),'ENGINE=InnoDB');
            //caja chica por almacen
            $this->createTable('tbl_caja_chica_almacen',array(
                'id'=>'pk',
                'almacen_id'=>'int(11)',
                'producto_id'=>'int(11)',
                'lote'=>'varchar(50)',
                'fecha_vencimiento'=>'Date',
                'cantidad_disponible'=>'int(11)', // cantidad que se muestra disponible de venta
                'cantidad_real'=>'int(11)', //cantidad real en ítems físicos en el almacén
                //'activo'=>'bool DEFAULT 0', // 0=si ;1=no
                //
                'create_time' => 'datetime DEFAULT NULL',
                'create_user_id' => 'int(11) DEFAULT NULL',
                'update_time' => 'datetime DEFAULT NULL',
                'update_user_id' => 'int(11) DEFAULT NULL',
            ), 'ENGINE=InnoDB');
	}

	public function safeDown()
	{
	}
	
}