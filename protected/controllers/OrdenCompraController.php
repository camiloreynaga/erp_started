<?php

class OrdenCompraController extends Controller
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
            'users'=>array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
            'actions'=>array('create','update','addItem','agregarDetalle','aprobar','delete','deleteItem'),
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
        $model=new OrdenCompra;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $model->fecha_orden=date('Y-m-d');
        
        if(isset($_POST['OrdenCompra']))
        {
            $model->attributes=$_POST['OrdenCompra'];
            $model->estado='0'; // 0 = pendiente ; 1= confirmado; 2=anulado;3=procesado; 4=recepcionado;
                    
            if($model->save())
            //$this->redirect(array('view','id'=>$model->id));
                $this->redirect(array('AgregarDetalle','id'=>$model->id));
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

        if(isset($_POST['OrdenCompra']))
        {
        $model->attributes=$_POST['OrdenCompra'];
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
            $model=$this->loadModel($id); //CR
            $model->deleteDetaills(); //CR
            $model->delete(); //CR
            // we only allow deletion via POST request
            //$this->loadModel($id)->delete(); //codigo original

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
        $dataProvider=new CActiveDataProvider('OrdenCompra');
        $this->render('index',array(
        'dataProvider'=>$dataProvider,
        ));
    }

    /**
    * Manages all models.
    */
    public function actionAdmin()
    {
        $model=new OrdenCompra('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['OrdenCompra']))
        $model->attributes=$_GET['OrdenCompra'];

        $this->render('admin',array(
        'model'=>$model,
        ));
    }
    
    public function actionAgregarDetalle($id)
	{
		$orden_compra=  OrdenCompra::model()->findByPk($id);
		$this->render('_detalleOC',array(
			'orden_compra'=>$orden_compra
			));
	}
    /**
    * Returns the data model based on the primary key given in the GET variable.
    * If the data model is not found, an HTTP exception will be raised.
    * @param integer the ID of the model to be loaded
    */
    public function loadModel($id)
    {
        $model=OrdenCompra::model()->findByPk($id);
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
        if(isset($_POST['ajax']) && $_POST['ajax']==='orden-compra-form')
        {
        echo CActiveForm::validate($model);
        Yii::app()->end();
        }
    }
    
    public function actionAgregarItem($id)
	{
		$model=new DetalleOrdenCompra;
		if(isset($_POST['DetalleOrdenCompra']))
                {
                    $model->attributes=$_POST['DetalleOrdenCompra'];
                    if($model->save())
                    {
                        if (Yii::app()->request->isAjaxRequest)
                        {
                            echo CJSON::encode(array(
                                'status'=>'success', 
                                'div'=>"Item agregado exitosamente."
                                ));
                            exit;            
                        }
                        else
                            $this->redirect(array('view','id'=>$model->id));
                    }
                }

                if (Yii::app()->request->isAjaxRequest)
                {
                    echo CJSON::encode(array(
                        'status'=>'failure', 
                        'div'=>$this->renderPartial('_addItem', array('model'=>$model), true)));
                    exit;               
                }
                else
                    $this->render('create',array('model'=>$model,));
    
	} 

    
          public function actionAddItem($idItem,$idOrdenCompra)
        {
            $orden_compra=  OrdenCompra::model()->findByPk($idOrdenCompra);
            $compraItem=new DetalleOrdenCompra;
            $compraItem->orden_compra_id=$idOrdenCompra;
            $compraItem->producto_id=$idItem;
            //$compraItem->
            $compraItem->setScenario('create');
            
           // $tmp=Detalle_compra::model()->count('id_compra=:id_compra and producto=:producto',array(':id_compra'=>$idCompra,':producto'=>$idItem));
//            if($tmp==0)
//            {
                $producto= Producto::model()->findByPk($idItem);

                if(isset($_POST['DetalleOrdenCompra']))
                {
                    $compraItem->attributes=$_POST['DetalleOrdenCompra'];
                    $compraItem->subtotal=$compraItem->precio_unitario*$compraItem->cantidad;
                    //$compraItem->cantidad_disponible=$compraItem->cantidad;//agregando la cantidad disponible
                    $compraItem->impuesto=$compraItem->subtotal*((int)Yii::app()->params['impuesto']*0.01);
                    $compraItem->total=$compraItem->subtotal+$compraItem->impuesto;
                    if($compraItem->save())
                    {
                        if (Yii::app()->request->isAjaxRequest)
                        {
                            echo CJSON::encode(array(
                                'status'=>'success', 
                                'div'=>"Producto agregado correctamente."
                                ));
                            exit;
                        }
                        else
                            $this->redirect(array('view','id'=>$idOrdenCompra));
                    }
                }

                if (Yii::app()->request->isAjaxRequest)
                {
                    echo CJSON::encode(array(
                        'status'=>'failure', 
                        'div'=>$this->renderPartial('//detalleOrdenCompra/_form', array('model'=>$compraItem), true,true)));
                    exit;               
                }
//                else
//                    $this->render('create',array('model'=>$orden_compra,));
//            }
//            else
//            {
//                echo CJSON::encode(array(
//                    'status'=>'exist', 
//                    'div'=>"El producto ya está seleccionado."
//                    ));
//                exit;
//            }
            
        }
         public function actionDeleteItem($id)
        {
             DetalleOrdenCompra::model()->deleteByPk($id);
        }
        
        public function actionAprobarOc($id)
        {
            if (isset($is))
            {
                $model=  OrdenCompra::model()->findByPk($id);
                $model->estado=1; // 1 = aprobado
                $model->save();
            }
            $this->redirect(array('ordenCompra/view'));
        }
         public function actionconfirmarCompra($id,$updateStock=false)
        {
            $model=  OrdenCompra::model()->findByPk($id);
            $model->estado=1; // 1 = aprobado
            $model->save();
            $cuota=new Cuenta_pagar;
            if($updateStock)
                $model->updateStock();
            
            if(isset($_POST['Cuenta_pagar']))
            {
                $_cuota=new Cuenta_pagar;
                $_cuota->attributes=$_POST['Cuenta_pagar'];
                $_cuota->compra=$id;
                $_cuota->estado=0;
                if($model->TotalCuotas+$_cuota->monto<=$model->total)
                {
                    $_cuota->save();
                    $_cuota->monto=$model->total-$_cuota->monto;
                }
                else
                    $_cuota->addError('monto','El monto supera el total calculado.');
                
                    $this->render('cuotas',
                        array(
                                'compra'=>$model,
                                'model'=>$_cuota
                            )
                        );
                    exit;
            }
            
            $this->render('cuotas',
                    array(
                            'compra'=>$model,
                            'model'=>$cuota
                        )
                    );
            
        }
        
        
}
