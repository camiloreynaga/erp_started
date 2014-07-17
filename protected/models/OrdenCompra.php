<?php

/**
 * This is the model class for table "tbl_orden_compra".
 *
 * The followings are the available columns in table 'tbl_orden_compra':
 * @property integer $id
 * @property string $fecha_orden
 * @property integer $proveedor_id
 * @property integer $cotizacion_id
 * @property string $observaciones
 * @property integer $estado 0=pendiente (solicitante) ,1=confirmado(solicitante)
 * ,2=anulado (solicitante),3=aprobado(supervisor), 4=recepcionado(almacenero), 5=almacen(almacenero)
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 *
 * The followings are the available model relations:
 * @property DetalleOrdenCompra[] $DetalleOrdenCompras
 */
class OrdenCompra extends Erp_startedActiveRecord//CActiveRecord
{
        public $_estado = array(
            '0'=>'PENDIENTE',
            '1'=>'CONFIRMADO',
            '2'=>'PROCESADO',
            '3'=>'ANULADO',
            '4'=>'RECEPCIONADO'
        );
    
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
			array('proveedor_id,cotizacion_id, estado, create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
                        array('proveedor_id','required'),
                    
			array('fecha_orden, observaciones, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fecha_orden, proveedor_id, cotizacion_id, observaciones, estado, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'r_detalleOrdenCompras' => array(self::HAS_MANY, 'DetalleOrdenCompra', 'orden_compra_id'),
                        'r_proveedor'=>array(self::BELONGS_TO,'Proveedor','proveedor_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fecha_orden' => 'Fecha Orden',
			'proveedor_id' => 'Proveedor',
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
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('fecha_orden',$this->fecha_orden,true);
		$criteria->compare('proveedor_id',$this->proveedor_id);
                $criteria->compare('cotizacion_id',$this->cotizacion_id);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id);
                $criteria->order= 'id DESC';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        /**
         * retorna las ordenes de compra pendientes
         * @return type array de resultado ordenes de compra
         */
        public function getOrdenCompra()
        {
            $criteria= new CDbCriteria();
            $criteria->condition='estado=0'; //pendiente
            $criteria->with=array('r_proveedor');
            //$_lab= Fabricante::model()->tablename();
            //$criteria->join='inner join '.$_lab.' lab on lab.id = t.fabricante_id ';
            
            $lista= $this->model()->findAll($criteria); 
              $resultados = array();
              foreach ($lista as $list){
                $resultados[] = array(
                         'id'=>$list->id,
                         'text'=> $list->id.'-'.$list->r_proveedor->nombre_rz. ' (Fecha:'.$list->fecha_orden.')',
              ); 
            
              }
              return $resultados;   
        }
}