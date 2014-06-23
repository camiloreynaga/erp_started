<?php

/**
 * This is the model class for table "tbl_empleado".
 *
 * The followings are the available columns in table 'tbl_empleado':
 * @property integer $id
 * @property string $nombre
 * @property string $ap_paterno
 * @property string $ap_materno
 * @property string $doc_identidad
 * @property string $direccion
 * @property string $telefono
 * @property string $movil
 * @property string $fecha_nacimiento
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 *
 * The followings are the available model relations:
 * @property TblUsuario[] $tblUsuarios
 */
class Empleado extends Erp_startedActiveRecord//CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Empleado the static model class
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
		return 'tbl_empleado';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, ap_paterno, doc_identidad', 'required'),
			array('create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
			array('nombre, ap_paterno, ap_materno, telefono, movil', 'length', 'max'=>50),
			array('doc_identidad', 'length', 'max'=>10),
			array('direccion', 'length', 'max'=>100),
			array('fecha_nacimiento, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, ap_paterno, ap_materno, doc_identidad, direccion, telefono, movil, fecha_nacimiento, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'r_Usuarios' => array(self::HAS_MANY, 'Usuario', 'empleado_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'ap_paterno' => 'Ap Paterno',
			'ap_materno' => 'Ap Materno',
			'doc_identidad' => 'Doc Identidad',
			'direccion' => 'Direccion',
			'telefono' => 'Telefono',
			'movil' => 'Movil',
			'fecha_nacimiento' => 'Fecha Nacimiento',
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('ap_paterno',$this->ap_paterno,true);
		$criteria->compare('ap_materno',$this->ap_materno,true);
		$criteria->compare('doc_identidad',$this->doc_identidad,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('movil',$this->movil,true);
		$criteria->compare('fecha_nacimiento',$this->fecha_nacimiento,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}