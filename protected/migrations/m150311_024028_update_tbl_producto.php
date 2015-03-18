<?php

class m150311_024028_update_tbl_producto extends CDbMigration
{
//	public function up()
//	{
//	}
//
//	public function down()
//	{
//		echo "m150311_024028_update_tbl_producto does not support migration down.\n";
//		return false;
//	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/public function safeUp()
	{
            //agregando la columna punto de venta en tbl_venta
            $sql="ALTER TABLE `tbl_producto` ADD `codigo_barra` varchar(50) NULL DEFAULT '0' AFTER `codigo`;";
            $this->execute($sql);
            
            //agregando la columna punto de venta en tbl_empleado
	}

	public function safeDown()
	{
            //Quitando la columna de pto_venta_id de tbl_venta
            $sql=" ALTER TABLE `tbl_producto` DROP `codigo_barra` ;";
            $this->execute($sql);
            //quitando la columna pto_venta de tbl_empleado
	}
}