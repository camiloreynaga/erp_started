<?php

/**
 * This is the model class for table "tbl_usuario".
 *
 * The followings are the available columns in table 'tbl_usuario':
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property integer $empleado_id
 * @property string $last_login_time
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 *
 * The followings are the available model relations:
 * @property TblEmpleado $empleado
 */
class Usuario extends Erp_startedActiveRecord//CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Usuario the static model class
	 */
	
        public $password_repeat;
        public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, empleado_id, password_repeat', 'required'),
			array('empleado_id', 'numerical', 'integerOnly'=>true),
                        array('username,email','unique'),
                        array('email','email'),
			array('username, email, password', 'length', 'max'=>255),
                        array('password','compare'),
                        array('password_repeat', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, email, password, empleado_id,create_user_id,update_user_id,create_time,update_time', 'safe', 'on'=>'search'),
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
			'r_empleado' => array(self::BELONGS_TO, 'TblEmpleado', 'empleado_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'email' => 'Email',
			'password' => 'Password',
			'empleado_id' => 'Empleado',
			'last_login_time' => 'Last Login Time',
			'create_time' => 'Create Time',
			'create_user_id' => 'Create User',
			'update_time' => 'Update Time',
			'update_user_id' => 'Update User',
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

		$criteria->compare('t.id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('empleado_id',$this->empleado_id);
		$criteria->compare('last_login_time',$this->last_login_time,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
                
	}
        /**
        * apply a hash on the password before we store it in the database
        */
        protected  function afterValidate() 
        {
            parent::afterValidate();
            if(!$this->hasErrors())
                $this->password= $this->hashPassword($this->password);
        }
        
        /**
        * Generates the password hash.
        * @param string password
        * @return string hash
        */
        public function hashPassword($password)
        {
            return md5($password);
        }
        
        /**
        * Checks if the given password is correct.
        * @param string the password to be validated
        * @return boolean whether the password is valid
        */
        public function validatePassword($password)
        {
        return $this->hashPassword($password)===$this->password;
        }
        /**
         * retorna el username del usuario
         * @param type $id
         * @return type
         */
        public function getUsuario($id)
        {
           return isset($id) ?$this->findByPk($id)->username : 'Unknow';
        }
}