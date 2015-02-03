<?php

class m150201_041411_alter_tbl_detalle_compra extends CDbMigration
{
//	public function up()
//	{
//	}
//
//	public function down()
//	{
//		echo "m150201_041411_alter_tbl_detalle_compra does not support migration down.\n";
//		return false;
//	}

	public function safeUp()
	{
            //agregando la columna punto de venta en tbl_venta
            $sql="ALTER TABLE `tbl_detalle_compra` ADD `porcentaje_descuento` DECIMAL(10,2) NULL DEFAULT '0' AFTER `precio_unitario`;";
            $this->execute($sql);
            
            //agregando la columna punto de venta en tbl_empleado
	}

	public function safeDown()
	{
            //Quitando la columna de pto_venta_id de tbl_venta
            $sql=" ALTER TABLE `tbl_detalle_compra` DROP `porcentaje_descuento` ;";
            $this->execute($sql);
            //quitando la columna pto_venta de tbl_empleado
	}
}