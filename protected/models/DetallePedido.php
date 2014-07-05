<?php

/**
 * This is the model class for table "tbl_detalle_pedido".
 *
 * The followings are the available columns in table 'tbl_detalle_pedido':
 * @property integer $id
 * @property integer $pedido_id
 * @property integer $producto_id
 * @property integer $cantidad
 * @property string $observacion
 * @property string $precio_unitario
 * @property string $subtotal
 * @property string $impuesto
 * @property string $total
 *
 * The followings are the available model relations:
 * @property Pedido $pedido
 */
class DetallePedido extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_detalle_pedido';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pedido_id, producto_id, cantidad', 'numerical', 'integerOnly'=>true),
			array('precio_unitario, subtotal, impuesto, total', 'length', 'max'=>10),
			array('observacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, pedido_id, producto_id, cantidad, observacion, precio_unitario, subtotal, impuesto, total', 'safe', 'on'=>'search'),
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
			'r_pedido' => array(self::BELONGS_TO, 'Pedido', 'pedido_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'pedido_id' => 'Pedido',
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
		$criteria->compare('pedido_id',$this->pedido_id);
		$criteria->compare('producto_id',$this->producto_id);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('observacion',$this->observacion,true);
		$criteria->compare('precio_unitario',$this->precio_unitario,true);
		$criteria->compare('subtotal',$this->subtotal,true);
		$criteria->compare('impuesto',$this->impuesto,true);
		$criteria->compare('total',$this->total,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DetallePedido the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
