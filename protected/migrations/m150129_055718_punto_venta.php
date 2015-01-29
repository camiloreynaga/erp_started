<?php

class m150129_055718_punto_venta extends CDbMigration
{
//	public function up()
//	{
//	}
//
//	public function down()
//	{
//		echo "m150129_055718_punto_venta does not support migration down.\n";
//		return false;
//	}

	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{  
            //Tabla Presentación
            $this->createTable('tbl_punto_venta',array(
                'id'=>'pk',
                'punto_venta'=>'varchar(50) NOT NULL',
                'tipo'=>'bool DEFAULT 0', //0=MOVIL / 1=FIJO
                'observacion'=>'TEXT',
                'direccion'=>'varchar(50) NULL', // und de medida
                'activo'=>'bool DEFAULT 0', // 0=si ;1=no
                //registro para el sistema
                'create_time'=>'datetime DEFAULT NULL',
                'create_user_id'=> 'int(11) DEFAULT NULL',
                'update_time'=>'datetime DEFAULT NULL',
                'update_user_id'=>'int(11) DEFAULT NULL',
            ),'ENGINE=InnoDB');
            
            #insert default cargos 
            $this->insert('tbl_punto_venta',array(
                'id'=>1,
                'punto_venta'=>'PRINCIPAL',
                'tipo'=>1, //OFICINA O LOCAL PRINCIPAL
                'observacion'=>'LOCAL PRINCIPAL',
                'activo'=>'0',
                'create_user_id'=>'1',
                'update_user_id'=>'1',
                'create_time'=>date("Y-m-d H:i:s"),
                'update_time'=>date("Y-m-d H:i:s"),
            ));
            
            $sql="ALTER TABLE `tbl_serie_numero` ADD `punto_venta_id` INT(11) NULL DEFAULT NULL AFTER `numero`;";
            $this->execute($sql);
            $sql="ALTER TABLE `tbl_serie_numero` ADD `comprobante_id` INT(11) NULL DEFAULT NULL AFTER `numero`;";
            $this->execute($sql);
            //Agregando una columna, punto_venta_id a t_almacen
            $sql=" ALTER TABLE `tbl_almacen` ADD `punto_venta_id` INT(11) NULL DEFAULT NULL AFTER `ubicacion_id`;";
            $sql_2=" UPDATE `tbl_almacen` SET `punto_venta_id` = '1' WHERE `tbl_almacen`.`id` =1;";
            $this->execute($sql);
            $this->execute($sql_2);
            
	}

	public function safeDown()
	{
            $this->truncateTable('tbl_punto_venta');
            $this->dropTable('tbl_punto_venta');
            //Quitando la columan de pto_venta_id de t_almacen
            $sql=" ALTER TABLE `tbl_almacen` DROP `punto_venta_id` ;";
            $this->execute($sql);
            //
            $sql=" ALTER TABLE `tbl_serie_numero` DROP `punto_venta_id` ;";
            $this->execute($sql);
            $sql=" ALTER TABLE `tbl_serie_numero` DROP `comprobante_id` ;";
            $this->execute($sql);
            
	}
	
}