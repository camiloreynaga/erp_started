<?php

/**
 * This is the model class for table "tbl_detalle_venta".
 *
 * The followings are the available columns in table 'tbl_detalle_venta':
 * @property integer $id
 * @property integer $venta_id
 * @property integer $producto_id
 * @property integer $cantidad
 * @property string $precio_unitario
 * @property string $subtotal
 * @property string $impuesto
 * @property string $total
 * @property string $lote
 * @property string $fecha_vencimiento
 * @property integer $estado 
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 *
 * The followings are the available model relations:
 * @property Producto $producto
 * @property Venta $venta
 * @property MovimientoAlmacen[] $movimientoAlmacens
 */
class DetalleVenta extends Erp_startedActiveRecord//CActiveRecord
{
    
    
        public $_estado=array(
            '0'=>'PENDIENTE', // PENDIENTE DE ENTREGA 
            '1'=>'DESPACHADO', // , // COMPROBANTE REGISTRADO
           // '2'=>'OBSERVADO', // ALGUN DATO REQUERIDO PENDIENTE
            //'3'=>'ANULADO',
            //'4'=>'ALMACENADO'
         );
    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_detalle_venta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('cantidad','CantidadDisponibleProducto','on'=>'create_venta2'),//validación para punto de venta
                        array('precio_unitario','validarCreditoDisponible','on'=>'create'),
                        array('cantidad,precio_unitario','validarCreditoModificado','on'=>'update'),
                        array('cantidad','comprobarCantidadDisponible','on'=>'create'), // valida la cantidad ingresada
                        array('cantidad','validaCantidadModificada','on'=>'update'), // valida la cantidad a reemplazar 
                        array('venta_id,producto_id,cantidad,precio_unitario,lote','required'),
			array('venta_id, producto_id, cantidad, create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
                        array('precio_unitario','numerical' ),
			array('precio_unitario, subtotal, impuesto, total', 'length', 'max'=>10),
			array('lote', 'length', 'max'=>50),
			array('fecha_vencimiento, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, venta_id, producto_id, cantidad, precio_unitario, subtotal, impuesto, total, lote, fecha_vencimiento,estado, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'r_producto' => array(self::BELONGS_TO, 'Producto', 'producto_id'),
			'r_venta' => array(self::BELONGS_TO, 'Venta', 'venta_id'),
			'r_movimientoAlmacens' => array(self::HAS_MANY, 'MovimientoAlmacen', 'detalle_venta_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'venta_id' => 'Venta',
			'producto_id' => 'Producto',
			'cantidad' => 'Cantidad',
			'precio_unitario' => 'Precio Unitario',
			'subtotal' => 'Subtotal',
			'impuesto' => 'Impuesto',
			'total' => 'Total',
			'lote' => 'Lote',
			'fecha_vencimiento' => 'Fecha Vencimiento',
                        'estado'=>'estado',
			'create_time' => 'Create Time',
			'create_user_id' => 'Create User',
			'update_time' => 'Update Time',
			'update_user_id' => 'Update User',
		);
	}
        
        /**
         * Validate quantity available for all lotes from product 
         * @param type $attribute
         * @param type $params
         */
        public function CantidadDisponibleProducto($attribute,$params){
            //Cantidad disponible >= cantidad
                $_cantidad_disponible= ProductoAlmacen::model()->cantidad_producto
                        ($this->attributes['producto_id']);
                if($_cantidad_disponible < $this->attributes['cantidad'])
                {
                    $this->addError($attribute, 'Cantidad ingresada es mayor a la cantidad disponible para venta. Cantidad disponible: '.$_cantidad_disponible);
                }
        }
        
        
        /**
         * Validación de cantidad disponible por producto y lote
         * validate quantity available for product and lote
         */
        public function comprobarCantidadDisponible($attribute,$params){
            //Cantidad disponible >= cantidad
                $_cantidad_disponible= ProductoAlmacen::model()->cantidad_lote2
                        ($this->attributes['producto_id'],$this->attributes['lote']);
                if($_cantidad_disponible < $this->attributes['cantidad'])
                {
                    $this->addError($attribute, 'Cantidad ingresada es mayor a la cantidad disponible para venta. Cantidad disponible: '.$_cantidad_disponible);
                }
        }
        
        /**
         * Validación de cantidad disponible para modificación
         * (suma la cantidad disponible + la cantidad registrada).
         */
        public function validaCantidadModificada($attribute,$params){
            
                $_cantidad_disponible= ProductoAlmacen::model()->cantidad_lote2
                    ($this->attributes['producto_id'],$this->attributes['lote']);
                $_cantidad_anterior = $this->findByPk($this->id)['cantidad'];

                if(($_cantidad_disponible + $_cantidad_anterior) < $this->attributes['cantidad'])
                {
                    $this->addError($attribute, 'Cantidad ingresada es mayor a la cantidad disponible para venta. Cantidad disponible: '. ($_cantidad_disponible + $_cantidad_anterior).'.');
                }
            
            
        }
        /**
         * Validación de Credito disponible cuando forma de pago es credito, escenario update
         * @param type $attribute
         * @param type $params
         */
        public function validarCreditoModificado($attribute,$params)
        {
            //obteniendo venta
            $_venta=Venta::model()->findByPk($this->venta_id);
            //obteniendo el credito disponible
            $_cliente= Cliente::model()->findByPk($_venta->cliente_id);
            $_credito_disponible= $_cliente->credito_disponible;
            
            $_precio_anterior = $this->findByPk($this->id)['precio_unitario'];
            $_cantidad_anterior = $this->findByPk($this->id)['cantidad'];
            
            
            $_forma_pago=$_venta->forma_pago_id;
            //comprueba que forma de pago es credito (id= 1)
            if($_forma_pago==1)
            {
                if($_credito_disponible + ($_precio_anterior*$_cantidad_anterior) < $this->attributes['cantidad']* $this->attributes['precio_unitario'])
                {
                    $this->addError($attribute, 'Credito Disponible insuficiente. Credito disponible: '.$_credito_disponible );
                }
            }
        }
        
        /**
         * Validación de Credito disponible cuando forma de pago es credito, escenario create
         * @param type $attribute
         * @param type $params
         */
        public function validarCreditoDisponible($attribute,$params)
        {
            //obteniendo venta
            $_venta=Venta::model()->findByPk($this->venta_id);
            //obteniendo el credito disponible
            $_cliente= Cliente::model()->findByPk($_venta->cliente_id);
            $_credito_disponible= $_cliente->credito_disponible;
            
            $_forma_pago=$_venta->forma_pago_id;
            //comprueba que forma de pago es credito (id= 1)
            if($_forma_pago==1)
            {
                if($_credito_disponible< $this->attributes['cantidad']* $this->attributes['precio_unitario'])
                {
                    $this->addError($attribute, 'Credito Disponible insuficiente. Credito disponible: '.$_credito_disponible );
                }
            }
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
		$criteria->compare('venta_id',$this->venta_id);
		$criteria->compare('producto_id',$this->producto_id);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('precio_unitario',$this->precio_unitario,true);
		$criteria->compare('subtotal',$this->subtotal,true);
		$criteria->compare('impuesto',$this->impuesto,true);
		$criteria->compare('total',$this->total,true);
		$criteria->compare('lote',$this->lote,true);
		$criteria->compare('fecha_vencimiento',$this->fecha_vencimiento,true);
                $criteria->compare('estado', $this->estado);
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
	 * @return DetalleVenta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
//        public function beforeSave()
//        {
//            $this->fecha_compra = DateTime::createFromFormat('d/m/Y', $this->fecha_compra)->format('Y-m-d');
//            return parent::beforeSave();
//        }
        
        /*
         * Retorna los lotes con cantidad disponible mayor a cero
         */
        public function getListLote($id_producto)
	{
		$criteria = new CDbCriteria();
		$criteria->select='lote,sum(cantidad_disponible) as cantidad_disponible,fecha_vencimiento'; //lote
                $criteria->compare('producto_id',$id_producto);
                $criteria->group='lote';
                $criteria->addCondition('cantidad_disponible > 0');
                $criteria->order='fecha_vencimiento ASC';
               //$criteria->group 
                //$criteria->with=array('r_fabricante');
               // $_lab= Fabricante::model()->tablename();
               // $criteria->join='inner join '.$_lab.' lab on lab.id = t.fabricante_id ';
            
                $lista= ProductoAlmacen::model()->findAll($criteria);
                $resultados = array();
                foreach ($lista as $list){
                    $resultados[] = array(
                             'lote'=>$list->lote, 
                             'text'=> strtoupper($list->lote). ' [ #'.$list->cantidad_disponible.' - vence: '.$list->fecha_vencimiento.']',
                    ); 
                    
                }
              return $resultados;  
                
		
		
	}
        
        /**
         * Obtiene la suma de totales de los items del detalle de venta.
         */
        public function SumaTotal(){
            
            $criteria = new CDbCriteria();
		$criteria->select='sum(total) as total'; //lote
                //$criteria->addCondition('cantidad_disponible > 0');
                $criteria->condition='venta_id='.$this->venta_id;
               //$lista= $this->find($criteria);
                return $this->find($criteria)['total'];
        }
        
         /**
         * verifica que todos los items esten fuera de almacen         */
        public function AllOutStore()
        {
            // verficiar que todos los items hayan salido de almacen
            $retorna = true;
            $_count = DetalleVenta::model()->count('venta_id=:venta_id and estado!=:estado', array(':estado'=>1,':venta_id'=>$this->venta_id));
            if($_count==0)
                $retorna=true;
            else {
                $retorna=false;
            }
            return $retorna;
                
        }
        
        /**
         * Obtiene el último precio de venta para un cliente
         */
        public function LastSalePrice($id_producto)
        {
            //$id_cliente
            $criteria = new CDbCriteria();
            $criteria->select='precio_unitario';
            $criteria->condition='producto_id='.$id_producto.' and venta_id='.$this->venta_id;
            $criteria->limit=1;
            return $this->find($criteria)['precio_unitario'];
        }
        
        /**
         * cambia de estado del item detalle compra y compra luego de guardar/actualizar
         */
        public function afterSave(){
            //obtiendo venta
            $_venta= Venta::model()->findByPk($this->venta_id);

            //actualizando el total, base imponible e impuesto de la venta
            $_total=$this->SumaTotal();
            $_bi=  Producto::model()->getSubtotal($_total);
            $_venta->importe_total=$_total;//$this->SumaTotal()['total'];
            $_venta->base_imponible=$_bi; 
            $_venta->impuesto=$_total-$_bi;

            //Verificando que todos los item se hayan almacenado
           if($this->AllOutStore())
                $_venta->estado=4; // Cambiar estado a Almacenado

            $_venta->save(); //actualizando el estado de venta

            parent::afterSave();
        }
        
        
}
