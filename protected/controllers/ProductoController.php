<?php

class ProductoController extends Controller
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
                'actions'=>array('create','update','search','filtroProducto','filtroProductoStock','EditItem','admin'),
                'users'=>array('@'),
                ),
                array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('admin','delete'),
                'roles'=>array('root'),
                //'users'=>array('admin'),
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
            $model=new Producto;

            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            if(isset($_POST['Producto']))
            {
                $model->attributes=$_POST['Producto'];
                if($model->save())
                $this->redirect(array('view','id'=>$model->id));
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

            if(isset($_POST['Producto']))
            {
                $model->attributes=$_POST['Producto'];
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
         $es = new TbEditableSaver('Producto');
         
         //actualiza el estado del item de detalle de compra
//         $es->onAfterUpdate= function($event) {
//
//             $model=$this->loadModel(yii::app()->request->getParam('pk')); //obteniendo el Model de detalleCompra
//             $model->actualizarEstado();    
//            };  
            
            $es->update();
        
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
            $dataProvider=new CActiveDataProvider('Producto');
            $this->render('index',array(
            'dataProvider'=>$dataProvider,
            ));
        }

        /**
        * Manages all models.
        */
        public function actionAdmin()
        {
            $model=new Producto('search');
            $model->unsetAttributes();  // clear any default values
            if(isset($_GET['Producto']))
            $model->attributes=$_GET['Producto'];

            $this->render('admin',array(
            'model'=>$model,
            ));
        }

        /*
         * función para hacer una busqueda asincronica de productos
         */
        public function actionSearch()
	{
		$model= Producto::model();
		//$model->unsetAttributes();  // clear any default values
                
                if(isset($_GET['id']))
                    $model->descontinuado=0;
		if(isset($_GET['Producto']))
			$model->attributes=$_GET['Producto'];
                print_r($_GET['Producto']);
                $this->renderPartial('_gridSearch',array(
                        'producto'=>$model,
                ));
	}
        
        /*
         * 
         */
         public function actionFiltroProductoStock()
        {
           $lista =  Producto::model()->findAll('descontinuado=0 AND stock>0 AND nombre like :nombre',array(':nombre'=>"%".$_GET['q']."%")); 
          // $lista = Producto::model()->getProductosStock();
           $resultados = array();
           foreach ($lista as $list){
            $resultados[] = array(
                         'id'=>$list->id,
                         'text'=>  $list->nombre .' - '.$list->r_presentacion->presentacion. ' (STOCK:'.$list->stock.')',
                         
            ); 
            }
        echo CJSON::encode($resultados);   
       }
        
        /*
         * retorna los productos vigentes por JSON, la busqueda 
         * es por producto solamente.
         */
         public function actionFiltroProducto()
        {
           $lista =  Producto::model()->findAll('descontinuado=0 AND nombre like :nombre',array(':nombre'=>"%".$_GET['q']."%")); 
           $lista = Producto::model()->getProductosStock();
           $resultados = array();
           foreach ($lista as $list){
            $resultados[] = array(
                         'id'=>$list->id,
                         'text'=>  $list->nombre .' - '.$list->r_presentacion->presentacion. ' (STOCK:'.$list->stock.')',
            ); 
            }
        echo CJSON::encode($resultados);   
       }
       
       /*
        * Retorna los productos vigentes, nombre, presentación y stock
        */
       public function actionFiltro2Producto()
        {
           $lista =  Producto::model()->findAll('descontinuado=0'); 
           $resultados = array();
           foreach ($lista as $list){
            $resultados[] = array(
                         'id'=>$list->id,
                         'text'=>  $list->nombre .' - '.$list->r_presentacion->presentacion. ' (STOCK:'.$list->stock.')',
            ); 
            }
            return $resultados;
        //echo CJSON::encode($resultados);   

       }

        /**
        * Returns the data model based on the primary key given in the GET variable.
        * If the data model is not found, an HTTP exception will be raised.
        * @param integer the ID of the model to be loaded
        */
        public function loadModel($id)
        {
            $model=Producto::model()->findByPk($id);
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
            if(isset($_POST['ajax']) && $_POST['ajax']==='producto-form')
            {
            echo CActiveForm::validate($model);
            Yii::app()->end();
            }
        }
}
