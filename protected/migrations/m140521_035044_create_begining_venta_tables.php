<?php

class m140521_035044_create_begining_venta_tables extends CDbMigration
{
//	public function up()
//	{
//	}
//
//	public function down()
//	{
//		echo "m140521_035044_create_begining_venta_tables does not support migration down.\n";
//		return false;
//	}

	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
            
            //tabla cliente
            $this->createTable('tbl_cliente',array(
                'id'=>'pk',
                'nombre_rz'=>'varchar(100)',
                'ruc'=>'varchar(11) NOT NULL',
                'contacto'=>'varchar(100) DEFAULT NULL',
                'direccion'=>'varchar(100)',
                'ciudad'=>'varchar(50)',
                'telefono'=>'varchar(50)',
                'activo'=>'bool DEFAULT 0', // 0=si ;1=no
                'linea_credito'=>'decimal(10,2) DEFAULT 0',
//
                'create_time'=>'datetime DEFAULT NULL',
                'create_user_id'=> 'int(11) DEFAULT NULL',
                'update_time'=>'datetime DEFAULT NULL',
                'update_user_id'=>'int(11) DEFAULT NULL',
            ),'ENGINE=InnoDB');
            
            //nota de pedido
            $this->createTable('tbl_pedido',array(
                'id'=>'pk',
                'fecha_pedido'=>'date DEFAULT NULL', //fecha de emision
                'cliente_id'=>'int(11)',
                'vendedor_id'=>'int(11) NOT NULL', // Registro de preventista
                'cotizacion_id'=>'int(11) DEFAULT NULL', //cotización venta
                'observaciones'=>'text DEFAULT NULL',
                'estado'=>'SmallInt(6)', // 0=pendiente,1=proceso,2=terminado,3=cancelado
                'create_time'=>'datetime DEFAULT NULL',
                'create_user_id'=> 'int(11) DEFAULT NULL',
                'update_time'=>'datetime DEFAULT NULL',
                'update_user_id'=>'int(11) DEFAULT NULL',
            ),'ENGINE=InnoDB');
            
//            Detalle de orden de compra
            $this->createTable('tbl_detalle_pedido',array(
                'id'=>'pk',
                'pedido_id'=>'int(11)',
                //'cotizacion_id'=>'int(11) DEFAULT NULL',
                'producto_id'=>'int(11)',
                'cantidad'=>'int(11)',
                'observacion'=>'text DEFAULT NULL',
                'precio_unitario'=>'decimal(10,2)',
                'subtotal'=>'decimal(10,2)',
                'impuesto'=>'decimal(10,2)',
                'total'=>'decimal(10,2)',
            ), 'ENGINE=InnoDB');
            
            // tabla venta
            $this->createTable('tbl_venta',array(
                'id'=>'pk',
                'fecha_venta'=>'date DEFAULT NULL', // fecha emision comprobante
                'cliente_id'=>'int(11) NOT NULL', // fk de registro de proveedores
                'vendedor_id'=>'int(11) NOT NULL', // Registro de preventista
                'forma_pago'=>'int(11) NOT NULL', // contado / credito/ letra.
                'pedido_id'=>'int(11)', //relacion de pedido - venta
                'base_imponible'=>'decimal(10,2)',
                'impuesto'=>'decimal(10,2) DEFAULT NULL' ,
                'importe_total'=>'decimal(10,2) DEFAULT NULL',
                'observacion'=>'text DEFAULT NULL',
                'create_time'=>'datetime DEFAULT NULL',
                'create_user_id'=> 'int(11) DEFAULT NULL',
                'update_time'=>'datetime DEFAULT NULL',
                'update_user_id'=>'int(11) DEFAULT NULL',
                
            ) ,'ENGINE=InnoDB'); 
            //tabla detalle de venta
            $this->createTable('tbl_detalle_venta',array(
                'id'=>'pk',
                'venta_id'=>'int(11)',
                'producto_id'=>'int(11)',
                'cantidad'=>'int(11)',
                'precio_unitario'=>'decimal(10,2)',
                'subtotal'=>'decimal(10,2)',
                'impuesto'=>'decimal(10,2)',
                'total'=>'decimal(10,2)',
                'lote'=>'varchar(50)',// 
                'fecha_vencimiento'=>'DATE',//
                //
                'create_time'=>'datetime DEFAULT NULL',
                'create_user_id'=> 'int(11) DEFAULT NULL',
                'update_time'=>'datetime DEFAULT NULL',
                'update_user_id'=>'int(11) DEFAULT NULL',
            ), 'ENGINE=InnoDB');
            //tabla cuenta por cobrar
            //
            $this->createTable('tbl_cuenta_cobrar',array(
                'id'=>'pk',
                'venta_id'=>'int(11) NOT NULL',
                'monto'=>'decimal(10,2)',
                'estado'=>'SmallInt(6)',
                'fecha_pago'=>'Date',
                'fecha_vencimiento'=>'Date',
                'medio_pago'=>'int(11)',
                'interes'=>'decimal(10,2)',
                'create_time' => 'datetime DEFAULT NULL',
                'create_user_id' => 'int(11) DEFAULT NULL',
                'update_time' => 'datetime DEFAULT NULL',
                'update_user_id' => 'int(11) DEFAULT NULL',
            ), 'ENGINE=InnoDB');
            
            
           
	
           //relaciones
           
            //cliente con venta
            $this->addForeignKey('fk_cliente_venta', 'tbl_venta', 'cliente_id', 'tbl_cliente', 'id' ,'CASCADE' , 'RESTRICT');
             //compra con detalle de venta
            $this->addForeignKey('fk_detalle_venta', 'tbl_detalle_venta', 'venta_id', 'tbl_venta', 'id','CASCADE','RESTRICT');
            //producto con detalle de compra
            $this->addForeignKey('fk_detalle_producto_venta','tbl_detalle_venta','producto_id','tbl_producto', 'id', 'CASCADE', 'RESTRICT');
            //cuenta por pagar con compra
            $this->addForeignKey('fk_cuenta_cobrar_venta', 'tbl_cuenta_cobrar', 'venta_id', 'tbl_venta', 'id','CASCADE', 'RESTRICT');
            //pedido detalle de pedido
            $this->addForeignKey('fk_pedido_detalle','tbl_detalle_pedido','pedido_id','tbl_pedido','id','CASCADE', 'RESTRICT');
        }
        
        

	public function safeDown()
	{
            $this->dropForeignKey('fk_cliente_venta', 'tbl_venta');
            $this->dropForeignKey('fk_detalle_venta', 'tbl_detalle_venta');
            $this->dropForeignKey('fk_detalle_producto_venta', 'tbl_detalle_venta');
            $this->dropForeignKey('fk_cuenta_cobrar_venta', 'tbl_cuenta_cobrar');
            $this->dropForeignKey('fk_pedido_detalle', 'tbl_detalle_pedido');
            
            $this->dropTable('tbl_cliente');
            $this->dropTable('tbl_venta');
            $this->dropTable('tbl_detalle_venta');
            $this->dropTable('tbl_cuenta_cobrar');
            $this->dropTable('tbl_pedido');
            $this->dropTable('tbl_detalle_pedido');
	}
	
}