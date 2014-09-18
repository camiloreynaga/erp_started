<?php

class m140705_070551_tbl_pagos extends CDbMigration
{
//	public function up()
//	{
//	}
//
//	public function down()
//	{
//		echo "m140705_070551_tbl_pagos does not support migration down.\n";
//		return false;
//	}

	public function safeUp()
	{
             $this->createTable('tbl_forma_pago',array(
                'id'=>'pk',
                'forma_pago'=>'varchar(20) NOT NULL',
                'activo'=>'bool DEFAULT 0', //0=Si 1=No
                //
                'create_time'=>'datetime DEFAULT NULL',
                'create_user_id'=> 'int(11) DEFAULT NULL',
                'update_time'=>'datetime DEFAULT NULL',
                'update_user_id'=>'int(11) DEFAULT NULL',
            ) ,'ENGINE=InnoDB');
             
            //ingresando primera ubicación
             $this->insert('tbl_forma_pago', array(
                 'id'=>'1',
                'forma_pago'=>'Credito',
                //
                'create_time'=>  date('Y-m-d H:i:s'),
                'create_user_id'=> '1',
                'update_time'=>date('Y-m-d H:i:s'),
                'update_user_id'=>'1',
             ));
             
             $this->insert('tbl_forma_pago', array(
                 'id'=>'2',
                'forma_pago'=>'Contado',
                //
                'create_time'=>  date('Y-m-d H:i:s'),
                'create_user_id'=> '1',
                'update_time'=>date('Y-m-d H:i:s'),
                'update_user_id'=>'1',
             ));
             
             $this->insert('tbl_forma_pago', array(
                 'id'=>'3',
                'forma_pago'=>'Letra',
                //
                'create_time'=>  date('Y-m-d H:i:s'),
                'create_user_id'=> '1',
                'update_time'=>date('Y-m-d H:i:s'),
                'update_user_id'=>'1',
             ));
             
             $this->addForeignKey('fk_venta_forma_pago', 'tbl_venta', 'forma_pago_id', 'tbl_forma_pago', 'id');
	}

	public function safeDown()
	{   
            $this->dropForeignKey('fk_venta_forma_pago', 'tbl_venta');
            $this->delete('tbl_forma_pago');
            $this->dropTable('tbl_forma_pago');
	}
}