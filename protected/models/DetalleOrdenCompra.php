<?php

/**
 * This is the model class for table "tbl_detalle_orden_compra".
 *
 * The followings are the available columns in table 'tbl_detalle_orden_compra':
 * @property integer $id
 * @property integer $orden_compra_id
 * @property integer $producto_id
 * @property integer $cantidad
 * @property string $observacion
 * @property string $precio_unitario
 * @property string $subtotal
 * @property string $impuesto
 * @property string $total
 *
 * The followings are the available model relations:
 * @property OrdenCompra $ordenCompra
 */
class DetalleOrdenCompra extends CActiveRecord
{
    
    
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DetalleOrdenCompra the static model class
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
		return 'tbl_detalle_orden_compra';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('orden_compra_id, producto_id, cantidad', 'numerical', 'integerOnly'=>true),
                        array('producto_id,cantidad','required'),
			array('precio_unitario, subtotal, impuesto, total', 'length', 'max'=>10),
			array('observacion', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, orden_compra_id,  producto_id, cantidad, observacion, precio_unitario, subtotal, impuesto, total', 'safe', 'on'=>'search'),
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
			'r_ordenCompra' => array(self::BELONGS_TO, 'OrdenCompra', 'orden_compra_id'),
                        'r_producto'=>array(self::BELONGS_TO,'Producto','producto_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'orden_compra_id' => 'Orden Compra',
			'producto_id' => 'Producto',
			'cantidad' => 'Cantidad',
			'observacion' => 'Observacion',
			'precio_unitario' => 'Precio Unitario',
			'subtotal' => 'Subtotal',
			'impuesto' => 'Impuesto',
			'total' => 'Total',
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

		$criteria->compare('t.id',$this->id);
		$criteria->compare('orden_compra_id',$this->orden_compra_id);
		$criteria->compare('producto_id',$this->producto_id);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('observacion',$this->observacion,true);
		$criteria->compare('precio_unitario',$this->precio_unitario,true);
		$criteria->compare('subtotal',$this->subtotal,true);
		$criteria->compare('impuesto',$this->impuesto,true);
		$criteria->compare('total',$this->total,true);
                //$criteria->order('id');
                //$criteria->order= 'id DESC';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function getItemsDetalleOrdenCompra($id_oc)
        {
            $criteria= new CDbCriteria();
            $criteria->condition='orden_compra_id='.$id_oc; //pendiente
            //$criteria->with=array('r_proveedor');
            //$_lab= Fabricante::model()->tablename();
            //$criteria->join='inner join '.$_lab.' lab on lab.id = t.fabricante_id ';
            
            return $lista= $this->model()->findAll($criteria); 
            
//            $lista= $this->model()->findAll($criteria); 
//              $resultados = array();
//              foreach ($lista as $list){
//                $resultados[] = array(
//                         'id'=>$list->id,
//                         'text'=> $list->id.'-'.$list->r_proveedor->nombre_rz. ' (Fecha:'.$list->fecha_orden.')',
//              ); 
//            
//              }
//              return $resultados;   
        }
}