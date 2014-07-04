<?php

/**
 * This is the model class for table "tbl_comprobante_compra".
 *
 * The followings are the available columns in table 'tbl_comprobante_compra':
 * @property integer $id
 * @property integer $compra_id
 * @property integer $tipo_comprobante_id
 * @property string $fecha_emision
 * @property string $fecha_cancelacion
 * @property string $serie
 * @property string $numero
 * @property integer $estado
 * @property string $guia_remision_remitente
 * @property string $guia_remision_transportista
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 *
 * The followings are the available model relations:
 * @property Compra $compra
 * @property TipoComprobante $tipoComprobante
 */
class ComprobanteCompra extends Erp_startedActiveRecord//CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_comprobante_compra';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array( 'fecha_cancelacion','compare','compareAttribute' => 'fecha_emision','operator'=>'>=', 'allowEmpty'=>'true', 'message' => '{attribute} debe ser igual o mayor a "{compareValue}".'),//Validación de fechas
			array('compra_id, tipo_comprobante_id,fecha_emision, serie, numero', 'required'),
			array('compra_id, tipo_comprobante_id, estado, create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
			array('serie', 'length', 'max'=>5),
			array('numero', 'length', 'max'=>10),
			array('guia_remision_remitente, guia_remision_transportista', 'length', 'max'=>15),
			array('fecha_emision, fecha_cancelacion, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, compra_id, tipo_comprobante_id, fecha_emision, fecha_cancelacion, serie, numero, estado, guia_remision_remitente, guia_remision_transportista, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'r_compra' => array(self::BELONGS_TO, 'Compra', 'compra_id'),
			'r_tipoComprobante' => array(self::BELONGS_TO, 'TipoComprobante', 'tipo_comprobante_id'),
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
			'tipo_comprobante_id' => 'Tipo Comprobante',
			'fecha_emision' => 'Fecha de Emisión',
			'fecha_cancelacion' => 'Fecha de Cancelación',
			'serie' => 'Serie',
			'numero' => 'Numero',
			'estado' => 'Estado',
			'guia_remision_remitente' => 'Guia Remision Remitente',
			'guia_remision_transportista' => 'Guia Remision Transportista',
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
		$criteria->compare('compra_id',$this->compra_id);
		$criteria->compare('tipo_comprobante_id',$this->tipo_comprobante_id);
		$criteria->compare('fecha_emision',$this->fecha_emision,true);
		$criteria->compare('fecha_cancelacion',$this->fecha_cancelacion,true);
		$criteria->compare('serie',$this->serie,true);
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('guia_remision_remitente',$this->guia_remision_remitente,true);
		$criteria->compare('guia_remision_transportista',$this->guia_remision_transportista,true);
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
	 * @return ComprobanteCompra the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function beforeSave()
        {
            $this->fecha_emision = DateTime::createFromFormat('d/m/Y', $this->fecha_emision)->format('Y-m-d');
            if($this->fecha_cancelacion==null) //validando la fecha de cancelación
                $this->fecha_cancelacion=null;
            else {
                $this->fecha_cancelacion= DateTime::createFromFormat('d/m/Y', $this->fecha_cancelacion)->format('Y-m-d');
            }
                
                    
            return parent::beforeSave();
        }
}
