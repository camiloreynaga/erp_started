<?php

class m141210_045553_new_tables_relation_products extends CDbMigration
{
/*	
    public function up()
	{
	}

	public function down()
	{
		echo "m141210_045553_new_tables_relation_products does not support migration down.\n";
		return false;
	}
*/
	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{ 
            //tablas para Color
            $this->createTable('tbl_color',array(
                   'id'=>'pk',
                   'color'=>'varchar(50) NOT NULL',
                   'create_time'=>'datetime DEFAULT NULL',
                   'create_user_id'=> 'int(11) DEFAULT NULL',
                   'update_time'=>'datetime DEFAULT NULL',
                   'update_user_id'=>'int(11) DEFAULT NULL',
               ),'ENGINE=InnoDB');
            //tablas para impuestos
            //los impuesto se aplican a todos los productos
            //
            $this->createTable('tbl_tax',array(
                   'id'=>'pk',
                   'tax'=>'varchar(50) NOT NULL',
                   'percent'=>'decimal(10,2) NOT NULL',
                   'condition'=>'TEXT DEFAULT NULL', //si la condicion es null se aplica a todos
                   'active'=>'bool DEFAULT 0', //0=Si 1=No
                   'create_time'=>'datetime DEFAULT NULL',
                   'create_user_id'=> 'int(11) DEFAULT NULL',
                   'update_time'=>'datetime DEFAULT NULL',
                   'update_user_id'=>'int(11) DEFAULT NULL',
               ),'ENGINE=InnoDB');
            
            //tabla para ofertas 
            $this->createTable('tbl_offer',array(
                   'id'=>'pk',
                   'offer'=>'varchar(50) NOT NULL',
                   'discount_rate'=>'decimal(10,2) NOT NULL',
                   'condition'=>'TEXT DEFAULT NULL',
                   'start_date'=>'datetime NOT NULL',
                   'expiration_date'=>'datetime DEFAULT NULL',
                   'active'=>'bool DEFAULT 0', //0=Si 1=No
                   'create_time'=>'datetime DEFAULT NULL',
                   'create_user_id'=> 'int(11) DEFAULT NULL',
                   'update_time'=>'datetime DEFAULT NULL',
                   'update_user_id'=>'int(11) DEFAULT NULL',
               ),'ENGINE=InnoDB');
            
            //tbl para images
            $this->createTable('tbl_image',array(
                   'id'=>'pk',
                   'producto_id'=>'int(11)',
                   'image_name'=>'text NOT NULL',
                   'image_path'=>'text NOT NULL',
                   'create_time'=>'datetime DEFAULT NULL',
                   'create_user_id'=> 'int(11) DEFAULT NULL',
                   'update_time'=>'datetime DEFAULT NULL',
                   'update_user_id'=>'int(11) DEFAULT NULL',
               ),'ENGINE=InnoDB');
            
            //tabla para color por producto
            $this->createTable('tbl_color_product',array(
                   'id'=>'pk',
                   'color_id'=>'int(11)NOT NULL',
                   'producto_id'=>'int(11)NOT NULL',
                   'stock'=>'int',
                   'create_time'=>'datetime DEFAULT NULL',
                   'create_user_id'=> 'int(11) DEFAULT NULL',
                   'update_time'=>'datetime DEFAULT NULL',
                   'update_user_id'=>'int(11) DEFAULT NULL',
               ),'ENGINE=InnoDB');
            //tabla para unida de medida por producto
            $this->createTable('tbl_und_med_product',array(
                   'id'=>'pk',
                   'und_medida_id'=>'int(11) NOT NULL',
                   'producto_id'=>'int(11) NOT NULL',
                   'precio'=>'decimal(10,2)',
                   'create_time'=>'datetime DEFAULT NULL',
                   'create_user_id'=> 'int(11) DEFAULT NULL',
                   'update_time'=>'datetime DEFAULT NULL',
                   'update_user_id'=>'int(11) DEFAULT NULL',
               ),'ENGINE=InnoDB');
            
            //tabla para tax por producto
            $this->createTable('tbl_tax_product',array(
                   'id'=>'pk',
                   'tax_id'=>'int(11) NOT NULL',
                   'producto_id'=>'int(11) NOT NULL',
                   'create_time'=>'datetime DEFAULT NULL',
                   'create_user_id'=> 'int(11) DEFAULT NULL',
                   'update_time'=>'datetime DEFAULT NULL',
                   'update_user_id'=>'int(11) DEFAULT NULL',
               ),'ENGINE=InnoDB');
            
            //relacion producto imagenes
            $this->addForeignKey('fk_product_image', 'tbl_image', 'producto_id', 'tbl_producto', 'id','CASCADE','RESTRICT');
            
            //relacion color producto 
            $this->addForeignKey('fk_color_producto', 'tbl_color_product', 'color_id', 'tbl_color', 'id','CASCADE','RESTRICT'); 
            $this->addForeignKey('fk_producto_color', 'tbl_color_product', 'producto_id', 'tbl_producto', 'id','CASCADE','RESTRICT');
            //relacion unidad medida producto 
            $this->addForeignKey('fk_und_med_producto', 'tbl_und_med_product', 'und_medida_id', 'tbl_unidad_medida', 'id','CASCADE','RESTRICT');
            $this->addForeignKey('fk_producto_und_med', 'tbl_und_med_product', 'producto_id', 'tbl_producto', 'id','CASCADE','RESTRICT');
            //relacion unidad medida producto 
            $this->addForeignKey('fk_tax_producto', 'tbl_tax_product', 'tax_id', 'tbl_tax', 'id','CASCADE','RESTRICT');
            $this->addForeignKey('fk_producto_tax', 'tbl_tax_product', 'producto_id', 'tbl_producto', 'id','CASCADE','RESTRICT');
            

	}

	public function safeDown()
	{
            $this->dropForeignKey('fk_product_image', 'tbl_image');
            $this->dropForeignKey('fk_color_producto', 'tbl_color_product');
            $this->dropForeignKey('fk_producto_color', 'tbl_color_product');
            
            $this->dropForeignKey('fk_und_med_producto', 'tbl_und_med_product');
            $this->dropForeignKey('fk_producto_und_med', 'tbl_und_med_product');
          
            $this->dropForeignKey('fk_tax_producto', 'tbl_tax_product');
            $this->dropForeignKey('fk_producto_tax', 'tbl_tax_product');
            
            $this->dropTable('tbl_image');
            $this->dropTable('tbl_tax_product');
            $this->dropTable('tbl_und_med_product');
            $this->dropTable('tbl_color_product');
            $this->dropTable('tbl_offer');
            $this->dropTable('tbl_tax');
            $this->dropTable('tbl_color');
            
	}
}