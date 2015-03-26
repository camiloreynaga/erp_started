<?php

class RangoPrecioController extends Controller
{
    private $_producto=null;
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
            'ProductContext + create index admin'
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
                'users'=>array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('create','update'),
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
    * Creates a new model.
    * If creation is successful, the browser will be redirected to the 'view' page.
    */
    public function actionCreate()
    {
        $model=new RangoPrecio;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['RangoPrecio']))
        {
            $model->attributes=$_POST['RangoPrecio'];
            $model->producto_id=  $this->_producto->id;
            if($model->save())
            {
                echo CJSON::encode(
                        array('status'=>'success'
                    ));
                yii::app()->end();
            }
            else
            {
                $error=  CActiveForm::validate($model);
                    if($error!='[]')
                        echo $error;
                    Yii::app()->end();
            }
        }

        $this->render('create',array(
            'model'=>$model,
        ));
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

        if(isset($_POST['RangoPrecio']))
        {
            $model->attributes=$_POST['RangoPrecio'];
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
        $dataProvider=new CActiveDataProvider('RangoPrecio');
        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
    }

    /**
    * Manages all models.
    */
    public function actionAdmin()
    {
        $model=new RangoPrecio('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['RangoPrecio']))
            $model->attributes=$_GET['RangoPrecio'];

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
        $model=RangoPrecio::model()->findByPk($id);
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
        if(isset($_POST['ajax']) && $_POST['ajax']==='rango-precio-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    
    public function filterProductContext($filterChain)
    {
        //set the project identifier based on either the GET or POST input
        //request variables, since we allow both types for our actions

        $producto_id=null;
        if (isset($_GET['id']))
            $producto_id=$_GET['id'];
        else
            if (isset ($_POST['id']))
                $producto_id=$_POST['id'];

            $this->loadProducto($producto_id);
            //complete the running of other filters and execute the requested action
            $filterChain->run();

    }
        
    /**
    * Returns the project model instance to which this issue belongs
    */
    public function getProducto()
    {
        return $this->_producto;
    }
    
    /**
    * Protected method to load the associated Project model class
    * @project_id the primary identifier of the associated Project
    * @return object the Project data model based on the primary key
    */
    protected function loadProducto($producto_id)
    {
        //if the project property is null, create it based on input id 
        if($this->_producto===null)
        {
            $this->_producto= Producto::model()->findByPk($producto_id);
            if ($this->_producto===null)
            {
                throw new CHttpException(404,'The requested detalle venta does not exist.');
            }
        }

        return $this->_producto;
    }
}
