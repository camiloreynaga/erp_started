<?php

/**
 * This is the model class for table "tbl_guia_remision".
 *
 * The followings are the available columns in table 'tbl_guia_remision':
 * @property integer $id
 * @property string $remitente
 * @property string $serie
 * @property string $numero
 * @property integer $cliente_proveedor_id
 * @property string $motivo_traslado
 * @property string $fecha_inicio_traslado
 * @property integer $transportista_id
 * @property string $punto_partida
 * @property string $punto_llegada
 * @property string $marca_placa
 * @property string $licencia_conducir
 * @property integer $estado_gr
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 *
 * The followings are the available model relations:
 * @property DetalleGuiaRemision[] $detalleGuiaRemisions
 */
class GuiaRemision extends Erp_startedActiveRecord//CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_guia_remision';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cliente_proveedor_id, transportista_id, estado_gr, create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
			array('remitente, motivo_traslado, punto_partida, punto_llegada, marca_placa, licencia_conducir', 'length', 'max'=>50),
			array('serie', 'length', 'max'=>5),
			array('numero', 'length', 'max'=>10),
			array('fecha_inicio_traslado, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, remitente, serie, numero, cliente_proveedor_id, motivo_traslado, fecha_inicio_traslado, transportista_id, punto_partida, punto_llegada, marca_placa, licencia_conducir, estado_gr, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'r_detalleGuiaRemisions' => array(self::HAS_MANY, 'DetalleGuiaRemision', 'guia_remision_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'remitente' => 'Remitente',
			'serie' => 'Serie',
			'numero' => 'Numero',
			'cliente_proveedor_id' => 'Cliente Proveedor',
			'motivo_traslado' => 'Motivo Traslado',
			'fecha_inicio_traslado' => 'Fecha Inicio Traslado',
			'transportista_id' => 'Transportista',
			'punto_partida' => 'Punto Partida',
			'punto_llegada' => 'Punto Llegada',
			'marca_placa' => 'Marca Placa',
			'licencia_conducir' => 'Licencia Conducir',
			'estado_gr' => 'Estado Gr',
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
		$criteria->compare('remitente',$this->remitente,true);
		$criteria->compare('serie',$this->serie,true);
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('cliente_proveedor_id',$this->cliente_proveedor_id);
		$criteria->compare('motivo_traslado',$this->motivo_traslado,true);
		$criteria->compare('fecha_inicio_traslado',$this->fecha_inicio_traslado,true);
		$criteria->compare('transportista_id',$this->transportista_id);
		$criteria->compare('punto_partida',$this->punto_partida,true);
		$criteria->compare('punto_llegada',$this->punto_llegada,true);
		$criteria->compare('marca_placa',$this->marca_placa,true);
		$criteria->compare('licencia_conducir',$this->licencia_conducir,true);
		$criteria->compare('estado_gr',$this->estado_gr);
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
	 * @return GuiaRemision the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
