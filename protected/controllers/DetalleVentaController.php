<?php

class DetalleVentaController extends Controller
{
        /**
        * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
        * using two-column layout. See 'protected/views/layouts/column2.php'.
        */
        private $_venta=null;
        public $layout='//layouts/column1';

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
            'users'=>array('@'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
            'actions'=>array('create','update','lotes','precios','editCantidad','editPrecioUnitario','batchDelete','finalizar'),
            'users'=>array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
            'actions'=>array('admin','delete'),
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
            $model=new DetalleVenta('create');
            $model->venta_id=$this->_venta->id;
            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            if(isset($_POST['DetalleVenta']))
            {
                $model->attributes=$_POST['DetalleVenta'];
                $model->fecha_vencimiento= ProductoAlmacen::model()->getFecha_vencimiento($model->producto_id,$model->lote);
                
                $model->estado=0; // estado pendiente de despacho
                $model->total=$model->precio_unitario*$model->cantidad;
                $model->subtotal= $_subtotal= Producto::model()->getSubtotal($_total); //round($model->total/((int)Yii::app()->params['impuesto']*0.01+1),2);
                $model->impuesto= round($model->total-$model->subtotal,2);
                //cantidad disponible para el producto almacen
//                $_cantidad_alm= ProductoAlmacen::model()->cantidad_lote2($model->producto_id,$model->lote);
                
//                if($_cantidad_alm>=$model->cantidad)
//                {
                    if($model->save())
                    {
                        //actualizar la cantidad disponible en ProductoAlmacen - almacen principal por default
                        ProductoAlmacen::model()->actualizarCantidadDisponible($model,1); 
                        //actualizar credito disponible
                        Cliente::model()->actualizarCreditoDisponible($model, 1);
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
//                }
//                else{
//                    echo CJSON::encode(array(
//                                'val' =>'La Cantidad ingresada excede a la cantidad disponible de '.$_cantidad_alm
//                            ));
//                           Yii::app()->end();// exit;
//                    //$model->addError('cantidad','La cantidad seleccionada excede el total disponible.');
//                }
            }
            else
            {
                $this->render('create',array(
                'model'=>$model,
                ));
            }
        }

        protected function updateProductoAlmacen() {
           // ProductoAlmacen::model()->
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

            if(isset($_POST['DetalleVenta']))
            {
            $model->attributes=$_POST['DetalleVenta'];
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
         $es = new TbEditableSaver('DetalleVenta');
//         /$_cantidad= $es->value;
         $es->scenario='update';
         
         //$model=$this->loadModel(yii::app()->request->getParam('pk')); //obteniendo el Model de detalleCompra
         //$_cantidad=yii::app()->request->getParam('value');
         
//         $_cantidad_alm= ProductoAlmacen::model()->cantidad_lote2($model->producto_id,$model->lote);
//        if($_cantidad_alm>=$_cantidad){
             $es->onBeforeUpdate= function($event) {

                   $model=$this->loadModel(yii::app()->request->getParam('pk')); //obteniendo el Model de detalleCompra
                   
                   //incrementando la cantidad anterior para cantidad en producto almacen
                   ProductoAlmacen::model()->actualizarCantidadDisponible($model, 0);
                   //incrementando el credito disponible para para el cliente
                   Cliente::model()->actualizarCreditoDisponible($model, 0);
                   
                   $_cantidad=  yii::app()->request->getParam('value');
                   
                   $_total= round($model->precio_unitario*$_cantidad,2);//calculando el total
                   $_subtotal= Producto::model()->getSubtotal($_total);// round($_total/((int)Yii::app()->params['impuesto']*0.01+1),2); //calculando subtotal
                   $_impuesto=round($_total-$_subtotal,2); //calculando subtotal
                    
                   $event->sender->setAttribute('subtotal', $_subtotal);//Actualizando Cantidad
                   $event->sender->setAttribute('impuesto', $_impuesto);//Actualizando impuesto
                   $event->sender->setAttribute('total', $_total); //actualizando total
            
            };
            
            $es->onAfterUpdate=function($event){
                $model=$this->loadModel(yii::app()->request->getParam('pk'));
                //actualizando cantidad en producto almacen
                ProductoAlmacen::model()->actualizarCantidadDisponible($model,1); 
                //actualizando el credito disponible para el cliente.
                Cliente::model()->actualizarCreditoDisponible($model, 1);
            };
            
            $es->update();
//        }
//        else
//        {
//            $es->error('La cantidad seleccionada excede el total disponible de '.$_cantidad_alm);
//        }
                
        
         
         
        }
        
        /**
         * Actualiza el precio unitario haciendo lo calculos de subtotal impuesto y total
         */
        public function actionEditPrecioUnitario()
        {
         Yii::import('booster.components.TbEditableSaver');
         $es = new TbEditableSaver('DetalleVenta');
         $es->scenario='update';
//         /$_cantidad= $es->value;
          $es->onBeforeUpdate= function($event) {

                   $model=$this->loadModel(yii::app()->request->getParam('pk')); //obteniendo el Model de detalleCompra
                   
                   //incrementando el credito disponible para para el cliente
                   Cliente::model()->actualizarCreditoDisponible($model, 0);
                   
                   $_precioUnitario=  yii::app()->request->getParam('value');
                   
                   $_total= round($model->cantidad*$_precioUnitario,2);//calculando el subtotal
                   $_subtotal= $_subtotal= Producto::model()->getSubtotal($_total); //round($_total/((int)Yii::app()->params['impuesto']*0.01+1),2); //calculando impuesto
                   $_impuesto= round($_total-$_subtotal,2); //calculando total
                    
                   $event->sender->setAttribute('subtotal', $_subtotal);//Actualizando Cantidad
                   $event->sender->setAttribute('impuesto', $_impuesto);//Actualizando impuesto
                   $event->sender->setAttribute('total', $_total); //actualizando total
            
            };
          $es->onAfterUpdate=function($event){
                $model=$this->loadModel(yii::app()->request->getParam('pk'));
                //actualizando el credito disponible para el cliente.
                Cliente::model()->actualizarCreditoDisponible($model, 1);
            };
            
            $es->update();
        }
        
        /**
         * Hace un borrado por lotes 
         */
        public function actionBatchDelete()
        {
             if(Yii::app()->request->getIsAjaxRequest())
                {
                 //$ids
                    if(isset($_GET['ids'])){
                    //if(isset($_POST['ids'])){
                        //$ids = $_POST['ids'];
                        $ids = $_GET['ids'];
                    
//                    if (empty($ids)) {
//                        echo CJSON::encode(array('status' => 'failure', 'msg' => 'you should at least choice one item'));
//                        die();
//                    }
                    $successCount = $failureCount = 0;
                    foreach ($ids as $id) {
                        //$model=$this->Delete($id);
                        $model = $this->loadModel($id);
                        //actualiza la cantidad disponible
                        ProductoAlmacen::model()->actualizarCantidadDisponible($model,0); 
                        //actualizando el credito disponible
                        Cliente::model()->actualizarCreditoDisponible($model,0);
                        ($model->delete() == true) ? $successCount++ : $failureCount++;
                    }
//                    echo CJSON::encode(array('status' => 'success',
//                        'data' => array(
//                            'successCount' => $successCount,
//                            'failureCount' => $failureCount,
//                        )));
//                    die();
                }   
                else{
                    throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
                }
            }
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
                $detalle_venta= $this->loadModel($id);
                  //actualizar la cantidad disponible en ProductoAlmacen
                ProductoAlmacen::model()->actualizarCantidadDisponible($detalle_venta,0); 
                //actualizando credito disponible en cliente
                Cliente::model()->actualizarCreditoDisponible($detalle_venta,0);
                
                //actualizar importe, subtotal, impuesto.
                //obtiendo venta
                $_venta= Venta::model()->findByPk($detalle_venta->venta_id);
                
                //we only allow deletion via POST request
                $detalle_venta->delete();
                
                //actualizando el total, base imponible e impuesto de la venta
                $_total=$detalle_venta->SumaTotal();
                $_bi=  Producto::model()->getSubtotal($_total);
                $_venta->importe_total=$_total;//$this->SumaTotal()['total'];
                $_venta->base_imponible=$_bi; 
                $_venta->impuesto=$_total-$_bi;
                $_venta->save();

                
                // $this->loadModel($id)->delete();



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
            $dataProvider=new CActiveDataProvider('DetalleVenta');
            $this->render('index',array(
            'dataProvider'=>$dataProvider,
            ));
        }

        /**
        * Manages all models.
        */
        public function actionAdmin()
        {
            $model=new DetalleVenta('search');
            $model->unsetAttributes();  // clear any default values
            if(isset($_GET['DetalleVenta']))
            $model->attributes=$_GET['DetalleVenta'];

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
            $model=DetalleVenta::model()->findByPk($id);
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
            if(isset($_POST['ajax']) && $_POST['ajax']==='detalle-venta-form')
            {
            echo CActiveForm::validate($model);
            Yii::app()->end();
            }
        }
        
        /**
         * Retorna los lotes que tiene stock >0
         */
        public function actionLotes()
        {
            if(isset($_POST['DetalleVenta']))
            {
                $id_producto= $_POST['DetalleVenta']['producto_id'];
                $lista= DetalleVenta::model()->getListLote($id_producto);
                $lista=CHtml::listData($lista, 'lote', 'text');
                foreach($lista as $valor => $descripcion)
                {
                    echo CHtml::tag('option',array('value'=>$valor),  CHtml::encode($descripcion),TRUE);
                }
             }
            //echo CHtml::tag('option',array('value'=>'0'),  CHtml::encode('select'),TRUE);
        }
        
        /**
         * Retorna los precios de venta regular y el ultimo precio de venta 
         */
        public function actionPrecios()
        {
            if(isset($_POST['producto_id']))
            {
                $id_producto= $_POST['producto_id']; //obteniendo ID de producto
                //obteniendo venta_id
                // $_venta_id= $this->getVenta();
                //$lista= DetalleVenta::model()->getListLote($id_producto);
                $_precio_regular= Producto::model()->findByPk($id_producto)->precio_venta;
                echo CHtml::encode("Precio regular: ".$_precio_regular );
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
                throw new CHttpException(404,'The requested detalle venta does not exist.');
                }
            }
            
            return $this->_venta;
        }
        
        /**
         * finaliza la venta y cambia el estado a confirmado ( estado=1)
         * @param type $id = id de la venta
         */
        public function actionFinalizar($id)
        {
            $venta = Venta::model()->findByPk($id);
            $venta->estado=1; // cambia estado de venta a confirmado(1)
            $venta->save();
            $this->redirect(array('venta/view','id'=>$id));
        }
}
