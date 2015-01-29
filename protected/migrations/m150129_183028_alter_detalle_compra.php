<?php

class m150129_183028_alter_detalle_compra extends CDbMigration
{
//	public function up()
//	{
//	}
//
//	public function down()
//	{
//		echo "m150129_183028_alter_detalle_compra does not support migration down.\n";
//		return false;
//	}

	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
           // cambiando la longitud de decimales a 4
            $sql="ALTER TABLE `tbl_detalle_orden_compra` CHANGE `precio_unitario` `precio_unitario` DECIMAL( 10, 4 ) NULL DEFAULT NULL ;";
            $this->execute($sql);
            // cambiando la longitud de decimales a 4
            $sql="ALTER TABLE `tbl_detalle_compra` CHANGE `precio_unitario` `precio_unitario` DECIMAL( 10, 4 ) NULL DEFAULT NULL ;";
            $this->execute($sql);
	}

	public function safeDown()
	{
            $sql="ALTER TABLE `tbl_detalle_orden_compra` CHANGE `precio_unitario` `precio_unitario` DECIMAL( 10, 2 ) NULL DEFAULT NULL ;";
            $this->execute($sql);
            
            $sql="ALTER TABLE `tbl_detalle_compra` CHANGE `precio_unitario` `precio_unitario` DECIMAL( 10, 2 ) NULL DEFAULT NULL ;";
            $this->execute($sql);
	}
	
}