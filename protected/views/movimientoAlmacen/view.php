<?php
$this->breadcrumbs=array(
	'Movimiento Almacens'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List MovimientoAlmacen','url'=>array('index')),
array('label'=>'Create MovimientoAlmacen','url'=>array('create')),
array('label'=>'Update MovimientoAlmacen','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete MovimientoAlmacen','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage MovimientoAlmacen','url'=>array('admin')),
);
?>

<h1>View MovimientoAlmacen #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'fecha_movimiento',
		'producto_id',
		'cantidad',
		'motivo_movimiento_id',
		'detalle_compra_id',
		'detalle_venta_id',
		'observacion',
		'almacen_id',
		'saldo_stock',
		'operacion',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
),
)); ?>
