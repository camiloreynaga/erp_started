<?php

/**
 * This is the model class for table "tbl_detalle_guia_remision".
 *
 * The followings are the available columns in table 'tbl_detalle_guia_remision':
 * @property integer $id
 * @property integer $guia_remision_id
 * @property integer $producto_id
 * @property string $descripcion
 * @property integer $cantidad
 * @property integer $unidad_medida
 * @property string $peso
 *
 * The followings are the available model relations:
 * @property GuiaRemision $guiaRemision
 */
class DetalleGuiaRemision extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_detalle_guia_remision';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('guia_remision_id, producto_id, cantidad, unidad_medida', 'numerical', 'integerOnly'=>true),
			array('descripcion', 'length', 'max'=>100),
			array('peso', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, guia_remision_id, producto_id, descripcion, cantidad, unidad_medida, peso', 'safe', 'on'=>'search'),
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
			'r_guiaRemision' => array(self::BELONGS_TO, 'GuiaRemision', 'guia_remision_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'guia_remision_id' => 'Guia Remision',
			'producto_id' => 'Producto',
			'descripcion' => 'Descripcion',
			'cantidad' => 'Cantidad',
			'unidad_medida' => 'Unidad Medida',
			'peso' => 'Peso',
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
		$criteria->compare('guia_remision_id',$this->guia_remision_id);
		$criteria->compare('producto_id',$this->producto_id);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('unidad_medida',$this->unidad_medida);
		$criteria->compare('peso',$this->peso,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DetalleGuiaRemision the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
