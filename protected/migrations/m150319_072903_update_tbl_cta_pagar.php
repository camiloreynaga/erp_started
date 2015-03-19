<?php

class m150319_072903_update_tbl_cta_pagar extends CDbMigration
{
//	public function up()
//	{
//	}
//
//	public function down()
//	{
//		echo "m150319_072903_update_tbl_cta_pagar does not support migration down.\n";
//		return false;
//	}

	public function safeUp()
	{
            //agregando la columna punto de venta en tbl_venta
            $sql="ALTER TABLE `tbl_cuenta_pagar` ADD `descuento` decimal(10,2) NULL DEFAULT '0' AFTER `fecha_vencimiento`;";
            $this->execute($sql);
            
            //agregando la columna punto de venta en tbl_empleado
	}

	public function safeDown()
	{
            //Quitando la columna de pto_venta_id de tbl_venta
            $sql=" ALTER TABLE `tbl_cuenta_pagar` DROP `descuento` ;";
            $this->execute($sql);
            //quitando la columna pto_venta de tbl_empleado
	}
}