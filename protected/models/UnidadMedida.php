<?php

/**
 * This is the model class for table "tbl_unidad_medida".
 *
 * The followings are the available columns in table 'tbl_unidad_medida':
 * @property integer $id
 * @property string $unidad_medida
 * @property string $nonmenclatura
 * @property string $cantidad_equivalente
 * @property integer $unidad_equivalente
 * @property integer $activo
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 *
 * The followings are the available model relations:
 * @property Producto[] $productos
 * @property UndMedProduct[] $undMedProducts
 */
class UnidadMedida extends Erp_startedActiveRecord// CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_unidad_medida';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('unidad_medida, nonmenclatura', 'required'),
			array('unidad_equivalente, activo, create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
			array('unidad_medida', 'length', 'max'=>50),
			array('nonmenclatura, cantidad_equivalente', 'length', 'max'=>10),
			array('create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, unidad_medida, nonmenclatura, cantidad_equivalente, unidad_equivalente, activo, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'r_productos' => array(self::HAS_MANY, 'Producto', 'unidad_medida_id'),
			'r_undMedProducts' => array(self::HAS_MANY, 'UndMedProduct', 'und_medida_id'),
                        'r_unidadMedida' => array(self::BELONGS_TO, 'UnidadMedida', 'unidad_equivalente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => yii::t('app','ID'),
			'unidad_medida' => yii::t('app','Unidad Medida'),
			'nonmenclatura' => yii::t('app','Nonmenclatura'),
			'cantidad_equivalente' => yii::t('app','Cantidad Equivalente'),
			'unidad_equivalente' => yii::t('app','Unidad Equivalente'),
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

		$criteria->compare('t.id',$this->id);
		$criteria->compare('unidad_medida',$this->unidad_medida,true);
		$criteria->compare('nonmenclatura',$this->nonmenclatura,true);
		$criteria->compare('cantidad_equivalente',$this->cantidad_equivalente,true);
		$criteria->compare('unidad_equivalente',$this->unidad_equivalente);
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
	 * @return UnidadMedida the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
