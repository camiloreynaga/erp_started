<?php

class ComprobanteCompraController extends Controller
{
        /**
        * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
        * using two-column layout. See 'protected/views/layouts/column2.php'.
        */
            private $_Compra = null;
            public $layout='//layouts/column2';

        /**
        * @return array action filters
        */
        public function filters()
        {
            return array(
            'accessControl', // perform access control for CRUD operations
            'CompraContext + create index admin', 
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
            'actions'=>array('create','update','editItem','finalizar'),
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
            $model=new ComprobanteCompra;
            $model->compra_id= $this->_Compra->id;
            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            if(isset($_POST['ComprobanteCompra']))
            {
                $model->attributes=$_POST['ComprobanteCompra'];
                //$model->fecha_emision= date_format($model->fecha_emision, 'Y-m-d'); 
                if($model->save())
                {
                 echo CJSON::encode(array(
                                'status'=>'success', 
                                ));
                           Yii::app()->end();// exit;
                }
                else
                {
                    $error = CActiveForm::validate($model);
                                        if($error!='[]')
                                            echo $error;
                                        Yii::app()->end();
                }
                //$this->redirect(array('view','id'=>$model->id));
            }
            else
            {
                $this->render('create',array(
                'model'=>$model,
                ));
            }

            
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

            if(isset($_POST['ComprobanteCompra']))
            {
            $model->attributes=$_POST['ComprobanteCompra'];
            if($model->save())
            $this->redirect(array('view','id'=>$model->id));
            }

            $this->render('update',array(
            'model'=>$model,
            ));
        }
        
        public function actionEditItem()
        {
         Yii::import('booster.components.TbEditableSaver');
         $es = new TbEditableSaver('ComprobanteCompra');
            $es->update();
//         
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
            $dataProvider=new CActiveDataProvider('ComprobanteCompra');
            $this->render('index',array(
            'dataProvider'=>$dataProvider,
            ));
        }

        /**
        * Manages all models.
        */
        public function actionAdmin()
        {
            $model=new ComprobanteCompra('search');
            $model->unsetAttributes();  // clear any default values
            if(isset($_GET['ComprobanteCompra']))
            $model->attributes=$_GET['ComprobanteCompra'];

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
            $model=ComprobanteCompra::model()->findByPk($id);
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
            if(isset($_POST['ajax']) && $_POST['ajax']==='comprobante-compra-form')
            {
            echo CActiveForm::validate($model);
            Yii::app()->end();
            }
        }
        
        public function filterCompraContext($filterChain)
        {
            //set the project identifier based on either the GET or POST input
            //request variables, since we allow both types for our actions
            
            $Compra_Id=null;
            if (isset($_GET['pid']))
                $Compra_Id=$_GET['pid'];
            else
                if (isset ($_POST['pid']))
                    $Compra_Id=$_POST['pid'];
                
                $this->loadOrdenCompra($Compra_Id);
                
                //complete the running of other filters and execute the requested action
                $filterChain->run();

        }
        /**
        * Returns the project model instance to which this issue belongs
        */
        public function getOrdenCompra()
        {
            return $this->_Compra;
        }
        
        /**
        * Protected method to load the associated Project model class
        * @project_id the primary identifier of the associated Project
        * @return object the Project data model based on the primary key
        */
        protected function loadOrdenCompra($oc_id)
        {
            //if the project property is null, create it based on input id 
            if($this->_Compra===null)
            {
                $this->_Compra=  OrdenCompra::model()->findByPk($oc_id);
                if ($this->_Compra===null)
                {
                throw new CHttpException(404,'The requested compra does not exist.');
                }
            }
            
            return $this->_Compra;
        }
        public function actionFinalizar($id)
        {
                $tmp= ComprobanteCompra::model()->count('compra_id=:compra_id',array(':compra_id'=>$id));
                //$model=ComprobanteCompra::model()->coun($id);
                if($tmp==0)
                {                
                
                    echo CJSON::encode(array(
                                    'status'=>'true', 
                                    ));
//                  // echo "Ingresa un comprobante";
//                    Yii::app()->end();
    //               $this->redirect(array('create','pid'=>$id));
                }
                else
                {
                    echo CJSON::encode(array(
                                    'status'=>'false', 
                                    ));
                    //$this->redirect(array('DetalleCompra/create','pid'=>$id));
                }
                
            
        }
}
