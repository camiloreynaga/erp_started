<?php

class DetalleCompraController extends Controller
{
/**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/

        private $_Compra = null;
        public $layout='//layouts/column1';

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
                'actions'=>array('create','update','editCantidad','editItem','editPrecioUnitario','finalizar'),
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
        
        protected function PuConIGV($model)
        {
            $model->total=$model->precio_unitario*$model->cantidad;
            $model->subtotal=$model->total/((int)Yii::app()->params['impuesto']*0.01+1);
            $model->impuesto=$model->total-$model->impuesto;
            
            return $model;
        }
        
        /**
        * Creates a new model.
        * If creation is successful, the browser will be redirected to the 'view' page.
        */
        public function actionCreate()
        {
            $model=new DetalleCompra;
            $model->compra_id= $this->_Compra->id;
            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            if(isset($_POST['DetalleCompra']))
            {
                $model->attributes=$_POST['DetalleCompra'];
                /* calculo sin igv incluido
                 $model->subtotal=$model->precio_unitario*$model->cantidad;
                $model->impuesto=$model->subtotal*((int)Yii::app()->params['impuesto']*0.01);
                $model->total=$model->subtotal+$model->impuesto;
                 */
                $model->total=$model->precio_unitario*$model->cantidad;
                $model->subtotal=$model->total/((int)Yii::app()->params['impuesto']*0.01+1);
                $model->impuesto=$model->total-$model->subtotal;
                
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
               // $this->redirect(array('view','id'=>$model->id));
            }
            else{
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

            if(isset($_POST['DetalleCompra']))
            {
                $model->attributes=$_POST['DetalleCompra'];
                if($model->save())
                $this->redirect(array('view','id'=>$model->id));
            }

            $this->render('update',array(
            'model'=>$model,
            ));
        }
/*
         * Edita la cantidad de la columna 
         * además actualiza los calculos de subtotal,impuesto y total
         */
        public function actionEditCantidad()
        {
         Yii::import('booster.components.TbEditableSaver');
         $es = new TbEditableSaver('DetalleCompra');
//         /$_cantidad= $es->value;
          $es->onBeforeUpdate= function($event) {

                   $model=$this->loadModel(yii::app()->request->getParam('pk')); //obteniendo el Model de detalleCompra
                   
                   $_cantidad=  yii::app()->request->getParam('value');
                   
                   //$this->PuConIGV($model);
                   // IGV INCLUIDO
                   $_total=$model->precio_unitario*$_cantidad;//calculando el subtotal
                   $_subtotal=$_total/((int)Yii::app()->params['impuesto']*0.01 + 1); //calculando impuesto
                   $_impuesto=$_total-$_subtotal; //calculando total
                    
                   
                   $event->sender->setAttribute('subtotal', $_subtotal);//Actualizando Cantidad
                   $event->sender->setAttribute('impuesto', $_impuesto);//Actualizando impuesto
                   $event->sender->setAttribute('total', $_total); //actualizando total
            
            };
            
            $es->update();
//         
        }
        /*
         * Actualiza el precio unitario haciendo lo calculos de subtotal impuesto y total
         */
        public function actionEditPrecioUnitario()
        {
         Yii::import('booster.components.TbEditableSaver');
         $es = new TbEditableSaver('DetalleCompra');
//         /$_cantidad= $es->value;
          $es->onBeforeUpdate= function($event) {

                   $model=$this->loadModel(yii::app()->request->getParam('pk')); //obteniendo el Model de detalleCompra
                   $_precioUnitario=  yii::app()->request->getParam('value');
                   
                   $_total=$model->cantidad*$_precioUnitario;//calculando el subtotal
                   $_subtotal=$_total/((int)Yii::app()->params['impuesto']*0.01 + 1); //calculando impuesto
                   $_impuesto=$_total-$_subtotal; //calculando total
                    
                   $event->sender->setAttribute('subtotal', $_subtotal);//Actualizando Cantidad
                   $event->sender->setAttribute('impuesto', $_impuesto);//Actualizando impuesto
                   $event->sender->setAttribute('total', $_total); //actualizando total
            
            };
            
            $es->update();
        }
        
        public function actionEditItem()
        {
         Yii::import('booster.components.TbEditableSaver');
         $es = new TbEditableSaver('DetalleCompra');
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
            $dataProvider=new CActiveDataProvider('DetalleCompra');
            $this->render('index',array(
            'dataProvider'=>$dataProvider,
            ));
        }

        /**
        * Manages all models.
        */
        public function actionAdmin()
        {
            $model=new DetalleCompra('search');
            $model->unsetAttributes();  // clear any default values
            if(isset($_GET['DetalleCompra']))
            $model->attributes=$_GET['DetalleCompra'];

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
            $model=DetalleCompra::model()->findByPk($id);
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
            if(isset($_POST['ajax']) && $_POST['ajax']==='detalle-compra-form')
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
            $this->redirect(array('Compra/view','id'=>$id));
        }
}
