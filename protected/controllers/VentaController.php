<?php

        class VentaController extends Controller
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
            'actions'=>array('create','update','lineaCredito','GenerarFactura','admin','print'),
            'users'=>array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
            'actions'=>array('admin','delete','anularVenta'),
            'users'=>array('admin','deysi','mayra'),
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
            'model'=>$this->loadModel($id)
            ));
        }

        /**
        * Creates a new model.
        * If creation is successful, the browser will be redirected to the 'view' page.
        */
        public function actionCreate()
        {
            $model=new Venta;
            $model->fecha_venta=date('Y-m-d');
            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            if(isset($_POST['Venta']))
            {
                $model->attributes=$_POST['Venta'];
                $model->estado='0';
                $model->estado_comprobante='0';
                $model->estado_pago='0';
                if($model->save())
                $this->redirect(array('/DetalleVenta/create','pid'=>$model->id));
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

            if(isset($_POST['Venta']))
            {
                $model->attributes=$_POST['Venta'];
                if($model->save())
                $this->redirect(array('view','id'=>$model->id));
            }

            $this->render('update',array(
            'model'=>$model,
            ));
        }
        
        /**
         * Generar la factura para la venta
         * @param type $id
         */
        public function actionGenerarFactura($id)
        {
             $model=$this->loadModel($id); // obteniendo modelo venta
             $comprobante = new ComprobanteVenta();
             $comprobante->venta_id=$id;
             $comprobante->tipo_comprobante_id=1;
             $comprobante->fecha_emision=date('Y-m-d');//$model->fecha_venta;
             $comprobante->serie=101;
             $comprobante->numero= SerieNumero::model()->getNroFactura()['numero']+1;        
             
             $comprobante->estado=0; //estado de comprobaten pendiente de pago
             $model->estado_comprobante=1; // comprobante registrado
             if($comprobante->save())
             {
                 //actualiza el numero de comprobante
                 SerieNumero::model()->updateByPk(1,array('numero'=>$comprobante->numero)); 
                         
                 $model->save();
                 
             }
             //$this->createUrl($route, $params)
             
             //crea una factura cada 30 items
        }
        
        public function actionPrint()
        {
            $this->renderPartial('_ticket',array(),false,true);
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
                $model=  $this->loadModel($id);
                $model->deleteDetaills();
                $model->delete();

           // $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if(!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
            else
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
        }
        
        /**
         * 
         */
        public function actionAnularVenta($id)
        {
//             if(Yii::app()->request->isPostRequest)
//            {
            // we only allow deletion via POST request
                $model= $this->loadModel($id);
                $model->anularDetaills();
                $model->estado=3; // cambiar estado a anulado
                //$model->deleteDetaills();
                $model->save();
                
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
                // $this->loadModel($id)->delete();

                 // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
                
//            }
//            else
//            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
        }

        /**
        * Lists all models.
        */
        public function actionIndex()
        {
            $dataProvider=new CActiveDataProvider('Venta');
            $this->render('index',array(
            'dataProvider'=>$dataProvider,
            ));
        }

        /**
        * Manages all models.
        */
        public function actionAdmin()
        {
        $model=new Venta('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Venta']))
        $model->attributes=$_GET['Venta'];

        $this->render('admin',array(
        'model'=>$model,
        ));
        }
        
        /**
         * Muestra la linea de credito y credito disponible por cliente
         */
        public function actionLineaCredito()
        {
            //$model = $this->lo
            $id_cliente = $_POST['Venta']['cliente_id'];
            $_forma_pago=$_POST['Venta']['forma_pago_id'];
            $_cliente= Cliente::model()->findByPk($id_cliente);
            $_linea_credito= $_cliente->linea_credito;
            $_credito_disponible= $_cliente->credito_disponible;
            if($_forma_pago==1)
            {
                if($_linea_credito>0)
                echo CHtml::encode("Credito disponible: ".$_credito_disponible." de: ".$_linea_credito);
            else
                echo CHtml::encode("CLIENTE SIN LINEA DE CREDITO");
            }
            else {
                echo CHtml::encode("");
            }
            
            
        }
        
        /**
        * Returns the data model based on the primary key given in the GET variable.
        * If the data model is not found, an HTTP exception will be raised.
        * @param integer the ID of the model to be loaded
        */
        public function loadModel($id)
        {
            $model=Venta::model()->findByPk($id);
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
            if(isset($_POST['ajax']) && $_POST['ajax']==='venta-form')
            {
            echo CActiveForm::validate($model);
            Yii::app()->end();
            }
        }
        
        
        
    }
