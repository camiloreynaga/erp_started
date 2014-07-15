<?php

/**
 * This is the model class for table "tbl_producto_almacen".
 *
 * The followings are the available columns in table 'tbl_producto_almacen':
 * @property integer $id
 * @property integer $almacen_id
 * @property integer $producto_id
 * @property string $lote
 * @property string $fecha_vencimiento
 * @property integer $cantidad_disponible
 * @property integer $update_real
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 * 
 */
class ProductoAlmacen extends Erp_startedActiveRecord//CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_producto_almacen';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('almacen_id, producto_id, cantidad_disponible,cantidad_real, create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
			array('lote', 'length', 'max'=>50),
			array('fecha_vencimiento, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, almacen_id, producto_id, lote, fecha_vencimiento, cantidad_disponible,cantidad_real, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'almacen_id' => 'Almacen',
			'producto_id' => 'Producto',
			'lote' => 'Lote',
			'fecha_vencimiento' => 'Fecha Vencimiento',
			'cantidad_disponible' => 'Cantidad Disponible',
                        'cantidad_real'=>'Cantidad Real',
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
		$criteria->compare('almacen_id',$this->almacen_id);
		$criteria->compare('producto_id',$this->producto_id);
		$criteria->compare('lote',$this->lote,true);
		$criteria->compare('fecha_vencimiento',$this->fecha_vencimiento,true);
		$criteria->compare('cantidad_disponible',$this->cantidad_disponible);
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
	 * @return ProductoAlmacen the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        /*
         * retorna la fecha de vencimiento de 
         * @param int $_producto id del producto
         * @param string $_lote lote 
         * @return CActiveRecord
         */
        public function getFecha_vencimiento($_producto,$_lote)
        {
            $criteria = new CDbCriteria();
            $criteria->select='fecha_vencimiento';
            $criteria->condition = 'producto_id='.$_producto.' and lote='.$_lote;
            return $this->find($criteria)['fecha_vencimiento'];
            //return  $this->find('producto_id= :producto and lote=:lote',array(':producto'=>$_producto,':lote'=>$_lote));
        }
        
        /*
         * devuelve la cantidad disponible para un producto por lote
         */
        public function cantidad_lote2($_producto,$_lote)
        {
            $cantidad_lote=0;
            $tmp= $this->findAll('producto_id=:id_producto and lote=:lote',array(':id_producto'=>$_producto,':lote'=>$_lote));
            foreach($tmp as $r)
            {
                $cantidad_lote+=$r->cantidad_disponible;
            }
            return $cantidad_lote;
        }
        
}