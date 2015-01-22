<?php

class m140922_045337_create_tbl_facturacion extends CDbMigration
{
//	public function up()
//	{
//	}
//
//	public function down()
//	{
//		echo "m140922_045337_create_tbl_facturacion does not support migration down.\n";
//		return false;
//	}

	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
            $this->createTable('tbl_serie_numero', array(
                'id'=>'pk',
                'serie'=>'varchar(10)',
                'numero'=>'varchar(10)'
            ),'ENGINE=InnoDB');
	}

	public function safeDown()
	{
            $this->delete('tbl_serie_numero');
            $this->dropTable('tbl_serie_numero');
	}
	
}