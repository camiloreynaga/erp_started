<?php

/**
 * This is the model class for table "tbl_detalle_compra".
 *
 * The followings are the available columns in table 'tbl_detalle_compra':
 * @property integer $id
 * @property integer $compra_id
 * @property integer $producto_id
 * @property integer $cantidad
 * @property string $lote
 * @property string $fecha_vencimiento
 * @property integer $cantidad_bueno
 * @property integer $cantidad_malo
 * @property integer $estado
 * @property string $observacion
 * @property string $precio_unitario
 * @property string $porcentaje_descuento
 * @property string $subtotal
 * @property string $impuesto
 * @property string $total
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 * @property integer $comprobante_id
 * The followings are the available model relations:
 * @property Producto $producto
 * @property Compra $compra
 * @property MovimientoAlmacen[] $movimientoAlmacens
 */
class DetalleCompra extends Erp_startedActiveRecord//CActiveRecord
{
        
        
        public $_save=false;
        
        public $_incluye_igv=true;
        
        /*estado de item detalle compra
         * 
         */
         public $_estado=array(
            '0'=>'PENDIENTE', // PENDIENTE DE REVISADO 
            '1'=>'OK', // , // COMPROBANTE REGISTRADO
            '2'=>'OBSERVADO', // ALGUN DATO REQUERIDO PENDIENTE
            '3'=>'ANULADO',
            '4'=>'ALMACENADO'
         );
    
        //public $updateFlag;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_detalle_compra';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('cantidad_bueno,cantidad_malo','comprobarCantidad'),
                       // array('fecha_vencimiento','date'),
                        array('cantidad_bueno,cantidad_malo','compare','compareAttribute'=>'cantidad','operator'=>'<='),
			array('compra_id, producto_id, cantidad, cantidad_bueno, cantidad_malo, estado, create_user_id, update_user_id, comprobante_id', 'numerical', 'integerOnly'=>true),
			array('porcentaje_descuento,precio_unitario','numerical'),
                        array('compra_id,cantidad','required'),
                        array('lote', 'length', 'max'=>50),
			array('precio_unitario, subtotal, impuesto, total', 'length', 'max'=>10),
			array('fecha_vencimiento, observacion, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, compra_id, producto_id, cantidad, lote, fecha_vencimiento, cantidad_bueno, cantidad_malo, estado, observacion, precio_unitario,porcentaje_descuento, subtotal, impuesto, total, create_time, create_user_id, update_time, update_user_id, comprobante_id', 'safe', 'on'=>'search'),
		);
	}
        
        /**
         * validación para cantidad_bueno y cantidad_malo 
         * @param type $attribute
         * @param type $params
         */
        public function comprobarCantidad($attribute,$params){
            if(!is_null($this->attributes['cantidad_bueno'])&&!is_null($this->attributes['cantidad_malo']))
            {
                if($this->attributes['cantidad']< ($this->attributes['cantidad_bueno']+$this->attributes['cantidad_malo']))
                    $this->addError ($attribute, "Suma de cantidad bueno y malo excede a cantidad ");
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
			'r_producto' => array(self::BELONGS_TO, 'Producto', 'producto_id'),
			'r_compra' => array(self::BELONGS_TO, 'Compra', 'compra_id'),
			'r_movimientoAlmacens' => array(self::HAS_MANY, 'MovimientoAlmacen', 'detalle_compra_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'compra_id' => 'Compra',
			'producto_id' => 'Producto',
			'cantidad' => 'Cantidad',
			'lote' => 'Lote',
			'fecha_vencimiento' => 'Fecha Vencimiento',
			'cantidad_bueno' => 'Cantidad Bueno',
			'cantidad_malo' => 'Cantidad Malo',
			'estado' => 'Estado',
			'observacion' => 'Observacion',
			'precio_unitario' => 'Precio Unitario',
                        'porcentaje_descuento'=>'% descuento',
			'subtotal' => 'Subtotal',
			'impuesto' => 'Impuesto',
			'total' => 'Total',
			'create_time' => 'Create Time',
			'create_user_id' => 'Create User',
			'update_time' => 'Update Time',
			'update_user_id' => 'Update User',
                        'comprobante_id' => 'Comprobante',
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
		$criteria->compare('compra_id',$this->compra_id);
		$criteria->compare('producto_id',$this->producto_id);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('lote',$this->lote,true);
		$criteria->compare('fecha_vencimiento',$this->fecha_vencimiento,true);
		$criteria->compare('cantidad_bueno',$this->cantidad_bueno);
		$criteria->compare('cantidad_malo',$this->cantidad_malo);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('observacion',$this->observacion,true);
		$criteria->compare('precio_unitario',$this->precio_unitario,true);
                $criteria->compare('porcentaje_descuento',$this->porcentaje_descuento,true);
		$criteria->compare('subtotal',$this->subtotal,true);
		$criteria->compare('impuesto',$this->impuesto,true);
		$criteria->compare('total',$this->total,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id);
                $criteria->compare('comprobante_id',$this->comprobante_id);
                //$criteria->order= 'id DESC';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DetalleCompra the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
//        public function beforeSave()
//        {
//             if(!$this->isNewRecord)
//                $this->updateFlag=true;
////            if($this->fecha_vencimiento==null) //validando la fecha de cancelación
////                $this->fecha_vencimiento=null;
////            else {
////                //if($this->fecha_vencimiento )
////                //$this->fecha_vencimiento= DateTime::createFromFormat('d/m/Y', $this->fecha_vencimiento)->format('Y-m-d');
////            }
//            
//            return parent::beforeSave();
//        }
        
        /**
         Obtiene la suma de totales de los items del detalle de compra.
         */
        public function SumaTotal(){
            
            $criteria = new CDbCriteria();
		$criteria->select='sum(total) as total'; //lote
                //$criteria->addCondition('cantidad_disponible > 0');
                $criteria->condition='compra_id='.$this->compra_id;
               //$lista= $this->find($criteria);
                return $this->find($criteria)['total'];
//                $resultados = array();
//                foreach ($lista as $list){
//                    $resultados[] = array(
//                             'lote'=>$list->lote, 
//                             'text'=> 'LOTE:' .strtoupper($list->lote).' FV: '.$list->fecha_vencimiento. ' #'.$list->cantidad_disponible.'(UNDS)',
//                    ); 
//                    
//                }
              //return $resultados;  
        }

        

        /**
         * verifica que los datos de registro de un item esten OK
         * Lote != null, cantidad_bueno = cantidad, cantidad malo =0 fecha_vencimiento !=null
         */
        public function VerificarDetalleOK($id)
        {
            $retorna = true;
            $model = $this->findByPk($id);
            // verifica que Lote este ingresado
            if (empty($model->lote) || is_null($model->lote) )  
                $retorna= false;
            //verifica si cantidad_bueno = cantidad
            if(is_null($model->cantidad_bueno) || $model->cantidad_bueno<$model->cantidad) 
                 $retorna= false;
            //verifica si existen algun item "malo"
            if($model->cantidad_malo>0) //!is_null($model->cantidad_malo)
                 $retorna= false;
            if(is_null($model->fecha_vencimiento))
                 $retorna= false;
            
            return $retorna;
        }
        
        /**
         * verifica que no exista items observados
         */
        public function AllOK()
        {
            // verficiar que todos los item esten en estado OK de observado
            $retorna = true;
            $_count = DetalleCompra::model()->count('compra_id=:compra_id and estado!=:estado', array(':estado'=>1,':compra_id'=>$this->compra_id));
            if($_count==0)
                $retorna=true;
            else {
                $retorna=false;
            }
            return $retorna;
                
        }
        
        /**
         * verifica que todos los items esten almacenados
         */
        public function AllIntoStore()
        {
            // verficiar que todos los item esten almacenados
            $retorna = true;
            $_count = DetalleCompra::model()->count('compra_id=:compra_id and estado!=:estado', array(':estado'=>4,':compra_id'=>$this->compra_id));
            if($_count==0)
                $retorna=true;
            else {
                $retorna=false;
            }
            return $retorna;
                
        }
        
        /**
         * Actualiza el estado de un item del detalle de compra
         */
        public function actualizarEstado()
        {
            if($this->VerificarDetalleOK($this->id))
                {
                    $this->estado=1; //ok
                }
                else
                {
                    $this->estado=2; //observado
                }
                $this->save();
        }
        /**
         * cambia de estado del item detalle compra y compra luego de guardar/actualizar
         */
        public function afterSave(){
            // if(!$this->isNewRecord)// verfica que no sea registro nuevo
            //{
                 //obtiendo compra
                 $_compra= Compra::model()->findByPk($this->compra_id);
                //Verificando que si existen items Observados 
                if($this->AllOK()) 
                    $_compra->estado=1; //Revisado OK
                else
                    $_compra->estado=2; //observado
                //actualizando el total, base imponible e impuesto de la compra
                $_total=$this->SumaTotal();
                //$_bi=$_total/((int)Yii::app()->params['impuesto']*0.01 + 1);
                $_bi=  Producto::model()->getSubtotal($_total);
                $_compra->importe_total=$_total;//$this->SumaTotal()['total'];
                $_compra->base_imponible=$_bi; 
                $_compra->impuesto=$_total-$_bi;
                //Verificando que todos los item se hayan almacenado
                if($this->AllIntoStore())
                    $_compra->estado=4; // Cambiar estado a Almacenado
                $_compra->save(); //actualizando el estado de compra
            //}
            parent::afterSave();
        }
}
