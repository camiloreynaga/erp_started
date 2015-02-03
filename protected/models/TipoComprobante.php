<?php

/**
 * This is the model class for table "tbl_tipo_comprobante".
 *
 * The followings are the available columns in table 'tbl_tipo_comprobante':
 * @property integer $id
 * @property string $comprobante
 * @property string $codigo_comprobante
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 *
 * The followings are the available model relations:
 * @property ComprobanteCompra[] $comprobanteCompras
 * @property ComprobanteVenta[] $comprobanteVentas
 */
class TipoComprobante extends Erp_startedActiveRecord//CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_tipo_comprobante';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('comprobante, codigo_comprobante', 'required'),
			array('create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
			array('comprobante', 'length', 'max'=>20),
			array('codigo_comprobante', 'length', 'max'=>5),
			array('create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, comprobante, codigo_comprobante, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'r_comprobante_compra' => array(self::HAS_MANY, 'ComprobanteCompra', 'tipo_comprobante_id'),
			'r_comprobanteVentas' => array(self::HAS_MANY, 'ComprobanteVenta', 'tipo_comprobante_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'comprobante' => 'Comprobante',
			'codigo_comprobante' => 'Código',
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
		$criteria->compare('comprobante',$this->comprobante,true);
		$criteria->compare('codigo_comprobante',$this->codigo_comprobante,true);
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
	 * @return TipoComprobante the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        /**
         * recupera todos los tipos de comprobante
         */
        public function getTiposComprobante(){
            
            
            $criteria=new CDbCriteria();
            $criteria->select="id,comprobante";
            //$criteria->order='caracteristica';
            //$criteria->condition='activo=0';
            return $this->findAll($criteria);
            
//            //$criteria = new CDbCriteria();
//            //$criteria->='activo=0';
//            return $this->findAll();
        }
}
