<?php

class m140521_051336_create_begining_almacen_tables extends CDbMigration
{
//	public function up()
//	{
//	}
//
//	public function down()
//	{
//		echo "m140521_051336_create_begining_almacen_tables does not support migration down.\n";
//		return false;
//	}

	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
            //tabla almacen
            $this->createTable('tbl_almacen',array(
                'id'=>'pk',
                'almacen'=>'varchar(50) NOT NULL',
                'ubicacion'=>'int(11)',
                //
                'create_time' => 'datetime DEFAULT NULL',
                'create_user_id' => 'int(11) DEFAULT NULL',
                'update_time' => 'datetime DEFAULT NULL',
                'update_user_id' => 'int(11) DEFAULT NULL',
            ), 'ENGINE=InnoDB');
                   
            //tabla movimiento- Operaciones de almacen
            
            $this->createTable('tbl_movimiento_almacen',array(
                'id'=>'pk',
                'fecha_mov'=>'Date',
                'producto_id'=>'int(11) NOT NULL',
                'cantidad'=>'int(11) NOT NULL',
                'motivo_mov_id'=>'int(11) NOT NULL', // relacionado a ingreso o salida
                'detalle_compra_venta_id'=>'int(11)',
                'observacion'=>'text DEFAULT NULL',
                'almacen_id'=>'int(11)',
                'saldo_stock'=>'int(11)',
                
                'create_time' => 'datetime DEFAULT NULL',
                'create_user_id' => 'int(11) DEFAULT NULL',
                'update_time' => 'datetime DEFAULT NULL',
                'update_user_id' => 'int(11) DEFAULT NULL',
                
            ), 'ENGINE=InnoDB');
            //tabla para motivos y tipos de operación/ movimiento almacen
            $this->createTable('tbl_motivo_movimiento', array(
                'id'=>'pk',
                'concepto_movimiento'=>'varchar(50) NOT NULL',
                'tipo_movimiento'=>'int(11)',// 0=entrada 1=salida 2=custodia
                //
                'create_time' => 'datetime DEFAULT NULL',
                'create_user_id' => 'int(11) DEFAULT NULL',
                'update_time' => 'datetime DEFAULT NULL',
                'update_user_id' => 'int(11) DEFAULT NULL',
            ),'ENGINE=InnoDB');
            
            //relaciones
            
            $this->addForeignKey('fk_motivo_movimiento','tbl_movimiento_almacen', 'motivo_mov_id', 'tbl_motivo_movimiento','id', 'CASCADE', 'RESTRICT');
            $this->addForeignKey('fk_movimiento_almacen', 'tbl_movimiento_almacen', 'almacen_id', 'tbl_almacen', 'id', 'CASCADE', 'RESTRICT');
	}

	public function safeDown()
	{
            //quitando relaciones
            $this->dropForeignKey('fk_motivo_movimiento', 'tbl_movimiento_almacen');
            $this->dropForeignKey('fk_movimiento_almacen', 'tbl_movimiento_almacen');
            
            $this->dropTable('tbl_almacen');
            $this->dropTable('tbl_movimiento_almacen');
            $this->dropTable('tbl_motivo_movimiento');
                    
	}
	
}