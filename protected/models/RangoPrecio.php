<?php

/**
 * This is the model class for table "tbl_rango_precio".
 *
 * The followings are the available columns in table 'tbl_rango_precio':
 * @property integer $id
 * @property integer $producto_id
 * @property integer $unidad_medida_id
 * @property integer $cantidad_inicial
 * @property integer $cantidad_final
 * @property string $precio
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 */
class RangoPrecio extends Erp_startedActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_rango_precio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('producto_id, unidad_medida_id, cantidad_inicial, precio', 'required'),
			array('producto_id, unidad_medida_id, cantidad_inicial, cantidad_final, create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
			array('precio', 'length', 'max'=>10),
			array('create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, producto_id, unidad_medida_id, cantidad_inicial, cantidad_final, precio, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
                    'r_unidadMedida' => array(self::BELONGS_TO, 'UnidadMedida', 'unidad_medida_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => yii::t('app','ID'),
			'producto_id' => yii::t('app','Producto'),
			'unidad_medida_id' => yii::t('app','Unidad Medida'),
			'cantidad_inicial' => yii::t('app','Cantidad Inicial'),
			'cantidad_final' => yii::t('app','Cantidad Final'),
			'precio' => yii::t('app','Precio'),
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
		$criteria->compare('producto_id',$this->producto_id);
		$criteria->compare('unidad_medida_id',$this->unidad_medida_id);
		$criteria->compare('cantidad_inicial',$this->cantidad_inicial);
		$criteria->compare('cantidad_final',$this->cantidad_final);
		$criteria->compare('precio',$this->precio,true);
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
	 * @return RangoPrecio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
