<?php

/**
 * This is the model class for table "tbl_caracteristica_producto".
 *
 * The followings are the available columns in table 'tbl_caracteristica_producto':
 * @property integer $id
 * @property integer $producto_id
 * @property integer $caracteristica_id
 * @property string $valor
 *
 * The followings are the available model relations:
 * @property TblProducto $producto
 * @property TblCaracteristica $caracteristica
 */
class CaracteristicaProducto extends Erp_startedActiveRecord//CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CaracteristicaProducto the static model class
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
		return 'tbl_caracteristica_producto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('caracteristica_id', 'required'),//producto_id,
			array('producto_id, caracteristica_id', 'numerical', 'integerOnly'=>true),
			array('valor', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, producto_id, caracteristica_id, valor', 'safe', 'on'=>'search'),
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
			'producto' => array(self::BELONGS_TO, 'Producto', 'producto_id'),
			'caracteristica' => array(self::BELONGS_TO, 'Caracteristica', 'caracteristica_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'producto_id' => 'Producto',
			'caracteristica_id' => 'Caracteristica',
			'valor' => 'Valor',
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
		$criteria->compare('producto_id',$this->producto_id);
		$criteria->compare('caracteristica_id',$this->caracteristica_id);
		$criteria->compare('valor',$this->valor,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        
//        public function getCaracteristica($id)
//        {
//            //$criteria = new CDbCriteria();
//            //$criteria->
//            return Caracteristica::model()->findByPk($id)
//        }
}