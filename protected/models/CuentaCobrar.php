<?php

/**
 * This is the model class for table "tbl_cuenta_cobrar".
 *
 * The followings are the available columns in table 'tbl_cuenta_cobrar':
 * @property integer $id
 * @property integer $venta_id
 * @property string $monto
 * @property integer $estado
 * @property string $fecha_pago
 * @property string $fecha_vencimiento
 * @property integer $medio_pago
 * @property string $interes
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 *
 * The followings are the available model relations:
 * @property Venta $venta
 */
class CuentaCobrar extends Erp_startedActiveRecord//CActiveRecord
{
    
        /*estado de compra
         * 
         */
         public $_estado=array(
            '0'=>'PENDIENTE', // PENDIENTE DE PAGO 
            '1'=>'PAGADO', // PAGADO
         );
    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_cuenta_cobrar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('fecha_pago, medio_pago', 'required','on'=>'pagar'), // para cuando se realiza el pago
			array('venta_id', 'required'),
                        //array('monto, estado, fecha_vencimiento', 'required'),
                        array('monto, estado, fecha_vencimiento', 'required','on'=>'create'),
			array('venta_id, estado, medio_pago, create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
			array('monto, interes', 'length', 'max'=>10),
			array('fecha_pago, fecha_vencimiento, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, venta_id, monto, estado, fecha_pago, fecha_vencimiento, medio_pago, interes, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'r_venta' => array(self::BELONGS_TO, 'Venta', 'venta_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'venta_id' => 'Venta',
			'monto' => 'Monto',
			'estado' => 'Estado',
			'fecha_pago' => 'Fecha Pago',
			'fecha_vencimiento' => 'Fecha Vencimiento',
			'medio_pago' => 'Medio Pago',
			'interes' => 'Interes',
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

		$criteria->compare('t.id',$this->id);
		$criteria->compare('venta_id',$this->venta_id);
		$criteria->compare('monto',$this->monto,true);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('fecha_pago',$this->fecha_pago,true);
		$criteria->compare('fecha_vencimiento',$this->fecha_vencimiento,true);
		$criteria->compare('medio_pago',$this->medio_pago);
		$criteria->compare('interes',$this->interes,true);
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
	 * @return CuentaCobrar the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
