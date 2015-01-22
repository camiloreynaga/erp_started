<?php

/**
 * This is the model class for table "tbl_tax".
 *
 * The followings are the available columns in table 'tbl_tax':
 * @property integer $id
 * @property string $tax
 * @property string $percent
 * @property string $condition
 * @property integer $active
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 *
 * The followings are the available model relations:
 * @property TaxProduct[] $taxProducts
 */
class Tax extends Erp_startedActiveRecord// CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_tax';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tax, percent', 'required'),
			array('active, create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
			array('tax', 'length', 'max'=>50),
			array('percent', 'length', 'max'=>10),
			array('condition, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tax, percent, condition, active, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'r_taxProducts' => array(self::HAS_MANY, 'TaxProduct', 'tax_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => yii::t('app','ID'),
			'tax' => yii::t('app','Tax'),
			'percent' => yii::t('app','Percent'),
			'condition' => yii::t('app','Condition'),
			'active' => yii::t('app','Active'),
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
		$criteria->compare('tax',$this->tax,true);
		$criteria->compare('percent',$this->percent,true);
		$criteria->compare('condition',$this->condition,true);
		$criteria->compare('active',$this->active);
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
	 * @return Tax the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
