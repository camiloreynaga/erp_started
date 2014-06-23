<?php

/**
 * This is the model class for table "tbl_orden_compra".
 *
 * The followings are the available columns in table 'tbl_orden_compra':
 * @property integer $id
 * @property string $codigo_unico
 * @property string $fecha_orden
 * @property integer $proveedor_id
 * @property string $observaciones
 * @property integer $estado
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 *
 * The followings are the available model relations:
 * @property TblDetalleOrdenCompra[] $tblDetalleOrdenCompras
 */
class OrdenCompra extends Erp_startedActiveRecord//CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OrdenCompra the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_orden_compra';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('proveedor_id, estado, create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
                        array('proveedor_id','required'),
                    
			array('codigo_unico', 'length', 'max'=>50),
			array('fecha_orden, observaciones, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, codigo_unico, fecha_orden, proveedor_id, observaciones, estado, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'r_DetalleOrdenCompras' => array(self::HAS_MANY, 'DetalleOrdenCompra', 'orden_compra_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'codigo_unico' => 'Codigo Unico',
			'fecha_orden' => 'Fecha Orden',
			'proveedor_id' => 'Proveedor',
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
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('codigo_unico',$this->codigo_unico,true);
		$criteria->compare('fecha_orden',$this->fecha_orden,true);
		$criteria->compare('proveedor_id',$this->proveedor_id);
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
}