<?php

/**
 * This is the model class for table "tbl_venta".
 *
 * The followings are the available columns in table 'tbl_venta':
 * @property integer $id
 * @property string $fecha_venta
 * @property integer $cliente_id
 * @property integer $vendedor_id
 * @property integer $forma_pago
 * @property integer $pedido_id
 * @property string $base_imponible
 * @property string $impuesto
 * @property string $importe_total
 * @property string $observacion
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 *
 * The followings are the available model relations:
 * @property ComprobanteVenta[] $comprobanteVentas
 * @property CuentaCobrar[] $cuentaCobrars
 * @property DetalleVenta[] $detalleVentas
 * @property Cliente $cliente
 */
class Venta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_venta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cliente_id, vendedor_id, forma_pago', 'required'),
			array('cliente_id, vendedor_id, forma_pago, pedido_id, create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
			array('base_imponible, impuesto, importe_total', 'length', 'max'=>10),
			array('fecha_venta, observacion, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, fecha_venta, cliente_id, vendedor_id, forma_pago, pedido_id, base_imponible, impuesto, importe_total, observacion, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'comprobanteVentas' => array(self::HAS_MANY, 'ComprobanteVenta', 'venta_id'),
			'cuentaCobrars' => array(self::HAS_MANY, 'CuentaCobrar', 'venta_id'),
			'detalleVentas' => array(self::HAS_MANY, 'DetalleVenta', 'venta_id'),
			'cliente' => array(self::BELONGS_TO, 'Cliente', 'cliente_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fecha_venta' => 'Fecha Venta',
			'cliente_id' => 'Cliente',
			'vendedor_id' => 'Vendedor',
			'forma_pago' => 'Forma Pago',
			'pedido_id' => 'Pedido',
			'base_imponible' => 'Base Imponible',
			'impuesto' => 'Impuesto',
			'importe_total' => 'Importe Total',
			'observacion' => 'Observacion',
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
		$criteria->compare('fecha_venta',$this->fecha_venta,true);
		$criteria->compare('cliente_id',$this->cliente_id);
		$criteria->compare('vendedor_id',$this->vendedor_id);
		$criteria->compare('forma_pago',$this->forma_pago);
		$criteria->compare('pedido_id',$this->pedido_id);
		$criteria->compare('base_imponible',$this->base_imponible,true);
		$criteria->compare('impuesto',$this->impuesto,true);
		$criteria->compare('importe_total',$this->importe_total,true);
		$criteria->compare('observacion',$this->observacion,true);
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
	 * @return Venta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
