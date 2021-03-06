<?php

/**
 * This is the model class for table "tbl_empleado".
 *
 * The followings are the available columns in table 'tbl_empleado':
 * @property integer $id
 * @property integer $punto_venta_id
 * @property string $nombre
 * @property string $ap_paterno
 * @property string $ap_materno
 * @property string $fecha_nacimiento
 * @property string $doc_identidad
 * @property string $direccion
 * @property string $telefono
 * @property string $movil
 * @property integer $cargo_id
 * @property string $fecha_ingreso
 * @property string $fecha_salida
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 *
 * The followings are the available model relations:
 * @property Cargo $cargo
 * @property Usuario[] $usuarios
 * @property PuntoVenta
 */
class Empleado extends Erp_startedActiveRecord//CActiveRecord
{
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
			array('nombre, ap_paterno, doc_identidad, cargo_id', 'required'),
			array('punto_venta_id,cargo_id, create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
			array('nombre, ap_paterno, ap_materno, telefono, movil', 'length', 'max'=>50),
			array('doc_identidad', 'length', 'max'=>10),
			array('direccion', 'length', 'max'=>100),
			array('fecha_ingreso,fecha_salida,fecha_nacimiento, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, ap_paterno, ap_materno, fecha_nacimiento, doc_identidad, direccion, telefono, movil, cargo_id,fecha_ingreso,fecha_salida, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'r_cargo' => array(self::BELONGS_TO, 'Cargo', 'cargo_id'),
			'r_usuario' => array(self::HAS_MANY, 'User', 'empleado_id'),
                        'r_punto_venta'=>array(self::BELONGS_TO,'PuntoVenta','punto_venta_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
                        'punto_venta_id'=>'Punto Venta',
			'nombre' => 'Nombre',
			'ap_paterno' => 'Ap Paterno',
			'ap_materno' => 'Ap Materno',
			'fecha_nacimiento' => 'Fecha Nacimiento',
			'doc_identidad' => 'Doc Identidad',
			'direccion' => 'Direccion',
			'telefono' => 'Telefono',
			'movil' => 'Movil',
			'cargo_id' => 'Cargo',
                        'fecha_ingreso'=>'Fecha ingreso',
                        'fecha_salida'=>'Fecha salida',
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
                $criteria->compare('punto_venta_id', $this->punto_venta_id,TRUE);   
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('ap_paterno',$this->ap_paterno,true);
		$criteria->compare('ap_materno',$this->ap_materno,true);
		$criteria->compare('fecha_nacimiento',$this->fecha_nacimiento,true);
		$criteria->compare('doc_identidad',$this->doc_identidad,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('movil',$this->movil,true);
		$criteria->compare('cargo_id',$this->cargo_id);
                $criteria->compare('fecha_ingreso', $this->fecha_ingreso);
                $criteria->compare('fecha_salida', $this->fecha_salida);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id);
                //$criteria->condition='id>1';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Empleado the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        /**
         * Devuelve una lista de empleados que tenga el cargo de Preventista
         * 
         * @return string
         */
        public function getVendedores()
        {
            $criteria= new CDbCriteria();
            $criteria->condition='cargo_id=4'; //Cargo de preventista
   
            
            $lista= $this->model()->findAll($criteria); 
              $resultados = array();
              foreach ($lista as $list){
                $resultados[] = array(
                         'id'=>$list->id,
                         'text'=> $list->nombre.' '.$list->ap_paterno
              ); 
            
              }
              return $resultados;
        }
        
        /**
         * return lista de empleados sin usuario asignado
         * @return string
         */
        public function getEmpleados_sin_usuario()
        {
            $criteria= new CDbCriteria();
            //$criteria->condition='cargo_id=4'; //Cargo de preventista
            $criteria->condition='t.id not in (SELECT empleado_id FROM tbl_user WHERE 1 )';
            
            $lista= $this->model()->findAll($criteria); 
              $resultados = array();
              foreach ($lista as $list){
                $resultados[] = array(
                         'id'=>$list->id,
                         'text'=> $list->nombre.' '.$list->ap_paterno
              ); 
            
              }
              return $resultados;
        }
}
