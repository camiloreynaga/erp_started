<?php

class m150131_031512_alter_tbl_venta extends CDbMigration
{
//	public function up()
//	{
//	}
//
//	public function down()
//	{
//		echo "m150131_031512_alter_tbl_venta does not support migration down.\n";
//		return false;
//	}

	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
            //agregando la columna punto de venta en tbl_venta
            $sql="ALTER TABLE `tbl_venta` ADD `punto_venta_id` INT(11) NULL DEFAULT NULL AFTER `id`;";
            $this->execute($sql);
            //agregando la columna punto de venta en tbl_empleado
            $sql="ALTER TABLE `tbl_empleado` ADD `punto_venta_id` INT(11) NULL DEFAULT NULL AFTER `id`;";
            $this->execute($sql);
            $sql="UPDATE `tbl_empleado` SET `punto_venta_id` = '1' WHERE `tbl_empleado`.`id` =1;";
            $this->execute($sql);
            
	}

	public function safeDown()
	{
            //Quitando la columna de pto_venta_id de tbl_venta
            $sql=" ALTER TABLE `tbl_venta` DROP `punto_venta_id` ;";
            $this->execute($sql);
            //quitando la columna pto_venta de tbl_empleado
            $sql=" ALTER TABLE `tbl_empleado` DROP `punto_venta_id` ;";
            $this->execute($sql);
	}
	
}