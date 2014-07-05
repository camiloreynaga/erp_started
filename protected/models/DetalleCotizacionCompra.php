<?php

/**
 * This is the model class for table "tbl_detalle_cotizacion_compra".
 *
 * The followings are the available columns in table 'tbl_detalle_cotizacion_compra':
 * @property integer $id
 * @property integer $cotizacion_id
 * @property integer $producto_id
 * @property integer $cantidad
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
 * @property CotizacionCompra $cotizacion
 */
class DetalleCotizacionCompra extends Erp_startedActiveRecord//CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_detalle_cotizacion_compra';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cotizacion_id, producto_id, cantidad, create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
			array('precio_unitario, subtotal, impuesto, total', 'length', 'max'=>10),
			array('create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, cotizacion_id, producto_id, cantidad, precio_unitario, subtotal, impuesto, total, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'r_cotizacion' => array(self::BELONGS_TO, 'CotizacionCompra', 'cotizacion_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cotizacion_id' => 'Cotizacion',
			'producto_id' => 'Producto',
			'cantidad' => 'Cantidad',
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
		$criteria->compare('cotizacion_id',$this->cotizacion_id);
		$criteria->compare('producto_id',$this->producto_id);
		$criteria->compare('cantidad',$this->cantidad);
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
	 * @return DetalleCotizacionCompra the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
