<?php

/**
 * This is the model class for table "tbl_nota_credito".
 *
 * The followings are the available columns in table 'tbl_nota_credito':
 * @property integer $id
 * @property integer $comprobante_venta_id
 * @property string $fecha_emision
 * @property string $serie
 * @property string $numero
 * @property integer $estado
 * @property string $motivo_emision
 * @property string $base_imponible
 * @property string $impuesto
 * @property string $importe_total
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 *
 * The followings are the available model relations:
 * @property DetalleNotaCredito[] $detalleNotaCreditos
 */
class NotaCredito extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_nota_credito';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('serie, numero', 'required'),
			array('comprobante_venta_id, estado, create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
			array('serie', 'length', 'max'=>5),
			array('numero, base_imponible, impuesto, importe_total', 'length', 'max'=>10),
			array('motivo_emision', 'length', 'max'=>50),
			array('fecha_emision, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, comprobante_venta_id, fecha_emision, serie, numero, estado, motivo_emision, base_imponible, impuesto, importe_total, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'detalleNotaCreditos' => array(self::HAS_MANY, 'DetalleNotaCredito', 'nota_credito_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'comprobante_venta_id' => 'Comprobante Venta',
			'fecha_emision' => 'Fecha Emision',
			'serie' => 'Serie',
			'numero' => 'Numero',
			'estado' => 'Estado',
			'motivo_emision' => 'Motivo Emision',
			'base_imponible' => 'Base Imponible',
			'impuesto' => 'Impuesto',
			'importe_total' => 'Importe Total',
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
		$criteria->compare('comprobante_venta_id',$this->comprobante_venta_id);
		$criteria->compare('fecha_emision',$this->fecha_emision,true);
		$criteria->compare('serie',$this->serie,true);
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('motivo_emision',$this->motivo_emision,true);
		$criteria->compare('base_imponible',$this->base_imponible,true);
		$criteria->compare('impuesto',$this->impuesto,true);
		$criteria->compare('importe_total',$this->importe_total,true);
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
	 * @return NotaCredito the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
