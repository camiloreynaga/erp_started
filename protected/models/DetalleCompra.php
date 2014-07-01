<?php

/**
 * This is the model class for table "tbl_detalle_compra".
 *
 * The followings are the available columns in table 'tbl_detalle_compra':
 * @property integer $id
 * @property integer $compra_id
 * @property integer $producto_id
 * @property integer $cantidad
 * @property string $lote
 * @property string $fecha_vencimiento
 * @property integer $cantidad_bueno
 * @property integer $cantidad_malo
 * @property integer $estado
 * @property string $observacion
 * @property string $precio_unitario
 * @property string $subtotal
 * @property string $impuesto
 * @property string $total
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 *
 * The followings are the available model relations:
 * @property Producto $producto
 * @property Compra $compra
 * @property MovimientoAlmacen[] $movimientoAlmacens
 */
class DetalleCompra extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_detalle_compra';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('compra_id, producto_id, cantidad, cantidad_bueno, cantidad_malo, estado, create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
			array('lote', 'length', 'max'=>50),
			array('precio_unitario, subtotal, impuesto, total', 'length', 'max'=>10),
			array('fecha_vencimiento, observacion, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, compra_id, producto_id, cantidad, lote, fecha_vencimiento, cantidad_bueno, cantidad_malo, estado, observacion, precio_unitario, subtotal, impuesto, total, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'producto' => array(self::BELONGS_TO, 'Producto', 'producto_id'),
			'compra' => array(self::BELONGS_TO, 'Compra', 'compra_id'),
			'movimientoAlmacens' => array(self::HAS_MANY, 'MovimientoAlmacen', 'detalle_compra_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'compra_id' => 'Compra',
			'producto_id' => 'Producto',
			'cantidad' => 'Cantidad',
			'lote' => 'Lote',
			'fecha_vencimiento' => 'Fecha Vencimiento',
			'cantidad_bueno' => 'Cantidad Bueno',
			'cantidad_malo' => 'Cantidad Malo',
			'estado' => 'Estado',
			'observacion' => 'Observacion',
			'precio_unitario' => 'Precio Unitario',
			'subtotal' => 'Subtotal',
			'impuesto' => 'Impuesto',
			'total' => 'Total',
			'create_time' => 'Create Time',
			'create_user_id' => 'Create User',
			'update_time' => 'Update Time',
			'update_user_id' => 'Update User',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('compra_id',$this->compra_id);
		$criteria->compare('producto_id',$this->producto_id);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('lote',$this->lote,true);
		$criteria->compare('fecha_vencimiento',$this->fecha_vencimiento,true);
		$criteria->compare('cantidad_bueno',$this->cantidad_bueno);
		$criteria->compare('cantidad_malo',$this->cantidad_malo);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('observacion',$this->observacion,true);
		$criteria->compare('precio_unitario',$this->precio_unitario,true);
		$criteria->compare('subtotal',$this->subtotal,true);
		$criteria->compare('impuesto',$this->impuesto,true);
		$criteria->compare('total',$this->total,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DetalleCompra the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
