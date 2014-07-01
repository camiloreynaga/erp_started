<?php

/**
 * This is the model class for table "tbl_producto".
 *
 * The followings are the available columns in table 'tbl_producto':
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property integer $tipo_producto_id
 * @property integer $presentacion_id
 * @property integer $unidad_medida_id
 * @property integer $fabricante_id
 * @property integer $minimo_stock
 * @property integer $stock
 * @property integer $descontinuado
 * @property double $precio_venta
 * @property double $precio_compra
 * @property double $porcentaje_ganancia
 * @property integer $ventaUnd
 * @property string $observacion
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 *
 * The followings are the available model relations:
 * @property CaracteristicaProducto[] $tblCaracteristicaProductos
 * @property DetalleCaractProducto[] $tblDetalleCaractProductos
 * @property DetalleCompra[] $tblDetalleCompras
 * @property DetalleVenta[] $tblDetalleVentas
 * @property Fabricante $fabricante
 * @property Presentacion $presentacion
 * @property TipoProducto $tipoProducto
 * @property UnidadMedida $unidadMedida
 * @property ProductoDetalle[] $tblProductoDetalles
 * @property ProductoDetalle[] $tblProductoDetalles1
 */
class Producto extends Erp_startedActiveRecord// CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Producto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_producto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre', 'required'),
			array('tipo_producto_id, presentacion_id, unidad_medida_id, fabricante_id, minimo_stock, stock, descontinuado, create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
			array('precio_venta, precio_compra, porcentaje_ganancia', 'numerical'),
			array('nombre', 'length', 'max'=>100),
			array('descripcion, observacion, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, descripcion, tipo_producto_id, presentacion_id, unidad_medida_id, fabricante_id, minimo_stock, stock, descontinuado, precio_venta, observacion, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'r_caracteristicaProductos' => array(self::HAS_MANY, 'CaracteristicaProducto', 'producto_id'),
			'r_detalleCompras' => array(self::HAS_MANY, 'DetalleCompra', 'producto_id'),
			'r_detalleVentas' => array(self::HAS_MANY, 'DetalleVenta', 'producto_id'),
			'r_fabricante' => array(self::BELONGS_TO, 'Fabricante', 'fabricante_id'),
			'r_presentacion' => array(self::BELONGS_TO, 'Presentacion', 'presentacion_id'),
			'r_tipoProducto' => array(self::BELONGS_TO, 'TipoProducto', 'tipo_producto_id'),
			'r_unidadMedida' => array(self::BELONGS_TO, 'UnidadMedida', 'unidad_medida_id'),
                        'r_productoDetalle' => array(self::HAS_MANY, 'ProductoDetalle', 'producto_id'),
			'r_productoGrupo' => array(self::HAS_MANY, 'ProductoDetalle', 'producto_grupo_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'descripcion' => 'Descripcion',
			'tipo_producto_id' => 'Tipo Producto',
			'presentacion_id' => 'Presentacion',
			'unidad_medida_id' => 'Unidad Medida',
			'fabricante_id' => 'Fabricante',
			'minimo_stock' => 'Minimo Stock',
			'stock' => 'Stock',
			'descontinuado' => 'Descontinuado',
			'precio_venta' => 'Precio Venta',
                        'precio_compra' => 'Precio Compra',
			'porcentaje_ganancia' => 'Porcentaje Ganancia',
                        'ventaUnd' => 'Venta Und',
			'observacion' => 'Observacion',
			'create_time' => 'Create Time',
			'create_user_id' => 'Create User',
			'update_time' => 'Update Time',
			'update_user_id' => 'Update User',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
                $criteria->with=array('r_fabricante','r_presentacion','r_tipoProducto');
                //$_lab= Fabricante::model()->tablename();
               // $criteria->join='inner join '.$_lab.' lab on lab.id = t.fabricante_id ';
                        
		$criteria->compare('id',$this->id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('r_tipoProducto.tipo_producto',$this->tipo_producto_id,true);
		$criteria->compare('r_presentacion.presentacion',$this->presentacion_id,true);
		$criteria->compare('unidad_medida_id',$this->unidad_medida_id,true);
		$criteria->compare('r_fabricante.fabricante',$this->fabricante_id,true);
                //$criteria->compare('fabricante_id',$this->fabricante_id);
		$criteria->compare('minimo_stock',$this->minimo_stock);
		$criteria->compare('stock',$this->stock);
		$criteria->compare('descontinuado',$this->descontinuado);
		$criteria->compare('precio_venta',$this->precio_venta);
               // $criteria->compare('precio_compra',$this->precio_compra);
		//$criteria->compare('porcentaje_ganancia',$this->porcentaje_ganancia);
                $criteria->compare('ventaUnd',$this->ventaUnd);
		$criteria->compare('observacion',$this->observacion,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        
         //nuevos metodos
        //nuevos metodos
//         public function getPresentacionOptions()
//        {
//             
//            $presentacionArray=CHtml::listData($this->presentacion, 'id', 'presentacion');
//            return $presentacionArray;
//        }
        
        ///Obtiene las presentaciones disponibles
        public function getPresentacionOptions()
        {
            $criteria = new CDbCriteria();
		$criteria->order='presentacion';
                $criteria->condition='activo=0';
		return Presentacion::model()->findAll($criteria);
        }
        
        //obtiene los tipos de productos disponibles
        public function getTipoOptions()
        {
            $criteria= new CDbCriteria();
            $criteria->order='tipo_producto';
            $criteria->condition='activo=0';
            return TipoProducto::model()->findAll($criteria);
        }
        //obtiene las unidades de medida disponibles
        public function getUndMedidaOptions()
        {
            $criteria= new CDbCriteria();
            $criteria->order='unidad_medida';
            $criteria->condition='activo=0';
            return UnidadMedida::model()->findAll($criteria);
        }
        //obtiene los fabricantes/ marcas/ laboratorios disponibles
        public function getFabricanteOptions()
        {
            $criteria = new CDbCriteria();
            $criteria->order='fabricante';
            $criteria->condition='activo=0';
            return Fabricante::model()->findAll($criteria);
        }
        //obtien las caracteristicas adicionales para un producto
        public function getCaracteristicaOptions()
        {
            $criteria=new CDbCriteria();
            $criteria->order='caracteristica';
            $criteria->condition='activo=0';
            return Caracteristica::model()->findAll($criteria);
        }
        
        public function getProductos()
        {
            $criteria= new CDbCriteria();
            $criteria->condition='descontinuado=0';
            $criteria->with=array('r_fabricante');
            //$criteria->together=true;
            $_lab= Fabricante::model()->tablename();
           // $criteria->select='t.id,lab.fabricante as lab,t.nombre,t.stock';
            $criteria->join='inner join '.$_lab.' lab on lab.id = t.fabricante_id ';
            
            $lista= $this->model()->findAll($criteria); 
              $resultados = array();
              foreach ($lista as $list){
                $resultados[] = array(
                         'id'=>$list->id,
                         'text'=> $list->nombre.'-'.$list->r_fabricante->fabricante. ' (STOCK:'.$list->stock.')',
              ); 
            
              }
              return $resultados;   
        }
        
}