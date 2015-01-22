<?php

class ComprobanteVentaController extends Controller
{
    private $_venta=null;
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
        'VentaContext + create index admin'    
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
            'actions'=>array('admin','delete','anularFactura','EditItem','GetTipoComprobante'),
            'users'=>array('@','admin'),
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
        $model=new ComprobanteVenta;
        $model->venta_id=$this->_venta->id;
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if(isset($_POST['ComprobanteVenta']))
        {
            $model->attributes=$_POST['ComprobanteVenta'];
            $venta=  Venta::model()->findByPk($model->venta_id);
            
            //$model->venta_id=$venta->id;
            $model->fecha_emision=$venta->fecha_venta;
            $model->tipo_comprobante_id=1; //tipo de comprobante factura
            $model->estado=0; //estado pendient de cancelacion
            //$model->fecha_emision
            $model->save();
        //if($model->save())
        //$this->redirect(array('view','id'=>$model->id));
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

        if(isset($_POST['ComprobanteVenta']))
        {
        $model->attributes=$_POST['ComprobanteVenta'];
        if($model->save())
        $this->redirect(array('view','id'=>$model->id));
        }

        $this->render('update',array(
        'model'=>$model,
        ));
    }
        
    /**
    * actualiza un item de tipo texto cualquiera
    */
   public function actionEditItem()
   {
    Yii::import('booster.components.TbEditableSaver');
    $es = new TbEditableSaver('ComprobanteVenta');

    //actualiza el estado del item de detalle de compra
//         $es->onAfterUpdate= function($event) {
//
//             $model=$this->loadModel(yii::app()->request->getParam('pk')); //obteniendo el Model de detalleCompra
//             $model->actualizarEstado();    
//            };  

       $es->update();

   }
    
        /**
        * Anula el comprobate de venta
        * @param type $id id del comprobante
        */
       public function actionAnularFactura($id)
       {
            $model=$this->loadModel($id); // obteniendo modelo de comprbante venta
            $venta = Venta::model()->findByPk($model->venta_id); // cargando venta
            //
            $model->estado=2; //estado de comprobante anulado
            $venta->estado_comprobante=0; // cambiar el estado de comprobante a pendiente
            if($model->save())
            {
               // SerieNumero::model()->updateByPk(1,array('numero'=>$venta->numero)); 

                $venta->save();

            }
            $this->redirect(array('//venta/view','id'=>$model->venta_id));
            //$this->createUrl($route, $params)

            //crea una factura cada 30 items
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
        $dataProvider=new CActiveDataProvider('ComprobanteVenta');
        $this->render('index',array(
        'dataProvider'=>$dataProvider,
        ));
    }

    /**
    * Manages all models.
    */
    public function actionAdmin()
    {
        $model=new ComprobanteVenta('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['ComprobanteVenta']))
        $model->attributes=$_GET['ComprobanteVenta'];

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
        $model=ComprobanteVenta::model()->findByPk($id);
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
        if(isset($_POST['ajax']) && $_POST['ajax']==='comprobante-venta-form')
        {
        echo CActiveForm::validate($model);
        Yii::app()->end();
        }
    }
    
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
        protected function loadVenta($venta_id)
        {
            //if the project property is null, create it based on input id 
            if($this->_venta===null)
            {
                $this->_venta= Venta::model()->findByPk($venta_id);
                if ($this->_venta===null)
                {
                throw new CHttpException(404,'The requested comprobante venta does not exist.');
                }
            }
            
            return $this->_venta;
        }
        
        //new fucntion for Rizo
        
        public function actionGetTipoComprobante()
        {
            echo CJSON::encode(TipoComprobante::model()->findAll(), 'id', 'comprobante'); 
        }
}
