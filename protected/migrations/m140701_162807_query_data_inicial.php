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
            // tipo de und de medida
           // $this->delete('tbl_unidad_medida');
            $this->insert('tbl_unidad_medida', array(
                'id'=>1,
                'unidad_medida'=>'UNIDAD',
                'nonmenclatura'=>'UND',
                'cantidad_equivalente'=>1,
                'unidad_equivalente'=>1,
                //
                'create_time'=>date("Y-m-d H:i:s"),
                'create_user_id'=> '1',
                'update_time'=>date("Y-m-d H:i:s"),
                'update_user_id'=>'1',
            ));
            //almacen principal
            //
            
            $this->insert('tbl_almacen',array(
                'id'=>1,
                'almacen'=>'PRINCIPAL',
                'ubicacion_id'=>1,
                'activo'=>0,
                //
                'create_time'=>date("Y-m-d H:i:s"),
                'create_user_id'=> '1',
                'update_time'=>date("Y-m-d H:i:s"),
                'update_user_id'=>'1',
            ) );
            
            //motivos de movimiento Almacen
            $this->insert('tbl_motivo_movimiento', array(
                'id'=>'1',
                'movimiento'=>'COMPRA',
                'tipo_movimiento'=>'0',
                //
                'create_time'=>date("Y-m-d H:i:s"),
                'create_user_id'=> '1',
                'update_time'=>date("Y-m-d H:i:s"),
                'update_user_id'=>'1',
                
            ));
            $this->insert('tbl_motivo_movimiento', array(
                'id'=>'2',
                'movimiento'=>'VENTA',
                'tipo_movimiento'=>'1',
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
            $this->delete('tbl_movimiento_almacen');
            $this->delete('tbl_almacen');
	}
	
}