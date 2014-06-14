<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Usuario','url'=>array('index')),
array('label'=>'Create Usuario','url'=>array('create')),
array('label'=>'Update Usuario','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Usuario','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Usuario','url'=>array('admin')),
);
?>

<h1>View Usuario #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'username',
		'email',
		'password',
		'empleado_id',
		'last_login_time',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
),
)); ?>
