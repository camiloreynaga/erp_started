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
            //tabla compras
            $this->createTable('tbl_compra',array(
                'id'=>'pk',
                'fecha_compra'=>'datetime DEFAULT NULL', // fecha emision comprobante
                'tipo_doc'=>'int(11) NOT NULL',
                'serie_numero'=>'varchar(15) NOT NULL', //
                'proveedor'=>'int(11) NOT NULL', // fk de registro de proveedores
                'base_imponible'=>'decimal(10,2)',
                'impuesto'=>'decimal(10,2) DEFAULT NULL' ,
                'importe_total'=>'decimal(10,2) DEFAULT NULL',
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
            ),'ENGINE=InnoDB');
            
            
            // relaciones 
            $this->addForeignKey('fk_detalle_compra', 'tbl_detalle_compra', 'compra_id', 'tbl_compra', 'id','CASCADE','RESTRICT');
            $this->addForeignKey('fk_detalle_producto','tbl_detalle_compra','producto_id','tbl_producto', 'id', 'CASCADE', 'RESTRICT');
            
            $this->addForeignKey('fk_cuenta_pagar_compra', 'tbl_cuenta_pagar', 'compra_id', 'tbl_compra', 'id','CASCADE', 'RESTRICT');
	}

	public function safeDown()
	{
            //quitando relaciones
            
            $this->dropForeignKey('fk_detalle_compra', 'tbl_detalle_compra');
            $this->dropForeignKey('fk_detalle_producto', 'tbl_detalle_compra');
            $this->dropForeignKey('fk_cuenta_pagar_compra', 'tbl_cuenta_pagar');
            
            //
            $this->dropTable('tbl_compra');
            $this->dropTable('tbl_detalle_compra');
            $this->dropTable('tbl_cuenta_pagar');
	}
	
}