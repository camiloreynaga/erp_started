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
                'cod_comprobante'=>'varchar(5) NOT NULL',
                'create_time'=>'datetime DEFAULT NULL',
                'create_user_id'=> 'int(11) DEFAULT NULL',
                'update_time'=>'datetime DEFAULT NULL',
                'update_user_id'=>'int(11) DEFAULT NULL',
                
            ),'ENGINE=InnoDB');
            
            //tabla para registro de comprobantes de pago
            $this->createTable('tbl_comprobante',array(
                'id'=>'pk',
                'compra_venta_id'=>'int(11) NOT NULL',
                'compra_venta'=>'smallint(6)', // especifica si la operación es venta o compra 0= compra 1 = venta
                'tipo_id'=>'int(11) NOT NULL',
                'serie'=>'varchar(5) NOT NULL',
                'numero'=>'varchar(10) NOT NULL',
                'estado'=>'smallint(5) DEFAULT 0', // 0 pendiente, 1 cancelado
                'create_time'=>'datetime DEFAULT NULL',
                'create_user_id'=> 'int(11) DEFAULT NULL',
                'update_time'=>'datetime DEFAULT NULL',
                'update_user_id'=>'int(11) DEFAULT NULL',
            ), 'ENGINE=InnoDB');
            
            
            $this->createTable('tbl_guia_remision', array(
                'id'=>'pk',
                
            ),'ENGINE=InnoDB');
            
            //relaciones entre tablas
            
            //tipo de comprobante con comprobante
            $this->addForeignKey('fk_tipo_comprobante', 'tbl_comprobante', 'tipo_id', 'tbl_tipo_comprobante', 'id', 'CASCADE', 'RESTRICT');
            //compra con comprobante
            $this->addForeignKey('fk_compra_comprobante', 'tbl_comprobante', 'compra_venta_id', 'tbl_compra', 'id', 'CASCADE', 'RESTRICT');
           //venta con comprobante
            $this->addForeignKey('fk_venta_comprobante', 'tbl_comprobante', 'compra_venta_id', 'tbl_venta', 'id', 'CASCADE', 'RESTRICT');
           
	}

	public function safeDown()
	{
            $this->dropForeignKey('fk_tipo_comprobante', 'tbl_comprobante');
            $this->dropForeignKey('fk_compra_comprobante', 'tbl_comprobante');
            $this->dropForeignKey('fk_venta_comprobante', 'tbl_comprobante');
            
            $this->dropTable('tbl_tipo_comprobante');
            $this->dropTable('tbl_comprobante');
	}
	
}