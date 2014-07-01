<?php
$this->breadcrumbs=array(
	'Detalle Orden Compras'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List DetalleOrdenCompra','url'=>array('index')),
array('label'=>'Create DetalleOrdenCompra','url'=>array('create')),
array('label'=>'Update DetalleOrdenCompra','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete DetalleOrdenCompra','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage DetalleOrdenCompra','url'=>array('admin')),
);
?>

<h1>View DetalleOrdenCompra #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'orden_compra_id',
		'cotizacion_id',
		'producto_id',
		'cantidad',
		'observacion',
		'precio_unitario',
		'subtotal',
		'impuesto',
		'total',
),
)); ?>

