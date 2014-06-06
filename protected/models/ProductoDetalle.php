<?php

/**
 * This is the model class for table "tbl_producto_detalle".
 *
 * The followings are the available columns in table 'tbl_producto_detalle':
 * @property integer $id
 * @property integer $producto_grupo_id
 * @property integer $producto_id
 * @property integer $cantidad
 *
 * The followings are the available model relations:
 * @property TblProducto $producto
 * @property TblProducto $productoGrupo
 */
class ProductoDetalle extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductoDetalle the static model class
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
		return 'tbl_producto_detalle';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('producto_grupo_id, producto_id, cantidad', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, producto_grupo_id, producto_id, cantidad', 'safe', 'on'=>'search'),
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
			'producto' => array(self::BELONGS_TO, 'TblProducto', 'producto_id'),
			'productoGrupo' => array(self::BELONGS_TO, 'TblProducto', 'producto_grupo_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'producto_grupo_id' => 'Producto Grupo',
			'producto_id' => 'Producto',
			'cantidad' => 'Cantidad',
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
		$criteria->compare('producto_grupo_id',$this->producto_grupo_id);
		$criteria->compare('producto_id',$this->producto_id);
		$criteria->compare('cantidad',$this->cantidad);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}