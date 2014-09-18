<?php

class m140521_051336_create_begining_almacen_tables extends CDbMigration
{
//	public function up()
//	{
//	}
//
//	public function down()
//	{
//		echo "m140521_051336_create_begining_almacen_tables does not support migration down.\n";
//		return false;
//	}

	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
            //tabla almacen
            $this->createTable('tbl_almacen',array(
                'id'=>'pk',
                'almacen'=>'varchar(50) NOT NULL',
                'direccion'=>'varchar(50)',
                'ubicacion_id'=>'int(11) default 1', // 1= cusco, 
                'activo'=>'bool DEFAULT 0', // 0=si ;1=no
                //
                'create_time' => 'datetime DEFAULT NULL',
                'create_user_id' => 'int(11) DEFAULT NULL',
                'update_time' => 'datetime DEFAULT NULL',
                'update_user_id' => 'int(11) DEFAULT NULL',
            ), 'ENGINE=InnoDB');
            // tabla producto por almacen para registrar el stock actual por almacen y lote      
            $this->createTable('tbl_producto_almacen',array(
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
            
            //datos de producto para la recepcion de compra o orden de compra,
            // 
//            $this->createTable('tbl_recepcion_compra',array(
//                'id'=>'pk',
//                'detalle_compra_id'=>'int(11)',
//                'producto_id'=>'int(11)',
//                'cantidad'=>'int(11)', //
//                'lote'=>'varchar(50)',// 
//                'fecha_vencimiento'=>'DATE',//
//                
//                //'activo'=>'bool DEFAULT 0', // 0=si ;1=no
//                //
//                'create_time' => 'datetime DEFAULT NULL',
//                'create_user_id' => 'int(11) DEFAULT NULL',
//                'update_time' => 'datetime DEFAULT NULL',
//                'update_user_id' => 'int(11) DEFAULT NULL',
//            ), 'ENGINE=InnoDB');
            
            //datos de producto para el envio de venta o nota de pedido
//            $this->createTable('tbl_envio_venta',array(
//                'id'=>'pk',
//                'detalle_venta_id'=>'int(11)',
//                'producto_id'=>'int(11)',
//                'cantidad'=>'int(11)', // 
//                'lote'=>'varchar(50)',// 
//                'fecha_vencimiento'=>'DATE',//
//                //'activo'=>'bool DEFAULT 0', // 0=si ;1=no
//                //
//                'create_time' => 'datetime DEFAULT NULL',
//                'create_user_id' => 'int(11) DEFAULT NULL',
//                'update_time' => 'datetime DEFAULT NULL',
//                'update_user_id' => 'int(11) DEFAULT NULL',
//            ), 'ENGINE=InnoDB');

            //tabla movimiento- Operaciones de almacen    
            $this->createTable('tbl_movimiento_almacen',array(
                'id'=>'pk',
                'fecha_movimiento'=>'Date',
                'producto_id'=>'int(11) NOT NULL',
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
            //tabla para motivos y tipos de operación/ movimiento almacen
            $this->createTable('tbl_motivo_movimiento', array(
                'id'=>'pk',
                'movimiento'=>'varchar(50) NOT NULL', //nombre del movimiento, compra,venta, prestamo,
                'tipo_movimiento'=>'int(11)',// 0=entrada 1=salida 2=custodia
                //
                'create_time' => 'datetime DEFAULT NULL',
                'create_user_id' => 'int(11) DEFAULT NULL',
                'update_time' => 'datetime DEFAULT NULL',
                'update_user_id' => 'int(11) DEFAULT NULL',
            ),'ENGINE=InnoDB');
            
            
            
            //relaciones
            
            $this->addForeignKey('fk_motivo_movimiento','tbl_movimiento_almacen', 'motivo_movimiento_id', 'tbl_motivo_movimiento','id', 'CASCADE', 'RESTRICT');
            $this->addForeignKey('fk_movimiento_almacen', 'tbl_movimiento_almacen', 'almacen_id', 'tbl_almacen', 'id', 'CASCADE', 'RESTRICT');
	}

	public function safeDown()
	{
            //quitando relaciones
            $this->dropForeignKey('fk_motivo_movimiento', 'tbl_movimiento_almacen');
            $this->dropForeignKey('fk_movimiento_almacen', 'tbl_movimiento_almacen');
            
            $this->dropTable('tbl_almacen');
            $this->dropTable('tbl_producto_almacen');
            $this->dropTable('tbl_movimiento_almacen');
            $this->dropTable('tbl_motivo_movimiento');
                    
	}
	
}