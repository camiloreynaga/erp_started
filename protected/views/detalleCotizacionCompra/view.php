<?php
$this->breadcrumbs=array(
	'Detalle Cotizacion Compras'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List DetalleCotizacionCompra','url'=>array('index')),
array('label'=>'Create DetalleCotizacionCompra','url'=>array('create')),
array('label'=>'Update DetalleCotizacionCompra','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete DetalleCotizacionCompra','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage DetalleCotizacionCompra','url'=>array('admin')),
);
?>

<h1>View DetalleCotizacionCompra #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'cotizacion_id',
		'producto_id',
		'cantidad',
		'precio_unitario',
		'subtotal',
		'impuesto',
		'total',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
),
)); ?>
