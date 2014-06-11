<?php

class m140527_173753_relaciones_tables extends CDbMigration
{
//	public function up()
//	{
//	}
//
//	public function down()
//	{
//		echo "m140527_173753_relaciones_tables does not support migration down.\n";
//		return false;
//	}

	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{//Relación e guia de remision con detalle de GR
            $this->addForeignKey('fk_guia_remision_detalle', 'tbl_detalle_guia_remision', 'guia_remision_id', 'tbl_guia_remision', 'id','CASCADE','RESTRICT');
            //Relación de detalle compra con Movimiento almacen
            $this->addForeignKey('fk_det_compra_mov_almacen', 'tbl_movimiento_almacen', 'detalle_compra_venta_id', 'tbl_detalle_compra', 'id','CASCADE','RESTRICT');
            //Relación de detalle vent con Movimiento almacen
            $this->addForeignKey('fk_det_venta_mov_almacen','tbl_movimiento_almacen', 'detalle_compra_venta_id', 'tbl_detalle_venta', 'id','CASCADE','RESTRICT');
            //Relación de empleado con usuario
            $this->addForeignKey('fk_empleado_usuario', 'tbl_usuario', 'empleado_id', 'tbl_empleado', 'id','CASCADE','RESTRICT');
            
	}

	public function safeDown()
	{
            
            $this->dropForeignKey('fk_guia_remision_detalle', 'tbl_detalle_guia_remision');
            $this->dropForeignKey('fk_det_compra_mov_almacen', 'tbl_movimiento_almacen');
            $this->dropForeignKey('fk_det_venta_mov_almacen', 'tbl_movimiento_almacen');
            $this->dropForeignKey('fk_empleado_usuario', 'tbl_usuario');
	}

}