<?php

class CuentaCobrarController extends Controller
{
    /**
    * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
    * using two-column layout. See 'protected/views/layouts/column2.php'.
    */
    private $_venta = null;
    public $layout='//layouts/column2';

    /**
    * @return array action filters
    */
    public function filters()
    {
        return array(
        'accessControl', // perform access control for CRUD operations
       // 'VentaContext + create index admin',    
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
        'actions'=>array('index','view'),
        'users'=>array('@'),
        ),
        array('allow', // allow authenticated user to perform 'create' and 'update' actions
        'actions'=>array('create','update','admin','CuentaPendiente'),
        'users'=>array('@'),
        ),
        array('allow', // allow admin user to perform 'admin' and 'delete' actions
        'actions'=>array('admin','delete'),
        'users'=>array('admin'),
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
    * renderiza la interfaz de ventas pendiente de pago
    */
    public function actionCuentaPendiente()
    {
         $this->layout='//layouts/column1';
            $this->render('_ventaForm',array(
                ));
    }

    /**
    * Creates a new model.
    * If creation is successful, the browser will be redirected to the 'view' page.
    */
    public function actionCreate()
    {
        $model=new CuentaCobrar();
        
        if(isset($_GET['pid']))
         $model->venta_id=$_GET['pid'];
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['CuentaCobrar']))
        {
            $model->attributes=$_POST['CuentaCobrar'];
            $model->estado=0; // pendiente 
            if($model->save())
            {
                //$this->redirect(array('Create','pid'=>$model->venta_id));
                echo CJSON::encode(array(
                                    'status'=>'success', 
                                    ));
                               Yii::app()->end();// exit;
            }
            else {
                $error = CActiveForm::validate($model);
                                            if($error!='[]')
                                                echo $error;
                                            Yii::app()->end();
            }
            
        }
//        else
//        {
            $this->render('create',array(
            'model'=>$model,
            ));
        //}

        
    }

    /**
    * Updates a particular model.
    * If update is successful, the browser will be redirected to the 'view' page.
    * @param integer $id the ID of the model to be updated
    */
    public function actionUpdate($id)
    {
        
        $model=$this->loadModel($id);
        //$model->setScenario('pagar');
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['CuentaCobrar']))
        {
        $model->estado=1;    
        $model->attributes=$_POST['CuentaCobrar'];
        if($model->save())
            //if(Yii::app()->request->isAjaxRequest)
                {

                    echo CJSON::encode(array(
                        'status'=>'success',
                        'div'=>"Successfully Added.."
                    ));
                   Yii::app()->end();
                }
        //$this->redirect(array('view','id'=>$model->id));
        }
        //if(Yii::app()->request->isAjaxRequest)
        //{
            echo CJSON::encode(
                    array(
                        'status'=>'failure',
                        'div'=>$this->renderPartial('_form',array('model'=>$model),true)
                ));
            //$this->renderPartial('_form',array('model'=>$model),true)
       // }
        
    }

    /**
    * Deletes a particular model.
    * If deletion is successful, the browser will be redirected to the 'admin' page.
    * @param integer $id the ID of the model to be deleted
    */
    public function actionDelete($id)
    {
        if(Yii::app()->request->isPostRequest)
        {
        // we only allow deletion via POST request
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if(!isset($_GET['ajax']))
        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
        throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
    }

    /**
    * Lists all models.
    */
    public function actionIndex()
    {
        $dataProvider=new CActiveDataProvider('CuentaCobrar');
        $this->render('index',array(
        'dataProvider'=>$dataProvider,
        ));
    }

    /**
    * Manages all models.
    */
    public function actionAdmin()
    {
        $model=new CuentaCobrar('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['CuentaCobrar']))
        $model->attributes=$_GET['CuentaCobrar'];

        $this->render('admin',array(
        'model'=>$model,
        ));
    }

    /**
    * Returns the data model based on the primary key given in the GET variable.
    * If the data model is not found, an HTTP exception will be raised.
    * @param integer the ID of the model to be loaded
    */
    public function loadModel($id)
    {
        $model=CuentaCobrar::model()->findByPk($id);
        if($model===null)
        throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
    * Performs the AJAX validation.
    * @param CModel the model to be validated
    */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='cuenta-cobrar-form')
        {
        echo CActiveForm::validate($model);
        Yii::app()->end();
        }
    }
    
    /**
         */
        public function filterVentaContext($filterChain)
        {
            //set the project identifier based on either the GET or POST input
            //request variables, since we allow both types for our actions
            
            $Venta_Id=null;
            if (isset($_GET['pid']))
                $Venta_Id=$_GET['pid'];
            else
                if (isset ($_POST['pid']))
                    $Venta_Id=$_POST['pid'];
                
                $this->loadVenta($Venta_Id);
                
                //complete the running of other filters and execute the requested action
                $filterChain->run();

        }
        
        /**
        * Returns the project model instance to which this issue belongs
        */
        public function getVenta()
        {
            return $this->_venta;
        }
        
        /**
        * Protected method to load the associated Project model class
        * @project_id the primary identifier of the associated Project
        * @return object the Project data model based on the primary key
        */
        protected function loadVenta($id)
        {
            //if the project property is null, create it based on input id 
            if($this->_venta===null)
            {
                $this->_venta= Venta::model()->findByPk($id);
                if ($this->_venta===null)
                {
                throw new CHttpException(404,'The requested venta does not exist.');
                }
            }
            return $this->_venta;
        }
}
