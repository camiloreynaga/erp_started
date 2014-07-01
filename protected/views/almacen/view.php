<?php
$this->breadcrumbs=array(
	'Almacens'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Almacen','url'=>array('index')),
array('label'=>'Create Almacen','url'=>array('create')),
array('label'=>'Update Almacen','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Almacen','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Almacen','url'=>array('admin')),
);
?>

<h1>View Almacen #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'almacen',
		'direccion',
		'ubicacion',
		'activo',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
),
)); ?>
