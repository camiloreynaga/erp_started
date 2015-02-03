<?php

/**
 * This is the model class for table "tbl_punto_venta".
 *
 * The followings are the available columns in table 'tbl_punto_venta':
 * @property integer $id
 * @property string $punto_venta
 * @property integer $tipo
 * @property string $observacion
 * @property string $direccion
 * @property integer $activo
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 */
class PuntoVenta extends CActiveRecord
{
    
        /*estado de compra
         * 
         */
         public $_tipo=array(
            '0'=>'MOVIL', // Puntos de venta movil  
            '1'=>'FIJO', // Punto de venta fijo
         );
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_punto_venta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('punto_venta', 'required'),
			array('tipo, activo, create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
			array('punto_venta, direccion', 'length', 'max'=>50),
			array('observacion, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, punto_venta, tipo, observacion, direccion, activo, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => yii::t('app','ID'),
			'punto_venta' => yii::t('app','Punto Venta'),
			'tipo' => yii::t('app','Tipo'),
			'observacion' => yii::t('app','Observacion'),
			'direccion' => yii::t('app','Direccion'),
			'activo' => yii::t('app','Activo'),
			'create_time' => yii::t('app','Create Time'),
			'create_user_id' => yii::t('app','Create User'),
			'update_time' => yii::t('app','Update Time'),
			'update_user_id' => yii::t('app','Update User'),
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
		$criteria->compare('punto_venta',$this->punto_venta,true);
		$criteria->compare('tipo',$this->tipo);
		$criteria->compare('observacion',$this->observacion,true);
		$criteria->compare('direccion',$this->direccion,true);
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
	 * @return PuntoVenta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        
         /**
         * return lista de puntos de ventas sin almacen
         * @return string
         */
        public function getPunto_venta_almacen()
        {
            $criteria= new CDbCriteria();
            $criteria->condition='activo=0 and t.id not in (SELECT punto_venta_id FROM tbl_almacen WHERE 1 )';
            
            $lista= $this->model()->findAll($criteria); 
              $resultados = array();
              foreach ($lista as $list){
                $resultados[] = array(
                         'id'=>$list->id,
                         'text'=> $list->punto_venta .' ('.$this->_tipo[$list->tipo].')' 
              ); 
            
              }
              return $resultados;
        }
        
        /**
         * return lista de puntos de ventas activos
         * @return string
         */
        public function getPunto_venta()
        {
            $criteria= new CDbCriteria();
            $criteria->condition='activo=0'; //Cargo de preventista
            //$criteria->condition='t.id not in (SELECT empleado_id FROM tbl_user WHERE 1 )';
            
            $lista= $this->model()->findAll($criteria); 
              $resultados = array();
              foreach ($lista as $list){
                $resultados[] = array(
                         'id'=>$list->id,
                         'text'=> $list->punto_venta .' ('.$this->_tipo[$list->tipo].')' 
              ); 
            
              }
              return $resultados;
        }
}
