<?php

/**
 * This is the model class for table "tbl_pedido".
 *
 * The followings are the available columns in table 'tbl_pedido':
 * @property integer $id
 * @property string $fecha_pedido
 * @property integer $cliente_id
 * @property integer $vendedor_id
 * @property integer $cotizacion_id
 * @property string $observaciones
 * @property integer $estado
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 *
 * The followings are the available model relations:
 * @property DetallePedido[] $detallePedidos
 */
class Pedido extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_pedido';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vendedor_id', 'required'),
			array('cliente_id, vendedor_id, cotizacion_id, estado, create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
			array('fecha_pedido, observaciones, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, fecha_pedido, cliente_id, vendedor_id, cotizacion_id, observaciones, estado, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'detallePedidos' => array(self::HAS_MANY, 'DetallePedido', 'pedido_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fecha_pedido' => 'Fecha Pedido',
			'cliente_id' => 'Cliente',
			'vendedor_id' => 'Vendedor',
			'cotizacion_id' => 'Cotizacion',
			'observaciones' => 'Observaciones',
			'estado' => 'Estado',
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
		$criteria->compare('fecha_pedido',$this->fecha_pedido,true);
		$criteria->compare('cliente_id',$this->cliente_id);
		$criteria->compare('vendedor_id',$this->vendedor_id);
		$criteria->compare('cotizacion_id',$this->cotizacion_id);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('estado',$this->estado);
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
	 * @return Pedido the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
