<?php

class m140701_162807_query_data_inicial extends CDbMigration
{
//	public function up()
//	{
//	}
//
//	public function down()
//	{
//		echo "m140701_162807_query_data_inicial does not support migration down.\n";
//		return false;
//	}

	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
           // $this->delete('tbl_unidad_medida');
            $this->insert('tbl_unidad_medida', array(
                'id'=>1,
                'unidad_medida'=>'Unidad',
                'nonmenclatura'=>'und',
                //
               'create_time'=>date("Y-m-d H:i:s"),
                'create_user_id'=> '1',
                'update_time'=>date("Y-m-d H:i:s"),
                'update_user_id'=>'1',
            ));
            
	}

	public function safeDown()
	{
            $this->delete('tbl_unidad_medida');
	}
	
}