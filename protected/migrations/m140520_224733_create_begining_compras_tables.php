<?php

class m140520_224733_create_begining_compras_tables extends CDbMigration
{
//	public function up()
//	{
//	}
//
//	public function down()
//	{
//		echo "m140520_224733_create_begining_compras_tables does not support migration down.\n";
//		return false;
//	}

	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
            
                        
            $this->createTable('tbl_proveedor',array(
                'id'=>'pk',
                'nombre_rz'=>'varchar(50) NOT NULL',
                'ruc'=>'varchar(11) NOT NULL',
                'contacto'=>'varchar(100) DEFAULT NULL',
                'direccion'=>'varchar(100)',
                'ciudad'=>'varchar(50)',
                'telefono'=>'varchar(50)',
                //linea de crédito disponible
                'linea_credito'=>'decimal(10,2)',
                'create_time'=>'datetime DEFAULT NULL',
                'create_user_id'=> 'int(11) DEFAULT NULL',
                'update_time'=>'datetime DEFAULT NULL',
                'update_user_id'=>'int(11) DEFAULT NULL',
            ),'ENGINE=InnoDB' );
            
            //tabla cotización
            
            $this->createTable('tbl_cotizacion', array(
                'id'=>'pk',
                'fecha_cotizacion'=>'DATE DEFAULT NULL',
                'proveedor_id'=>'int(11)',
                'validez'=>'DATE',
                'estado'=>'bool DEFAULT 0', // 0 = valido, 1=vencido/caduco
                'create_time'=>'datetime DEFAULT NULL',
                'create_user_id'=> 'int(11) DEFAULT NULL',
                'update_time'=>'datetime DEFAULT NULL',
                'update_user_id'=>'int(11) DEFAULT NULL',
            ),'ENGINE=InnoDB');
            //detalle de cotizacion
            $this->createTable('tbl_detalle_cotizacion',array(
                'id'=>'pk',
                'cotizacion_id'=>'int(11)',
                'producto_id'=>'int(11)',
                'cantidad'=>'int(11)',
                'precio_unitario'=>'decimal(10,2)',
                'subtotal'=>'decimal(10,2)',
                'impuesto'=>'decimal(10,2)',
                'total'=>'decimal(10,2)',
            ), 'ENGINE=InnoDB');
            //tabla orden de compra
            
            $this->createTable('tbl_orden_compra',array(
                'id'=>'pk',
                'codigo_unico'=>'varchar(50)', //codigo unico OC+ID+fecha
                'fecha_orden'=>'datetime DEFAULT NULL',
                'proveedor_id'=>'int(11)',
                'observaciones'=>'text DEFAULT NULL',
                'estado'=>'SmallInt(6)', // 0=pendiente,1=proceso,2=terminado,3=cancelado
                'create_time'=>'datetime DEFAULT NULL',
                'create_user_id'=> 'int(11) DEFAULT NULL',
                'update_time'=>'datetime DEFAULT NULL',
                'update_user_id'=>'int(11) DEFAULT NULL',
            ),'ENGINE=InnoDB');
            //
            //Detalle de orden de compra
            $this->createTable('tbl_detalle_orden_compra',array(
                'id'=>'pk',
                'orden_compra_id'=>'int(11)',
                'cotizacion_id'=>'int(11) DEFAULT NULL',
                'producto_id'=>'int(11)',
                'cantidad'=>'int(11)',
                'observacion'=>'text DEFAULT NULL',
                'precio_unitario'=>'decimal(10,2)',
                'subtotal'=>'decimal(10,2)',
                'impuesto'=>'decimal(10,2)',
                'total'=>'decimal(10,2)',
            ), 'ENGINE=InnoDB');
            
            
            //tabla compras
            $this->createTable('tbl_compra',array(
                'id'=>'pk',
                'fecha_compra'=>'datetime DEFAULT NULL', // fecha emision comprobante
                //'tipo_doc'=>'int(11) NOT NULL',
                //'serie_numero'=>'varchar(15) NOT NULL', //
                'proveedor_id'=>'int(11) NOT NULL', // fk de registro de proveedores
                'base_imponible'=>'decimal(10,2)',
                'impuesto'=>'decimal(10,2) DEFAULT NULL' ,
                'importe_total'=>'decimal(10,2) DEFAULT NULL',
                'observacion'=>'text DEFAULT NULL',
                'create_time'=>'datetime DEFAULT NULL',
                'create_user_id'=> 'int(11) DEFAULT NULL',
                'update_time'=>'datetime DEFAULT NULL',
                'update_user_id'=>'int(11) DEFAULT NULL',
            ),'ENGINE=InnoDB');
            
            //tabla detalle de compra
            $this->createTable('tbl_detalle_compra',array(
                'id'=>'pk',
                'compra_id'=>'int(11)',
                'producto_id'=>'int(11)',
                'cantidad'=>'int(11)',
                'precio_unitario'=>'decimal(10,2)',
                'subtotal'=>'decimal(10,2)',
                'impuesto'=>'decimal(10,2)',
                'total'=>'decimal(10,2)',
                'lote'=>'varchar(50)',// 
                'fecha_vencimiento'=>'DATE'//
            )                     
                    ,'ENGINE=InnoDB');
            //tabla cuentas por pagar
            $this->createTable('tbl_cuenta_pagar', array(
                'id'=>'pk',
                'compra_id'=>'int(11) NOT NULL',
                'monto'=>'decimal(10,2)',
                'estado'=>'SmallInt(6)',
                'fecha_pago'=>'Date',
                'fecha_vencimiento'=>'Date',
                'interes'=>'decimal(10,2)',
                'create_time' => 'datetime DEFAULT NULL',
                'create_user_id' => 'int(11) DEFAULT NULL',
                'update_time' => 'datetime DEFAULT NULL',
                'update_user_id' => 'int(11) DEFAULT NULL',
            ),'ENGINE=InnoDB');
            
            
            // relaciones 
            //proveedor con compra
            $this->addForeignKey('fk_proveedor_compra', 'tbl_compra', 'proveedor_id', 'tbl_proveedor', 'id' ,'CASCADE' , 'RESTRICT');
             //compra con detalle de compra
            $this->addForeignKey('fk_detalle_compra', 'tbl_detalle_compra', 'compra_id', 'tbl_compra', 'id','CASCADE','RESTRICT');
            //producto con detalle de compra
            $this->addForeignKey('fk_detalle_compra_producto','tbl_detalle_compra','producto_id','tbl_producto', 'id', 'CASCADE', 'RESTRICT'); //
            //cuenta por pagar con compra
            $this->addForeignKey('fk_cuenta_pagar_compra', 'tbl_cuenta_pagar', 'compra_id', 'tbl_compra', 'id','CASCADE', 'RESTRICT');
         
            //cotizacion con detalle de cotizacion
            $this->addForeignKey('fk_detalle_cotizacion', 'tbl_detalle_cotizacion', 'cotizacion_id', 'tbl_cotizacion', 'id','CASCADE', 'RESTRICT');
            //orden compra con detalle orden compra
            $this->addForeignKey('fk_orden_compra_detalle', 'tbl_detalle_orden_compra', 'orden_compra_id', 'tbl_orden_compra', 'id','CASCADE', 'RESTRICT');
            
	}

	public function safeDown()
	{
            //quitando relaciones
            $this->dropForeignKey('fk_proveedor_compra', 'tbl_compra');
            $this->dropForeignKey('fk_detalle_compra', 'tbl_detalle_compra');
           $this->dropForeignKey('fk_detalle_compra_producto', 'tbl_detalle_compra');
            $this->dropForeignKey('fk_cuenta_pagar_compra', 'tbl_cuenta_pagar');
            
            $this->dropForeignKey('fk_detalle_cotizacion', 'tbl_detalle_cotizacion');
            $this->dropForeignKey('fk_orden_compra_detalle', 'tbl_detalle_orden_compra');
            
            $this->dropTable('tbl_proveedor');
            $this->dropTable('tbl_compra');
            $this->dropTable('tbl_detalle_compra');
            $this->dropTable('tbl_cuenta_pagar');
            $this->dropTable('tbl_cotizacion');
            $this->dropTable('tbl_detalle_cotizacion');
            $this->dropTable('tbl_orden_compra');
            $this->dropTable('tbl_detalle_orden_compra');
	}
	
}