<?php

class m140520_215205_create_beging_tables extends CDbMigration
{
//	public function up()
//	{
//	}
//
//	public function down()
//	{
//		echo "m140520_215205_create_beging_tables does not support migration down.\n";
//		return false;
//	}

	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
            //Tabla Presentación
            $this->createTable('tbl_presentacion',array(
                'id'=>'pk',
                'presentacion'=>'varchar(50) NOT NULL',
                'nonmeclatura'=>'varchar(50) NOT NULL', // und de medida
                //registro para el sistema
                'create_time'=>'datetime DEFAULT NULL',
                'create_user_id'=> 'int(11) DEFAULT NULL',
                'update_time'=>'datetime DEFAULT NULL',
                'update_user_id'=>'int(11) DEFAULT NULL',
            ),'ENGINE=InnoDB');
            //Tabla tipo de producto
            $this->createTable('tbl_tipo_producto',array(
                'id'=>'pk',
                'tipo_producto'=>'varchar(50) NOT NULL',
                //registro para el sistema
                'create_time'=>'datetime DEFAULT NULL',
                'create_user_id'=> 'int(11) DEFAULT NULL',
                'update_time'=>'datetime DEFAULT NULL',
                'update_user_id'=>'int(11) DEFAULT NULL',
            ),'ENGINE=InnoDB');
            
            //Tabla Fabricante / Marca / Laboratorio
            
            $this->createTable('tbl_fabricante', array(
                'id'=>'pk',
                'fabricante'=>'varchar(50) NOT NULL',
                //registro para el sistema
                'create_time'=>'datetime DEFAULT NULL',
                'create_user_id'=> 'int(11) DEFAULT NULL',
                'update_time'=>'datetime DEFAULT NULL',
                'update_user_id'=>'int(11) DEFAULT NULL',
            ),'ENGINE=InnoDB');
            
            //tabla Caracteristica
            
            $this->createTable('tbl_caracteristica', array(
                'id'=>'pk',
                'caracteristica'=>'varchar(50)',
                //registro para el sistema
                'create_time'=>'datetime DEFAULT NULL',
                'create_user_id'=> 'int(11) DEFAULT NULL',
                'update_time'=>'datetime DEFAULT NULL',
                'update_user_id'=>'int(11) DEFAULT NULL',
            ), 'ENGINE=InnoDB');
            
            //tabla Producto
            
             $this->createTable('tbl_producto',array(
                'id'=>'pk',
                'nombre'=>'varchar(100) NOT NULL',
                'descripcion'=>'text DEFAULT NULL',
                'tipo_producto_id'=>'int(11) DEFAULT NULL',
                'presentacion_id'=>'int(11) DEFAULT NULL',
                'fabricante_id'=>'int(11) DEFAULT NULL',
                'minimo_stock'=>'int(11) DEFAULT 0', // revisar
                'stock'=>'int(11) DEFAULT 0',              
                'descontinado'=>'bool DEFAULT 0',
                'precio'=>'float DEFAULT 0',
                'observacion'=>'text DEFAULT NULL',
                //registro para el sistema
                'create_time'=>'datetime DEFAULT NULL',
                'create_user_id'=> 'int(11) DEFAULT NULL',
                'update_time'=>'datetime DEFAULT NULL',
                'update_user_id'=>'int(11) DEFAULT NULL',
                    ),'ENGINE=InnoDB');
            //Tabla caracteristica por producto
             $this->createTable('tbl_producto_caracteristica', array(
                 'id'=>'pk',
                 'producto_id'=>'int (11) NOT NULL',
                 'caracteristica_id'=>'int(11) NOT NULL',
                 'comentario'=>'text DEFAULT NULL',
                 'nonmenclatura'=>'varchar(50)',
             ),'ENGINE=InnoDB');
             
             //relaciones
             //producto tiene una presentacion 
             $this->addForeignKey('fk_presentacion_producto', 'tbl_producto', 'presentacion_id', 'tbl_presentacion','id', 'CASCADE', 'RESTRICT');
             //producto tiene pertenece a un tipo
             $this->addForeignKey('fk_tipo_producto','tbl_producto', 'tipo_producto_id','tbl_tipo_producto', 'id', 'CASCADE', 'RESTRICT');
             //producto tiene un fabricante
             $this->addForeignKey('fk_fabricante_producto', 'tbl_producto', 'fabricante_id', 'tbl_fabricante', 'id', 'CASCADE', 'RESTRICT');
             //caracteristica por producto
             $this->addForeignKey('fk_caracteristica_producto', 'tbl_producto_caracteristica', 'caracteristica_id','tbl_caracteristica', 'id', 'CASCADE', 'RESTRICT');
             //producto por caracteristica 
             $this->addForeignKey('fk_producto_caracteristica', 'tbl_producto_caracteristica', 'producto_id', 'tbl_producto', 'id','CASCADE', 'RESTRICT');
             
	}

	public function safeDown()
	{
            $this->dropForeignKey('fk_presentacion_producto', 'tbl_producto');
            $this->dropForeignKey('fk_tipo_producto', 'tbl_producto');
            $this->dropForeignKey('fk_fabricante_producto','tbl_producto');
            $this->dropForeignKey('fk_caracteristica_producto', 'tbl_producto_caracteristica');
            $this->dropForeignKey('fk_producto_caracteristica', 'tbl_producto_caracteristica');
            
            $this->dropTable('tbl_presentacion');
            $this->dropTable('tbl_tipo_producto');
            $this->dropTable('tbl_fabricante');
            $this->dropTable('tbl_caracteristica');
            $this->dropTable('tbl_producto');
            $this->dropTable('tbl_producto_caracteristica');
	}
	
}