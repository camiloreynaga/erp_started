<?php

/**
 * This is the model class for table "tbl_compra".
 *
 * The followings are the available columns in table 'tbl_compra':
 * @property integer $id
 * @property string $fecha_compra
 * @property integer $proveedor_id
 * @property string $base_imponible
 * @property integer $orden_compra_id
 * @property string $impuesto
 * @property string $importe_total
 * @property string $observacion
 * @property integer $estado
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 *
 * The followings are the available model relations:
 * @property Proveedor $proveedor
 * @property ComprobanteCompra[] $comprobanteCompras
 * @property CuentaPagar[] $cuentaPagars
 * @property DetalleCompra[] $detalleCompras
 */
class Compra extends Erp_startedActiveRecord//CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_compra';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('proveedor_id, fecha_compra, orden_compra_id' , 'required'),
			array('proveedor_id, orden_compra_id, estado, create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
			array('base_imponible, impuesto, importe_total', 'length', 'max'=>10),
			array('fecha_compra, observacion, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, fecha_compra, proveedor_id, base_imponible, orden_compra_id, impuesto, importe_total, observacion, estado, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'r_proveedor' => array(self::BELONGS_TO, 'Proveedor', 'proveedor_id'),
			'r_comprobanteCompras' => array(self::HAS_MANY, 'ComprobanteCompra', 'compra_id'),
			'r_cuentaPagars' => array(self::HAS_MANY, 'CuentaPagar', 'compra_id'),
			'r_detalleCompras' => array(self::HAS_MANY, 'DetalleCompra', 'compra_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fecha_compra' => 'Fecha Recepción',
			'proveedor_id' => 'Proveedor',
			'base_imponible' => 'Base Imponible',
			'orden_compra_id' => 'Orden Compra',
			'impuesto' => 'Impuesto',
			'importe_total' => 'Importe Total',
			'observacion' => 'Observacion',
			'estado' => 'Estado',
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
		$criteria->compare('fecha_compra',$this->fecha_compra,true);
		$criteria->compare('proveedor_id',$this->proveedor_id);
		$criteria->compare('base_imponible',$this->base_imponible,true);
		$criteria->compare('orden_compra_id',$this->orden_compra_id);
		$criteria->compare('impuesto',$this->impuesto,true);
		$criteria->compare('importe_total',$this->importe_total,true);
		$criteria->compare('observacion',$this->observacion,true);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id);
                $criteria->order='id DESC';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Compra the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function beforeSave()
        {
            $this->fecha_compra = DateTime::createFromFormat('d/m/Y', $this->fecha_compra)->format('Y-m-d');
            return parent::beforeSave();
        }
        
        /**
         * retorna las ordenes de compra pendientes
         * @return type array de resultado ordenes de compra
         */
        public function getCompra()
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
                         'text'=> $list->id.'-'.$list->r_proveedor->nombre_rz. ' (Fecha:'.$list->fecha_compra.')',
              ); 
            
              }
              return $resultados;   
        }
}
