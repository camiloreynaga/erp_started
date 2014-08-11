<?php

/**
 * This is the model class for table "tbl_proveedor".
 *
 * The followings are the available columns in table 'tbl_proveedor':
 * @property integer $id
 * @property string $nombre_rz
 * @property string $ruc
 * @property string $contacto
 * @property string $direccion
 * @property string $ciudad
 * @property string $telefono
 * @property string $linea_credito
 * @property integer $activo
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 *
 * The followings are the available model relations:
 * @property Compra[] $compras
 */
class Proveedor extends Erp_startedActiveRecord//CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_proveedor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_rz, ruc', 'required'),
			array('activo, create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
			array('nombre_rz, ciudad, telefono', 'length', 'max'=>50),
			array('ruc', 'length', 'max'=>11),
			array('contacto, direccion', 'length', 'max'=>100),
			array('linea_credito', 'length', 'max'=>10),
			array('create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre_rz, ruc, contacto, direccion, ciudad, telefono, linea_credito, activo, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'r_compras' => array(self::HAS_MANY, 'Compra', 'proveedor_id'),
                        'r_orden_compra'=>array(self::HAS_MANY,'OrdenCompra','proveedor_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre_rz' => 'Razon Social',
			'ruc' => 'RUC',
			'contacto' => 'Contacto',
			'direccion' => 'Direccion',
			'ciudad' => 'Ciudad',
			'telefono' => 'Telefono',
			'linea_credito' => 'Linea Credito',
			'activo' => 'Activo',
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
		$criteria->compare('nombre_rz',$this->nombre_rz,true);
		$criteria->compare('ruc',$this->ruc,true);
		$criteria->compare('contacto',$this->contacto,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('ciudad',$this->ciudad,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('linea_credito',$this->linea_credito,true);
		$criteria->compare('activo',$this->activo);
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
	 * @return Proveedor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function getProveedores()
        {
            $criteria= new CDbCriteria();
            $criteria->condition='activo=0';
            
            return $this->findAll($criteria);
        }
}
