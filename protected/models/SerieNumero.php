<?php

/**
 * This is the model class for table "tbl_serie_numero".
 *
 * The followings are the available columns in table 'tbl_serie_numero':
 * @property integer $id
 * @property string $serie
 * @property string $numero
 * @property int $comprobante_id
 * @property int $punto_venta_id
 */
class SerieNumero extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_serie_numero';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('comprobante_id, punto_venta_id', 'numerical', 'integerOnly'=>true),
			array('serie, numero', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, serie, numero,comprobante_id, punto_venta_id', 'safe', 'on'=>'search'),
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
                    'r_comprobante'=>array(self::BELONGS_TO,'TipoComprobante','comprobante_id'),
                    'r_punto_venta'=>array(self::BELONGS_TO,'PuntoVenta','punto_venta_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'serie' => 'Serie',
			'numero' => 'Numero',
                        'comprobante_id' => yii::t('app','Tipo Comprobante'),
			'punto_venta_id' => yii::t('app','Punto Venta'),
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
		$criteria->compare('serie',$this->serie,true);
		$criteria->compare('numero',$this->numero,true);
                $criteria->compare('comprobante_id',$this->comprobante_id);
		$criteria->compare('punto_venta_id',$this->punto_venta_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

        /**
         * obtiene el ultimo nro de comprobante
         * @return type
         */
        public function getNroFactura()
        {
            $criteria=new CDbCriteria;
            $criteria->select='numero';
            
            return $this->find($criteria);
            
            //return $criteria(0) ;
            
            //$this->numero
        }
        
        /**
         * obtiene el numero de comprobante por serie y tipo
         * @param type $serie numero de serie
         * @param type $tipo tipo de comprobante
         * @return type
         */
        public function getNroComprobante($serie,$tipo)
        {
            $criteria=new CDbCriteria;
            $criteria->select='numero';
            $criteria->condition='serie='.$serie.' and comprobante_id='.$tipo;
            return $this->find($criteria);
        }
        
        /**
         * obtiene el numero de comprobante por serie y tipo
         * @param type $serie numero de serie
         * @param type $tipo tipo de comprobante
         * @return type
         */
        public function getSerieComprobante($punto_venta,$tipo)
        {
            $criteria=new CDbCriteria;
            $criteria->select='serie';
            $criteria->condition='punto_venta_id='.$punto_venta.' and comprobante_id='.$tipo;
            return $this->find($criteria)->serie; //devuelve la serie
        }
        /**
         * obtiene el id para SerieNumero
         * @param type $punto_venta
         * @param type $tipo
         * @return type
         */
        public function getSerie_id($punto_venta,$tipo)
        {
            $criteria=new CDbCriteria;
            $criteria->select='id';
            $criteria->condition='punto_venta_id='.$punto_venta.' and comprobante_id='.$tipo;
            return $this->find($criteria)->serie; //devuelve la serie
        }
        
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SerieNumero the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
