<?php
$this->breadcrumbs=array(
	Yii::t('app', 'Purchase')=>array('admin'),
	$model->id,
);

$this->menu=array(
//array('label'=>'List Compra','url'=>array('index')),
array('label'=>Yii::t('app','Create').' '. Yii::t('app', 'Purchase'),'url'=>array('create')),
array('label'=>Yii::t('app','Update').' '. Yii::t('app', 'Purchase'),'url'=>array('//detalleCompra/create','pid'=>$model->id),'visible'=>$model->estado<3), //Yii::app()->createUrl("//detalleCompra/create", array("pid"=>$data->id))
//array('label'=>'Delete Compra','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>Yii::t('app','Manage').' '. Yii::t('app', 'Purchase'),'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app','View').' '. Yii::t('app', 'Purchase').' # '. $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id',
		'fecha_compra',
		 array(
                    'name'=>'proveedor_id',
                    'value'=>$model->r_proveedor->nombre_rz
                ),
		//'base_imponible',
		'orden_compra_id',
		'impuesto',
		'importe_total',
		'observacion',
		array(
                    'name'=>'estado',
                    'value'=>$model->_estado[$model->estado]
                )
                //'estado',
//		'create_time',
//		'create_user_id',
//		'update_time',
//		'update_user_id',
),
)); ?>
<?php
$this->renderPartial('//ComprobanteCompra/_viewDetalleComprobanteCompra',array('model'=>  ComprobanteCompra::model(),'pid'=>$model->id));

$this->renderPartial('//DetalleCompra/_viewDetalleCompra',array('model'=>DetalleCompra::model(),'pid'=>$model->id));


?>