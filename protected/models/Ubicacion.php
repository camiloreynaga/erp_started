<?php

/**
 * This is the model class for table "tbl_ubicacion".
 *
 * The followings are the available columns in table 'tbl_ubicacion':
 * @property integer $id
 * @property string $ubicacion
 * @property integer $activo
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 *
 * The followings are the available model relations:
 * @property Almacen[] $almacens
 */
class Ubicacion extends Erp_startedActiveRecord//CActiveRecord
{
        public $_estado=array(
            '0'=>'SI',
            '1'=>'NO'
        );
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_ubicacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ubicacion', 'required'),
			array('activo, create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
			array('ubicacion', 'length', 'max'=>50),
			array('create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, ubicacion, activo, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'r_almacen' => array(self::HAS_MANY, 'Almacen', 'ubicacion_id'),
//                        'r_'
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'ubicacion' => 'Ubicacion',
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

		$criteria->compare('t.id',$this->id);
		$criteria->compare('ubicacion',$this->ubicacion,true);
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
	 * @return Ubicacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        /**
         * return lista de ubicaciones activos
         * @return string
         */
        public function get_ubicaciones()
        {
            $criteria= new CDbCriteria();
            $criteria->condition='activo=0'; //Cargo de preventista
            //$criteria->condition='t.id not in (SELECT empleado_id FROM tbl_user WHERE 1 )';
            
            $lista= $this->model()->findAll($criteria); 
              $resultados = array();
              foreach ($lista as $list){
                $resultados[] = array(
                         'id'=>$list->id,
                         'text'=> $list->ubicacion
                        //.' ('.$this->_tipo[$list->tipo].')' 
              ); 
            
              }
              return $resultados;
        }
        
        /**
         * devuelve el nombre de la ubicación a partir del id
         * @param type $id
         * @return type
         */
        public function getUbicacion($id)
        {
           return isset($id) ?$this->findByPk($id)->ubicacion : 'Unknow';
        }
}
