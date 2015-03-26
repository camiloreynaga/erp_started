<?php

class m150319_222350_tbl_rango_precios extends CDbMigration
{
//	public function up()
//	{
//	}
//
//	public function down()
//	{
//		echo "m150319_222350_tbl_rango_precios does not support migration down.\n";
//		return false;
//	}

	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{  
            //Tabla Presentación
            $this->createTable('tbl_rango_precio',array(
                'id'=>'pk',
                'producto_id'=>'int(11) NOT NULL',
                'unidad_medida_id'=>'int(11) NOT NULL',
                'cantidad_inicial'=>'int(11) NOT NULL', //0=MOVIL / 1=FIJO
                'cantidad_final'=>'int(11) ',
                'precio'=>'decimal (10,2) NOT NULL',
                //registro para el sistema
                'create_time'=>'datetime DEFAULT NULL',
                'create_user_id'=> 'int(11) DEFAULT NULL',
                'update_time'=>'datetime DEFAULT NULL',
                'update_user_id'=>'int(11) DEFAULT NULL',
            ),'ENGINE=InnoDB');
            
           
            
	}

	public function safeDown()
	{
            $this->truncateTable('tbl_rango_precio');
            $this->dropTable('tbl_rango_precio');
            
            
	}
}