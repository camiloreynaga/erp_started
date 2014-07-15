<?php
$this->breadcrumbs=array(
	'Cargos'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Cargo','url'=>array('index')),
array('label'=>'Create Cargo','url'=>array('create')),
array('label'=>'Update Cargo','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Cargo','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Cargo','url'=>array('admin')),
);
?>

<h1>View Cargo #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'cargo',
		'activo',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
),
)); ?>