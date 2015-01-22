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
 * @property string $descuento
 * @property string $observacion
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
         
         public $_medio_pago=array(
            '1'=>'EFECTIVO',
            '2'=>'OTRO'
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
                        array('monto','comprobarMontoPago'),
                        array('fecha_pago, monto, estado', 'required','on'=>'pagar'), // para cuando se realiza el pago
			array('venta_id', 'required'),
                        //array('monto, estado, fecha_pago', 'required'),
                        array('monto, estado, fecha_vencimiento', 'required','on'=>'create'), //para cuando se registro en el cronograma
			array('venta_id, estado, medio_pago, create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
			array('monto, descuento', 'length', 'max'=>10),
			array('fecha_pago, fecha_vencimiento, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, venta_id, monto, estado, fecha_pago, fecha_vencimiento, medio_pago, descuento,observacion, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
		);
	}
        
        /**
         * validación para el monto ingresado sea igual o menor al que el cliente debe  
         * @param type $attribute
         * @param type $params
         */
        public function comprobarMontoPago($attribute,$params){
            if(!is_null($this->attributes['venta_id']))
            {
                    //$_cliente=Cliente::model()->findByPk($this->attributes['cliente_id']);
                    $_venta=  Venta::model()->findByPk($this->attributes['venta_id']);
                    //obtiene la deuda actucal = importe total - pagos realizados (cuenta_cobrar:estado=1)
                    $_deuda= $_venta->importe_total - $this->monto_pagado_venta_credito($_venta->id,1);
                    if($this->monto==0) // si linea de credito > 0
                    {
                        $this->addError($attribute, yii::t('app',"This is a invalid mount.")); //
                    }
                    else
                    {
                        if($this->monto> $_deuda)
                        {
                            $this->addError ($attribute, yii::t('app',"This is a invalid mount, exceed the current debt.").' '. $_deuda);
                        }
                        //else
                          //  $this->addError ($attribute, "Credit line, is not enough "); //
                        
                    }
            }
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
			'descuento' => 'Descuento',
                        'observacion'=>'Observacion',
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
		$criteria->compare('descuento',$this->descuento,true);
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
	 * @return CuentaCobrar the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        /**
         * devuelve la suma de montos que un cliente ha pagado por una venta al credito
         * @param type $_venta 
         * @param type $_estado 
         * @return type decimal: sum montos pagados
         */
        public function monto_pagado_venta_credito($_venta,$_estado)
        {
            if(empty($_venta)!=true && empty($_estado)!=true)
            {
                $criteria = new CDbCriteria();
            $criteria->condition = 'venta_id='.$_venta.' and estado='."'".$_estado."'";
            $monto_pagado=0;
            //$tmp= $this->findAll('producto_id=:id_producto and lote=:lote',array(':id_producto'=>$_producto,':lote'=>$_lote));
            $tmp= $this->findAll($criteria);
            foreach($tmp as $r)
            {
                $monto_pagado+=$r->monto;
            }
            return $monto_pagado;
            }
            
        }
}
