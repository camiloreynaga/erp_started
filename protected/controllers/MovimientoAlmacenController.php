<?php

        class MovimientoAlmacenController extends Controller
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
            'actions'=>array(
                'create',
                'update',
                'admin',
                'detalleCompra',
                'lotesIngreso',
                'operacion',
                'IngresarCompra',
                'RegistrarCompra',
                'SacarVenta',
                'RegistrarVenta',
                'ingreso',
                'salida'
                ),
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
         * registra el ingreso a almacen de una fila del detalle de compra
         */
        public function actionRegistrarCompra($id)
        {
            $model=new MovimientoAlmacen();
            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);
            $_detalle = DetalleCompra::model()->findByPk($id); // del detalle de compra    
            
            $model->fecha_movimiento=date('Y-m-d');
            $model->producto_id= $_detalle->producto_id; //* requerido
            $model->cantidad= $_detalle->cantidad_bueno; //*requerido - ingresa la cantidad items en estado bueno
            $model->motivo_movimiento_id=1; //*requerido
            $model->detalle_compra_id=$id;
            $model->observacion= $_detalle->observacion;
            $model->almacen_id =1; // almacen principal
            $model->_lote=$_detalle->lote;
            $model->_fecha_vencimiento=$_detalle->fecha_vencimiento;
            $model->operacion=0; // 0= ingreso 
            //estado almacenado
             //$model->setScenario('create');
            if($model->save())                 
                {
                    $this->ActualizaStock($model); //actualiza el stock 
                    $_detalle->estado=4; // actualizar el estado del item a almacenado
                    $_detalle->save();
                    echo "Registro agregado";
                }
                //$this->redirect(array('view','id'=>$model->id));
//            }
//            else {
//                $this->render('_compraForm',array(
//                //'model'=>$model,
//                ));
//            }
            if(!isset($_GET['ajax']))
                $this->redirect(Yii::app()->request->urlReferrer);
            
        }
        
        /*
         * 
         */
        public function actionRegistrarVenta($id)
        {
            $model=new MovimientoAlmacen();
            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);
            $_detalle = DetalleVenta::model()->findByPk($id); // del detalle de compra    
            
            $model->fecha_movimiento=date('Y-m-d');
            $model->producto_id= $_detalle->producto_id; //* requerido
            $model->cantidad= $_detalle->cantidad; //*requerido - ingresa la cantidad items en estado bueno
            $model->motivo_movimiento_id=2; //*requerido
            $model->detalle_venta_id=$id;
            $model->almacen_id =1; // almacen principal
            $model->_lote=$_detalle->lote;
            $model->_fecha_vencimiento=$_detalle->fecha_vencimiento;
            $model->operacion=1; // 1= salida 
            //estado almacenado
             //$model->setScenario('create');
            if($model->save())                 
                {
                    $this->DecreaseStock($model); //actualiza el stock 
                    $_detalle->estado=1; // actualizar el estado del item a despachado
                    $_detalle->save();
                    echo "Registro agregado";
                }
                //$this->redirect(array('view','id'=>$model->id));
//            }
//            else {
//                $this->render('_compraForm',array(
//                //'model'=>$model,
//                ));
//            }
            if(!isset($_GET['ajax']))
                $this->redirect(Yii::app()->request->urlReferrer);
            
        }
        
        /**
         * renderiza la interfaz para ingresa compras
         */
        public function actionIngresarCompra()
        {
            $this->layout='//layouts/column1';
                $this->render('_compraForm',array(
                ));
            
        }
        /**
         * renderiza la interfaz para ingresa ventas
         */
        public function actionSacarVenta()
        {
            $this->layout='//layouts/column1';
            $this->render('_ventaForm',array(
                ));
        }
        
        public function actionIngreso()
        {
            $model=new MovimientoAlmacen;

            // Uncomment the following line if AJAX validation is needed
            //$this->performAjaxValidation($model);
            if(isset($_POST['MovimientoAlmacen']))
            {
            $model->attributes=$_POST['MovimientoAlmacen'];
            $model->almacen_id =1; // almacen principal
            $model->fecha_movimiento=date('Y-m-d');
            if($model->save())                 
                {
                   // $model->_lote;
                    $this->ActualizaStock($model);
                    $this->redirect(array('view','id'=>$model->id));
                }
                
            }
            //$this->layout='//layouts/column1';
            $this->render('_ingresoForm',array(
                'model'=>$model,
                ));
        }
        
         public function actionSalida()
        {
             $model=new MovimientoAlmacen;

            // Uncomment the following line if AJAX validation is needed
            //$this->performAjaxValidation($model);
            if(isset($_POST['MovimientoAlmacen']))
            {
            $model->attributes=$_POST['MovimientoAlmacen'];
            $model->almacen_id =1; // almacen principal
            $model->_fecha_vencimiento=ProductoAlmacen::model()->getFecha_vencimiento($model->producto_id,$model->_lote);
            $model->fecha_movimiento=date('Y-m-d');
            if($model->save())                 
                {
                   // $model->_lote;
                    $this->ActualizaStock($model);
                    $this->redirect(array('view','id'=>$model->id));
                }
                
            }
            //$this->layout='//layouts/column1';
            $this->render('_salidaForm',array(
                'model'=>$model,
                ));
            
            
        }
        
        /**
        * Creates a new model.
        * If creation is successful, the browser will be redirected to the 'view' page.
        */
        public function actionCreate()
        {
            $model=new MovimientoAlmacen;

            // Uncomment the following line if AJAX validation is needed
            //$this->performAjaxValidation($model);
            if(isset($_POST['MovimientoAlmacen']))
            {
            $model->attributes=$_POST['MovimientoAlmacen'];
            $model->almacen_id =1; // almacen principal
            $model->fecha_movimiento=date('Y-m-d');
            if($model->save())                 
                {
                   // $model->_lote;
                    $this->ActualizaStock($model);
                    $this->redirect(array('view','id'=>$model->id));
                }
                
            }
            //else {
                $this->render('create',array(
                'model'=>$model,
                ));
            //}
        }
        
        
        
        /**
         * carga los motivos de movimiento a partir de la operación elegida (ingreso=0 /salida=1)
         */
        public function actionOperacion()
        {
            $_operacion=$_POST['MovimientoAlmacen']['operacion'];
            $lista= MotivoMovimiento::model()->getMovimientos($_operacion);
                $lista=CHtml::listData($lista, 'id', 'movimiento');
                foreach($lista as $valor => $descripcion)
                {
                    echo CHtml::tag('option',array('value'=>$valor),  CHtml::encode($descripcion),TRUE);
                }
        }
        
        /**
         * devuelve los lotes para el ingreso de productos a Almacen
         */
        public function actionLotesIngreso()
        {
            $id_producto= $_POST['MovimientoAlmacen']['producto_id'];
            $id_almacen= $_POST['MovimientoAlmacen']['almacen_id'];    
                $lista= MovimientoAlmacen::model()->getLoteIngreso($id_almacen,$id_producto);
                $lista=CHtml::listData($lista, 'lote', 'lote');
                foreach($lista as $valor => $descripcion)
                {
                    echo CHtml::tag('option',array('value'=>$valor),  CHtml::encode($descripcion),TRUE);
                }
        }
        
        /*
         * Actualiza cantidad_disponible/cantidad_real que se encuentra en tbl_producot_almacen
         * @$model MovimientoAlmacen
         */
//        protected function ActualizaStock($model)
//        {
//            // determinando si suma o resta cantidad
//            $cantidad= $model->operacion==0? $model->cantidad : $model->cantidad*(-1); 
//            //buscando registro en almacen por almacen, producto y lote
//            $_producto_almacen= ProductoAlmacen::model()->findByAttributes(array(
//                                'almacen_id'=>$model->almacen_id,//$almacen,
//                                'producto_id'=>$model->producto_id,//$producto,
//                                'lote'=>$model->_lote,//$lote
//                                    ));
//            $_producto_almacen->cantidad_disponible+=$cantidad; //modificando la cantidad disponible
//            $_producto_almacen->cantidad_real+=$cantidad; // modificando la cantidad real
//            $_producto_almacen->save();
//        }
        
        /**
         * Actualiza/registra cantidad_disponible/cantidad_real que se encuentra en tbl_producto_almacen
         * cuando se registra una compra como movimiento de almacen 
         * 
         * @param type $model = modelo movimientoAlmacen
         */
        protected function ActualizaStock($model)
        {
            // determinando si suma o resta cantidad
            $cantidad= $model->operacion==0 ? $model->cantidad : $model->cantidad*(-1); 
            //buscando registro en almacen por almacen, producto y lote
            $_producto_almacen= ProductoAlmacen::model()->findByAttributes(array(
                                'almacen_id'=>$model->almacen_id,//$almacen,
                                'producto_id'=>$model->producto_id,//$producto,
                                'lote'=>$model->_lote,//$lote
                                    ));
            if(is_null($_producto_almacen)) // si no no encuentra ningun registro crea el producto en la tbl_productoAlmacen
            {
                $_producto_almacen = new ProductoAlmacen();
                $_producto_almacen->almacen_id=$model->almacen_id;
                $_producto_almacen->producto_id=$model->producto_id;
                $_producto_almacen->lote=$model->_lote;
                $_producto_almacen->fecha_vencimiento=$model->_fecha_vencimiento;
                $_producto_almacen->cantidad_disponible+=$cantidad; //modificando la cantidad disponible
                $_producto_almacen->cantidad_real+=$cantidad; // modificando la cantidad real
            }
            else
            {
                $_producto_almacen->cantidad_disponible+=$cantidad; //modificando la cantidad disponible
                $_producto_almacen->cantidad_real+=$cantidad; // modificando la cantidad real
            }    
            if($_producto_almacen->save()) //guardando datos tbl_producto_almacen
            {
                $model->saldo_stock=$_producto_almacen->cantidad_real;//$cantidad; //registra el saldo stock para el movimiento de almacen
                $model->save();
                $_producto= Producto::model()->findByPk($model->producto_id); //obteniendo producto desde id
                $_producto->stock+=$cantidad; // actualizando stock en producto
                $_producto->save();
            }
        }
        /**
         * Incrementa el stock
         * actualiza producto Almacen, Producto
         */
        protected function IncreaseStock($model){
            // determinando si suma o resta cantidad
            $cantidad= $model->operacion==0 ? $model->cantidad : $model->cantidad*(-1); 
            //buscando registro en almacen por almacen, producto y lote
            $_producto_almacen= ProductoAlmacen::model()->findByAttributes(array(
                                'almacen_id'=>$model->almacen_id,//$almacen,
                                'producto_id'=>$model->producto_id,//$producto,
                                'lote'=>$model->_lote,//$lote
                                    ));
            if(is_null($_producto_almacen))
            {
                $_producto_almacen = new ProductoAlmacen();
                $_producto_almacen->almacen_id=$model->almacen_id;
                $_producto_almacen->producto_id=$model->producto_id;
                $_producto_almacen->lote=$model->_lote;
                $_producto_almacen->fecha_vencimiento=$model->_fecha_vencimiento;
                $_producto_almacen->cantidad_disponible+=$cantidad; //modificando la cantidad disponible
                $_producto_almacen->cantidad_real+=$cantidad; // modificando la cantidad real
            }
            else
            {
                $_producto_almacen->cantidad_disponible+=$cantidad; //modificando la cantidad disponible
                $_producto_almacen->cantidad_real+=$cantidad; // modificando la cantidad real
            }    
            if($_producto_almacen->save()) //guardando datos tbl_producto_almacen
            {
                $model->saldo_stock=$_producto_almacen->cantidad_real;//$cantidad; //registra el saldo stock para el movimiento de almacen
                $model->save();
                $_producto= Producto::model()->findByPk($model->producto_id); //obteniendo producto desde id
                $_producto->stock+=$cantidad; // actualizando stock en producto
                $_producto->save();
            }
        }
        
        /**
         * Decrementa el stock 
         * actualiza producto Almacen, producto, 
         */
        protected function DecreaseStock($model)
        {
            $cantidad= $model->cantidad*(-1); 
            $_producto_almacen= ProductoAlmacen::model()->findByAttributes(array(
                                'almacen_id'=>$model->almacen_id,//$almacen,
                                'producto_id'=>$model->producto_id,//$producto,
                                'lote'=>$model->_lote,//$lote
                                    ));
            
            $_producto_almacen->cantidad_real+=$cantidad;
            if($_producto_almacen->save())
            {
                $model->saldo_stock= $_producto_almacen->cantidad_real;
                $model->save();
                 $_producto= Producto::model()->findByPk($model->producto_id); //obteniendo producto desde id
                $_producto->stock+=$cantidad; // actualizando stock en producto
                $_producto->save();
            }
                
        }

        /**
         * 
         */
        public function actionDetalleCompra()
        {
            //$id_producto= $_POST['DetalleVenta']['producto_id'];
            
            $model=new DetalleCompra('search');
            $this->renderPartial('_viewDetalleCompraAlm',array(
                     'model'=>$model,));
            //$this->renderpa()
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

            if(isset($_POST['MovimientoAlmacen']))
            {
            $model->attributes=$_POST['MovimientoAlmacen'];
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
            $dataProvider=new CActiveDataProvider('MovimientoAlmacen');
            $this->render('index',array(
            'dataProvider'=>$dataProvider,
            ));
        }

        /**
        * Manages all models.
        */
        public function actionAdmin()
        {
            $model=new MovimientoAlmacen('search');
            $model->unsetAttributes();  // clear any default values
            if(isset($_GET['MovimientoAlmacen']))
            $model->attributes=$_GET['MovimientoAlmacen'];

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
            $model=MovimientoAlmacen::model()->findByPk($id);
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
            if(isset($_POST['ajax']) && $_POST['ajax']==='movimiento-almacen-form')
            {
            echo CActiveForm::validate($model);
            Yii::app()->end();
            }
            }
        }
?>