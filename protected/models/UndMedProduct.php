<?php

/**
 * This is the model class for table "tbl_und_med_product".
 *
 * The followings are the available columns in table 'tbl_und_med_product':
 * @property integer $id
 * @property integer $und_medida_id
 * @property integer $producto_id
 * @property string $precio
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 *
 * The followings are the available model relations:
 * @property Producto $producto
 * @property UnidadMedida $undMedida
 */
class UndMedProduct extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_und_med_product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('und_medida_id, producto_id', 'required'),
			array('und_medida_id, producto_id, create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
			array('precio', 'length', 'max'=>10),
			array('create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, und_medida_id, producto_id, precio, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'r_undMedida' => array(self::BELONGS_TO, 'UnidadMedida', 'und_medida_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => yii::t('app','ID'),
			'und_medida_id' => yii::t('app','Und Medida'),
			'producto_id' => yii::t('app','Producto'),
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

		$criteria->compare('t.id',$this->id);
		$criteria->compare('und_medida_id',$this->und_medida_id);
		$criteria->compare('producto_id',$this->producto_id);
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
	 * @return UndMedProduct the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
