<?php
$this->breadcrumbs=array(
	'Compras'=>array('index'),
	$model->id,
);

$this->menu=array(
//array('label'=>'List Compra','url'=>array('index')),
array('label'=>'Create Compra','url'=>array('create')),
array('label'=>'Update Compra','url'=>array('update','id'=>$model->id)),
//array('label'=>'Delete Compra','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Compra','url'=>array('admin')),
);
?>

<h1>View Compra #<?php echo $model->id; ?></h1>

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
		'estado',
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