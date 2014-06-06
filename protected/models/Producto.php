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
 * @property integer $descontinado
 * @property double $precio
 * @property integer $ventaUnd
 * @property string $observacion
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 *
 * The followings are the available model relations:
 * @property TblCaracteristicaProducto[] $tblCaracteristicaProductos
 * @property TblDetalleCaractProducto[] $tblDetalleCaractProductos
 * @property TblDetalleCompra[] $tblDetalleCompras
 * @property TblDetalleVenta[] $tblDetalleVentas
 * @property TblFabricante $fabricante
 * @property TblPresentacion $presentacion
 * @property TblTipoProducto $tipoProducto
 * @property TblUnidadMedida $unidadMedida
 * @property TblProductoDetalle[] $tblProductoDetalles
 * @property TblProductoDetalle[] $tblProductoDetalles1
 */
class Producto extends CActiveRecord
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
			array('tipo_producto_id, presentacion_id, unidad_medida_id, fabricante_id, minimo_stock, stock, descontinado, create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
			array('precio', 'numerical'),
			array('nombre', 'length', 'max'=>100),
			array('descripcion, observacion, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, descripcion, tipo_producto_id, presentacion_id, unidad_medida_id, fabricante_id, minimo_stock, stock, descontinado, precio, observacion, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'tblCaracteristicaProductos' => array(self::HAS_MANY, 'TblCaracteristicaProducto', 'producto_id'),
			'tblDetalleCaractProductos' => array(self::HAS_MANY, 'TblDetalleCaractProducto', 'producto_id'),
			'tblDetalleCompras' => array(self::HAS_MANY, 'TblDetalleCompra', 'producto_id'),
			'tblDetalleVentas' => array(self::HAS_MANY, 'TblDetalleVenta', 'producto_id'),
			'fabricante' => array(self::BELONGS_TO, 'Fabricante', 'fabricante_id'),
			'presentacion' => array(self::BELONGS_TO, 'Presentacion', 'presentacion_id'),
			'tipoProducto' => array(self::BELONGS_TO, 'TipoProducto', 'tipo_producto_id'),
			'unidadMedida' => array(self::BELONGS_TO, 'UnidadMedida', 'unidad_medida_id'),
                        'productoDetalle' => array(self::HAS_MANY, 'ProductoDetalle', 'producto_id'),
			'productoGrupo' => array(self::HAS_MANY, 'ProductoDetalle', 'producto_grupo_id'),
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
			'descontinado' => 'Descontinado',
			'precio' => 'Precio',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('tipo_producto_id',$this->tipo_producto_id);
		$criteria->compare('presentacion_id',$this->presentacion_id);
		$criteria->compare('unidad_medida_id',$this->unidad_medida_id);
		$criteria->compare('fabricante_id',$this->fabricante_id);
		$criteria->compare('minimo_stock',$this->minimo_stock);
		$criteria->compare('stock',$this->stock);
		$criteria->compare('descontinado',$this->descontinado);
		$criteria->compare('precio',$this->precio);
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
		return Presentacion::model()->findAll($criteria);
        }
        
        //obtiene los tipos de productos disponibles
        public function getTipoOptions()
        {
            $criteria= new CDbCriteria();
            $criteria->order='tipo_producto';
            return TipoProducto::model()->findAll($criteria);
        }
        //obtiene las unidades de medida disponibles
        public function getUndMedidaOptions()
        {
            $criteria= new CDbCriteria();
            $criteria->order='unidad_medida';
            return UnidadMedida::model()->findAll($criteria);
        }
        //obtiene los fabricantes/ marcas/ laboratorios disponibles
        public function getFabricanteOptions()
        {
            $criteria = new CDbCriteria();
            $criteria->order='fabricante';
            return Fabricante::model()->findAll($criteria);
        }
        //obtien las caracteristicas adicionales para un producto
        public function getCaracteristicaOptions()
        {
            $criteria=new CDbCriteria();
            $criteria->order='caracteristica';
            return Caracteristica::model()->findAll($criteria);
        }
        
}