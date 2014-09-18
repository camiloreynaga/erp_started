<?php

class CompraController extends Controller
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
                'actions'=>array('create','update','admin'),
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
            $model=new Compra;
            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            if(isset($_POST['Compra']))
            {
            $model->attributes=$_POST['Compra'];
            $orden_compra= OrdenCompra::model()->findByPk($model->orden_compra_id);
            if ($model->validate(array('fecha_compra','orden_compra_id')))
            {
                $model->proveedor_id= $orden_compra->proveedor_id;
                $model->estado=0; // estado inicial de compra
                
                if($model->save())
                {
                $orden_compra->estado=4; // orden de compra recepcionada. ingresando comprobante
                $orden_compra->save();
                //$this->redirect(array('view','id'=>$model->id));
                //$detalle_oc = DetalleOrdenCompra::model()->findby
                $this->createDetalleCompra($model->orden_compra_id,$model->id); //llama al metodo para el ingreso del detalle de compra
                //$this->redirect(array('/DetalleCompra/create','pid'=>$model->id));
                $this->redirect(array('/ComprobanteCompra/create','pid'=>$model->id));
                }
            }
            
            
            }
            $this->render('create',array(
            'model'=>$model,
            ));
        }
        
        /**
         * crea los items del detalle de compra en base al detalle de orden de compra
         * @param type $id_oc 
         */
        public function createDetalleCompra($id_oc,$id_compra)
        {
            //$item_id=array();
            $lista=DetalleOrdenCompra::model()->getItemsDetalleOrdenCompra($id_oc);
              //$resultados = array();
              foreach ($lista as $list){
                  $detalle_compra = new DetalleCompra();
                  $detalle_compra->compra_id=$id_compra;
                  $detalle_compra->producto_id=$list->producto_id;
                  $detalle_compra->cantidad=$list->cantidad;
                  $detalle_compra->precio_unitario=$list->precio_unitario;
                  $detalle_compra->subtotal=$list->subtotal;
                  $detalle_compra->impuesto=$list->impuesto;
                  $detalle_compra->total=$list->total;
                  $detalle_compra->save();
                        // 'id'=>$list->id,
                        // 'text'=> $list->id.'-'.$list->r_proveedor->nombre_rz. ' (Fecha:'.$list->fecha_orden.')',
              }
              //return $resultados;
                    
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

            if(isset($_POST['Compra']))
            {
            $model->attributes=$_POST['Compra'];
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
            
                $model= $this->loadModel($id);
                $orden_compra= OrdenCompra::model()->findByPk($model->orden_compra_id);
                $orden_compra->estado=0; //volvieno a estado pendiente
                $orden_compra->save();
                $model->delete();
            
            

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
            $dataProvider=new CActiveDataProvider('Compra');
            $this->render('index',array(
            'dataProvider'=>$dataProvider,
            ));
        }

        /**
        * Manages all models.
        */
        public function actionAdmin()
        {
            $model=new Compra('search');
            $model->unsetAttributes();  // clear any default values
            if(isset($_GET['Compra']))
            $model->attributes=$_GET['Compra'];

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
            $model=Compra::model()->findByPk($id);
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
            if(isset($_POST['ajax']) && $_POST['ajax']==='compra-form')
            {
            echo CActiveForm::validate($model);
            Yii::app()->end();
            }
        }
}
