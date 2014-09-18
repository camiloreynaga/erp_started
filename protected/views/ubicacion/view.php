<?php
$this->breadcrumbs=array(
	'Ubicacions'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Ubicacion','url'=>array('index')),
array('label'=>'Create Ubicacion','url'=>array('create')),
array('label'=>'Update Ubicacion','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Ubicacion','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Ubicacion','url'=>array('admin')),
);
?>

<h1>View Ubicacion #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'ubicacion',
		'activo',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
),
)); ?>
