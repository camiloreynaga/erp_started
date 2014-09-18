<?php
$this->breadcrumbs=array(
	'Producto Almacens'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List ProductoAlmacen','url'=>array('index')),
array('label'=>'Create ProductoAlmacen','url'=>array('create')),
array('label'=>'Update ProductoAlmacen','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete ProductoAlmacen','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage ProductoAlmacen','url'=>array('admin')),
);
?>

<h1>View ProductoAlmacen #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'almacen_id',
		'producto_id',
		'lote',
		'fecha_vencimiento',
		'cantidad_disponible',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
),
)); ?>
