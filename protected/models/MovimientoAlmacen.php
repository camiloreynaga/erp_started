<?php

/**
 * This is the model class for table "tbl_movimiento_almacen".
 *
 * The followings are the available columns in table 'tbl_movimiento_almacen':
 * @property integer $id
 * @property string $fecha_movimiento
 * @property integer $producto_id
 * @property integer $cantidad
 * @property integer $motivo_movimiento_id
 * @property integer $detalle_compra_id
 * @property integer $detalle_venta_id
 * @property string $observacion
 * @property integer $almacen_id
 * @property integer $saldo_stock
 * @property integer $operacion
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 *
 * The followings are the available model relations:
 * @property DetalleVenta $detalleVenta
 * @property DetalleCompra $detalleCompra
 * @property MotivoMovimiento $motivoMovimiento
 * @property Almacen $almacen
 */
class MovimientoAlmacen extends Erp_startedActiveRecord//CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_movimiento_almacen';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('producto_id, cantidad, motivo_movimiento_id', 'required'),
			array('producto_id, cantidad, motivo_movimiento_id, detalle_compra_id, detalle_venta_id, almacen_id, saldo_stock, operacion, create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
			array('fecha_movimiento, observacion, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, fecha_movimiento, producto_id, cantidad, motivo_movimiento_id, detalle_compra_id, detalle_venta_id, observacion, almacen_id, saldo_stock, operacion, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'detalleVenta' => array(self::BELONGS_TO, 'DetalleVenta', 'detalle_venta_id'),
			'detalleCompra' => array(self::BELONGS_TO, 'DetalleCompra', 'detalle_compra_id'),
			'motivoMovimiento' => array(self::BELONGS_TO, 'MotivoMovimiento', 'motivo_movimiento_id'),
			'almacen' => array(self::BELONGS_TO, 'Almacen', 'almacen_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fecha_movimiento' => 'Fecha Movimiento',
			'producto_id' => 'Producto',
			'cantidad' => 'Cantidad',
			'motivo_movimiento_id' => 'Motivo Movimiento',
			'detalle_compra_id' => 'Detalle Compra',
			'detalle_venta_id' => 'Detalle Venta',
			'observacion' => 'Observacion',
			'almacen_id' => 'Almacen',
			'saldo_stock' => 'Saldo Stock',
			'operacion' => 'Operacion',
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
		$criteria->compare('fecha_movimiento',$this->fecha_movimiento,true);
		$criteria->compare('producto_id',$this->producto_id);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('motivo_movimiento_id',$this->motivo_movimiento_id);
		$criteria->compare('detalle_compra_id',$this->detalle_compra_id);
		$criteria->compare('detalle_venta_id',$this->detalle_venta_id);
		$criteria->compare('observacion',$this->observacion,true);
		$criteria->compare('almacen_id',$this->almacen_id);
		$criteria->compare('saldo_stock',$this->saldo_stock);
		$criteria->compare('operacion',$this->operacion);
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
	 * @return MovimientoAlmacen the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
