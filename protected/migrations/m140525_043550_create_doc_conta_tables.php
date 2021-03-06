<?php

class m140525_043550_create_doc_conta_tables extends CDbMigration
{
//	public function up()
//	{
//	}
//
//	public function down()
//	{
//		echo "m140525_043550_create_doc_conta_tables does not support migration down.\n";
//		return false;
//	}


	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
            
            $this->createTable('tbl_tipo_comprobante',array(
                'id'=>'pk',
                'comprobante'=>'varchar(20) NOT NULL',
                'codigo_comprobante'=>'varchar(5) NOT NULL',
                'create_time'=>'datetime DEFAULT NULL',
                'create_user_id'=> 'int(11) DEFAULT NULL',
                'update_time'=>'datetime DEFAULT NULL',
                'update_user_id'=>'int(11) DEFAULT NULL',
                
            ),'ENGINE=InnoDB');
            
            //tabla para registro de comprobantes de pago
            $this->createTable('tbl_comprobante_compra',array(
                'id'=>'pk',
                'compra_id'=>'int(11) NOT NULL',
                //'compra_venta'=>'smallint(6)', // especifica si la operación es venta o compra 0= compra 1 = venta
                'tipo_comprobante_id'=>'int(11) NOT NULL', //tipo de comproante
                'fecha_emision'=>'Date DEFAULT NULL', //fecha de emisión del comprobante
                'fecha_cancelacion'=>'Date DEFAULT NULL',
                'serie'=>'varchar(5) NOT NULL',
                'numero'=>'varchar(10) NOT NULL',
                'estado'=>'smallint(5) DEFAULT 0', // 0 pendiente, 1 cancelado 
                'guia_remision_remitente'=>'varchar(15)',
                'guia_remision_transportista'=>'varchar(15)',
                'create_time'=>'datetime DEFAULT NULL',
                'create_user_id'=> 'int(11) DEFAULT NULL',
                'update_time'=>'datetime DEFAULT NULL',
                'update_user_id'=>'int(11) DEFAULT NULL',
            ), 'ENGINE=InnoDB');
            
            
            $this->createTable('tbl_comprobante_venta',array(
                'id'=>'pk',
                'venta_id'=>'int(11) NOT NULL',
                //'compra_venta'=>'smallint(6)', // especifica si la operación es venta o compra 0= compra 1 = venta
                'tipo_comprobante_id'=>'int(11) NOT NULL', //tipo de comprobante
                'fecha_emision'=>'Date DEFAULT NULL', //fecha de emisión del comprobante
                'fecha_cancelacion'=>'Date DEFAULT NULL',
                'serie'=>'varchar(5) NOT NULL',
                'numero'=>'varchar(10) NOT NULL',
                'estado'=>'smallint(5) DEFAULT 0', // 0 pendiente, 1 cancelado 
                'guia_remision_remitente'=>'varchar(15)',
                'guia_remision_transportista'=>'varchar(15)',
                'create_time'=>'datetime DEFAULT NULL',
                'create_user_id'=> 'int(11) DEFAULT NULL',
                'update_time'=>'datetime DEFAULT NULL',
                'update_user_id'=>'int(11) DEFAULT NULL',
            ), 'ENGINE=InnoDB');
            
            
            //tabla para registro de comprobantes de pago
            $this->createTable('tbl_nota_credito',array(
                'id'=>'pk',
                //'venta_id'=>'int(11) NOT NULL',
                'comprobante_venta_id'=>'int(11)',
                'fecha_emision'=>'Date DEFAULT NULL', //fecha de emisión del comprobante
                'serie'=>'varchar(5) NOT NULL',
                'numero'=>'varchar(10) NOT NULL',
                'estado'=>'smallint(5) DEFAULT 0', // 0 pendiente, 1 cancelado 2 anulado
                'motivo_emision'=>'varchar(50)',
                'base_imponible'=>'decimal(10,2)',
                'impuesto'=>'decimal(10,2) DEFAULT NULL' ,
                'importe_total'=>'decimal(10,2) DEFAULT NULL',
                'create_time'=>'datetime DEFAULT NULL',
                'create_user_id'=> 'int(11) DEFAULT NULL',
                'update_time'=>'datetime DEFAULT NULL',
                'update_user_id'=>'int(11) DEFAULT NULL',
            ), 'ENGINE=InnoDB');
            
            $this->createTable('tbl_detalle_nota_credito',array(
                'id'=>'pk',
                'nota_credito_id'=>'int(11)',
                //'cotizacion_id'=>'int(11) DEFAULT NULL',
                'producto_id'=>'int(11)',
                'cantidad'=>'int(11)',
                'precio_unitario'=>'decimal(10,2)',
                'subtotal'=>'decimal(10,2)',
                'impuesto'=>'decimal(10,2)',
                'total'=>'decimal(10,2)',
            ), 'ENGINE=InnoDB');
            
                        
            $this->createTable('tbl_guia_remision', array(
                'id'=>'pk',
                'remitente'=>'varchar(50)',
                'serie'=>'varchar(5)',
                'numero'=>'varchar(10)',
                'cliente_proveedor_id'=>'int(11)', //destinatario
                'motivo_traslado'=>'varchar(50)',
                'fecha_inicio_traslado'=>'datetime DEFAULT NULL',
                'transportista_id'=>'int(11) DEFAULT NULL', //sólo para transporte privado
                'punto_partida'=>'varchar(50)',
                'punto_llegada'=>'varchar(50)',
                'marca_placa'=>'varchar(50) DEFAULT NULL',
                'licencia_conducir'=>'varchar(50) DEFAULT NULL',
                'estado_gr'=>'smallint(6) DEFAULT 0',//0 pendiente 1 proceso 2 entregado
                
                'create_time'=>'datetime DEFAULT NULL',
                'create_user_id'=> 'int(11) DEFAULT NULL',
                'update_time'=>'datetime DEFAULT NULL',
                'update_user_id'=>'int(11) DEFAULT NULL',
                
            ),'ENGINE=InnoDB');
            
            $this->createTable('tbl_detalle_guia_remision',array(
                'id'=>'pk',
                'guia_remision_id'=>'int(11)',
                'producto_id'=>'int(11)',
                'descripcion'=>'varchar(100)',// producto
                'cantidad'=>'int(11)',
                'unidad_medida'=>'int(11)', 
                'peso'=>'decimal(10,2)'
            ),'ENGINE=InnoDB');
            
            
//            $this->createTable('tbl_comprante_guia', array(
//                'id'=>'pk',
//                'guia_remision_id',
//                'comprobante_id',
//                
//                ));
            
            //relaciones entre tablas
            
            //tipo de comprobante con comprobante compra
            $this->addForeignKey('fk_tipo_comprobante_compra', 'tbl_comprobante_compra', 'tipo_comprobante_id', 'tbl_tipo_comprobante', 'id', 'CASCADE', 'RESTRICT');
            //tipo de comprobante con comprobante venta
            $this->addForeignKey('fk_tipo_comprobante_venta', 'tbl_comprobante_venta', 'tipo_comprobante_id', 'tbl_tipo_comprobante', 'id', 'CASCADE', 'RESTRICT');
            //compra con comprobante
            $this->addForeignKey('fk_compra_comprobante', 'tbl_comprobante_compra', 'compra_id', 'tbl_compra', 'id', 'CASCADE', 'RESTRICT');
           //venta con comprobante
            $this->addForeignKey('fk_venta_comprobante', 'tbl_comprobante_venta', 'venta_id', 'tbl_venta', 'id', 'CASCADE', 'RESTRICT');
           
            //Relación e guia de remision con detalle de GR
            $this->addForeignKey('fk_guia_remision_detalle', 'tbl_detalle_guia_remision', 'guia_remision_id', 'tbl_guia_remision', 'id','CASCADE','RESTRICT');
            //relaación nota de credito detalle nota de credito
            $this->addForeignKey('fk_nota_credito_detalle', 'tbl_detalle_nota_credito', 'nota_credito_id', 'tbl_nota_credito', 'id','CASCADE','RESTRICT');
            
	}

	public function safeDown()
	{
            
            $this->dropForeignKey('fk_tipo_comprobante_compra', 'tbl_comprobante_compra');
            $this->dropForeignKey('fk_tipo_comprobante_venta', 'tbl_comprobante_venta');
            $this->dropForeignKey('fk_compra_comprobante', 'tbl_comprobante_compra');
            $this->dropForeignKey('fk_venta_comprobante', 'tbl_comprobante_venta');
//          $this  
            $this->dropForeignKey('fk_guia_remision_detalle', 'tbl_detalle_guia_remision');
            $this->dropForeignKey('fk_nota_credito_detalle', 'tbl_detalle_nota_credito');
            
            $this->dropTable('tbl_tipo_comprobante');
            $this->dropTable('tbl_comprobante_compra');
            $this->dropTable('tbl_comprobante_venta');
            $this->dropTable('tbl_guia_remision');
            $this->dropTable('tbl_detalle_guia_remision');
            $this->dropTable('tbl_nota_credito');
            $this->dropTable('tbl_detalle_nota_credito');
            
//            $this->dropTable('tbl_comprante_guia');
	}
	
}