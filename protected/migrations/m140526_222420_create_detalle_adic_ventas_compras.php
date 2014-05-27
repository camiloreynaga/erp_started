<?php

class m140526_222420_create_detalle_adic_ventas_compras extends CDbMigration
{
//	public function up()
//	{
//	}
//
//	public function down()
//	{
//		echo "m140526_222420_create_detalle_adic_ventas_compras does not support migration down.\n";
//		return false;
//	}

	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
            //tabla para caracteristicas adicionales en el detalle de venta compra
            //ej Lote, fecha vencimiento
            $this->createTable('btl_caracteristica_detalle',array(
                'id'=>'pk',
                'caracteristica'=>'varchar(50) DEFAULT NULL',
                'tipo_dato'=>'varchar(50)', //numero,bool,fecha,texto
                
                //
                'create_time' => 'datetime DEFAULT NULL',
                'create_user_id' => 'int(11) DEFAULT NULL',
                'update_time' => 'datetime DEFAULT NULL',
                'update_user_id' => 'int(11) DEFAULT NULL',
            ),'ENGINE=InnoDB');
            
            // tabla donde se comparte la caracteristica adicional, el detalle de compra/venta y el producto
            $this->createTable('tbl_detalle_caract_producto',array(
                'id'=>'pk',
                'producto_id'=>'int(11) NOT NULL',
                'detalle_id'=>'int(11) NOT NULL',
                'caracteristica_id'=>'int(11) NOT NULL',
                'requerido'=>'bool', //si el valor es requerido u opcional
            ),'ENGINE=InnoDB');	
            
            //relaciones entre tablas
            $this->addForeignKey('fk_detalle_caract_detalle', 'tbl_detalle_caract_producto', 'detalle_id', 'tbl_detalle_compra', 'id','CASCADE','RESTRICT');
            $this->addForeignKey('fk_producto_caract_detalle', 'tbl_detalle_caract_producto', 'producto_id', 'tbl_producto', 'id','CASCADE','RESTRICT');
            $this->addForeignKey('fk_caracteristica_detalle', 'tbl_detalle_caract_producto', 'caracteristica_id', 'btl_caracteristica_detalle', 'id','CASCADE','RESTRICT');
            
            
}

	public function safeDown()
	{
            $this->dropForeignKey('fk_detalle_caract_detalle', 'tbl_detalle_caract_producto');
            $this->dropForeignKey('fk_producto_caract_detalle', 'tbl_detalle_caract_producto');
            $this->dropForeignKey('fk_caracteristica_detalle', 'tbl_detalle_caract_producto');
            //
            $this->dropTable('btl_caracteristica_detalle');
            $this->dropTable('tbl_detalle_caract_producto');
	}
	
}