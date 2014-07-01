<?php
$this->breadcrumbs=array(
	'Detalle Nota Creditos'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List DetalleNotaCredito','url'=>array('index')),
array('label'=>'Create DetalleNotaCredito','url'=>array('create')),
array('label'=>'Update DetalleNotaCredito','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete DetalleNotaCredito','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage DetalleNotaCredito','url'=>array('admin')),
);
?>

<h1>View DetalleNotaCredito #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'nota_credito_id',
		'producto_id',
		'cantidad',
		'precio_unitario',
		'subtotal',
		'impuesto',
		'total',
),
)); ?>
