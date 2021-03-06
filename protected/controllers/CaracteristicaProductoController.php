<?php

class CaracteristicaProductoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','ReqTest03'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','AddArray','DelArray'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'roles'=>array('root'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new CaracteristicaProducto;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CaracteristicaProducto']))
		{
			$model->attributes=$_POST['CaracteristicaProducto'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
        /**
         * Agregar un elemento al arreglo (buffer) de caracteristicas por producto
         */
        public function actionAddArray()
        {
            if(isset($_POST['CaracteristicaProducto']))
            {
                $_id=$_POST['CaracteristicaProducto']['caracteristica_id']; // id de caracteristica
                $_result= Caracteristica::model()->findByPk($_id); // obtiene texto de caracteristic_id
                $_data= array(
                    'id'=>count($_SESSION['arrayCaracteristica']), //agregando un ID al Array
                    'caracteristica_id'=>$_POST['CaracteristicaProducto']['caracteristica_id'],
                    'valor'=>$_POST['CaracteristicaProducto']['valor'],
                    'caracteristica_text'=> $_result->caracteristica
                );
                //validando duplicidad
                
                //if (array_key_exists($_id,$_SESSION['arrayCaracteristica'])==false)
                    if($this->getDuplicado($_SESSION['arrayCaracteristica'],'caracteristica_id', $_id)==false)
                        array_push($_SESSION['arrayCaracteristica'],$_data);//agregando valores recibidos desde el form a la variable de sesion
            }
            
            $this->renderPartial('_viewCaracteristicas',array('data'=>$_SESSION['arrayCaracteristica']),false,true);
            
        }
        
        public function getDuplicado($array,$a_asociativo,$value)
        {
            $retorna = false;
            
//            for ($i=0;$i<count($array);$i++)
//            {
//                if ($array[$i]['caracteristica_id']===$value);
//                $retorna=true;
//            }
            
            foreach ($array as $x => $x_value )
                {
                    if ($value===$x_value[$a_asociativo])
                    {
                        $retorna= TRUE;
                        break;
                    }
                }
                return $retorna;
        }
        
        public function actionReqTest03() 
        {
          echo CHtml::encode(print_r($_SESSION['arrayCaracteristica'], true));
        }

        /**
         * Quita un elemento de arreglo (buffer) de las caracterisitcas por producto
         * @param type $id
         */
        public function actionDelArray($id)
        {
            if(isset($id))
            {
                unset($_SESSION['arrayCaracteristica'][$id]);
            }
             $this->renderPartial('_viewCaracteristicas',array('data'=>$_SESSION['arrayCaracteristica']),false,true);
        }

        /**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CaracteristicaProducto']))
		{
			$model->attributes=$_POST['CaracteristicaProducto'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('CaracteristicaProducto');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new CaracteristicaProducto('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CaracteristicaProducto']))
			$model->attributes=$_GET['CaracteristicaProducto'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CaracteristicaProducto the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=CaracteristicaProducto::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CaracteristicaProducto $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='caracteristica-producto-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
