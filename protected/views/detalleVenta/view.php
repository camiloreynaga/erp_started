<?php
$this->breadcrumbs=array(
	'Detalle Ventas'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List DetalleVenta','url'=>array('index')),
array('label'=>'Create DetalleVenta','url'=>array('create')),
array('label'=>'Update DetalleVenta','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete DetalleVenta','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage DetalleVenta','url'=>array('admin')),
);
?>

<h1>View DetalleVenta #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'venta_id',
		'producto_id',
		'cantidad',
		'precio_unitario',
		'subtotal',
		'impuesto',
		'total',
		'lote',
		'fecha_vencimiento',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
),
)); ?>
