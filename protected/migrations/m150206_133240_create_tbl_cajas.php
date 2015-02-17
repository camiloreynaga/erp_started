<?php

class m150206_133240_create_tbl_cajas extends CDbMigration
{
//	public function up()
//	{
//	}
//
//	public function down()
//	{
//		echo "m150206_133240_create_tbl_cajas does not support migration down.\n";
//		return false;
//	}
	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
            //Tabla Fabricante / Marca / Laboratorio
            //$this->dropTable('tbl_tipo_caja');
            $this->createTable('tbl_tipo_caja', array(
                'id'=>'pk',
                'tipo_caja'=>'varchar(50) NOT NULL',
                'activo'=>'bool DEFAULT 0', // 0=si ;1=no
                //registro para el sistema
                'create_time'=>'datetime DEFAULT NULL',
                'create_user_id'=> 'int(11) DEFAULT NULL',
                'update_time'=>'datetime DEFAULT NULL',
                'update_user_id'=>'int(11) DEFAULT NULL',
            ),'ENGINE=InnoDB');
            
            //tabla Producto
            
             $this->createTable('tbl_caja',array(
                'id'=>'pk',
                'descripcion_caja'=>'varchar(100) NOT NULL',
                'tipo_caja_id'=>'int(11) NOT NULL',
                //'fabricante_id'=>'int(11) NOT NULL',//marca
                'proveedor_id'=>'int(11) NOT NULL',
                'stock'=>'int(11) DEFAULT 0',              
                'activo'=>'bool DEFAULT 0',
                'porcentaje_devolucion'=>'decimal(10,2) DEFAULT 0', 
                'observacion'=>'text DEFAULT NULL',
                //registro para el sistema
                'create_time'=>'datetime DEFAULT NULL',
                'create_user_id'=> 'int(11) DEFAULT NULL',
                'update_time'=>'datetime DEFAULT NULL',
                'update_user_id'=>'int(11) DEFAULT NULL',
                    ),'ENGINE=InnoDB');
             
             // tabla producto por almacen para registrar el stock actual por almacen y lote      
            $this->createTable('tbl_caja_almacen',array(
                'id'=>'pk',
                'almacen_id'=>'int(11)',
                'caja_id'=>'int(11)',
                'cantidad_disponible'=>'int(11)', // cantidad que se muestra disponible de venta
                'cantidad_real'=>'int(11)', //cantidad real en ítems físicos en el almacén
                'punto_venta_id'=>'int(11)',
                'activo'=>'bool DEFAULT 0', // 0=si ;1=no
                //
                'create_time' => 'datetime DEFAULT NULL',
                'create_user_id' => 'int(11) DEFAULT NULL',
                'update_time' => 'datetime DEFAULT NULL',
                'update_user_id' => 'int(11) DEFAULT NULL',
            ), 'ENGINE=InnoDB');
            
            
            //tabla movimiento- Operaciones de almacen    
            $this->createTable('tbl_movimiento_caja_almacen',array(
                'id'=>'pk',
                'fecha_movimiento'=>'Date',
                'caja_id'=>'int(11) NOT NULL',
                'cantidad'=>'int(11) NOT NULL',
                'motivo_movimiento_id'=>'int(11) NOT NULL', // relacionado a ingreso o salida
               // 'recepcion_compra_id'=>'int(11) DEFAULT NULL',
               // 'envio_venta_id'=>'int (11) DEFAULT NULL',    
                'detalle_compra_id'=>'int(11) DEFAULT NULL',
                'detalle_venta_id'=>'int(11) DEFAULT NULL',
                'observacion'=>'text DEFAULT NULL',
                'almacen_id'=>'int(11)',
                'saldo_stock'=>'int(11)',
                'operacion'=>'bool ',// 0=> ingreso, 1= salida
                'create_time' => 'datetime DEFAULT NULL',
                'create_user_id' => 'int(11) DEFAULT NULL',
                'update_time' => 'datetime DEFAULT NULL',
                'update_user_id' => 'int(11) DEFAULT NULL',
                
            ), 'ENGINE=InnoDB');
             
             //producto tiene una presentacion 
             $this->addForeignKey('fk_tipo_caja_caja', 'tbl_caja', 'tipo_caja_id', 'tbl_tipo_caja','id', 'CASCADE', 'RESTRICT');
             
             
	}

	public function safeDown()
	{
            $this->dropForeignKey('fk_tipo_caja_caja', 'tbl_caja');
            $this->dropTable('tbl_tipo_caja');
            $this->dropTable('tbl_caja');
            $this->dropTable('tbl_caja_almacen');
            $this->dropTable('tbl_movimiento_caja_almacen');
            
	}
	
}