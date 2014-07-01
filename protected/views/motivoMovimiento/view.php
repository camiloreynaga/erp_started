<?php
$this->breadcrumbs=array(
	'Motivo Movimientos'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List MotivoMovimiento','url'=>array('index')),
array('label'=>'Create MotivoMovimiento','url'=>array('create')),
array('label'=>'Update MotivoMovimiento','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete MotivoMovimiento','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage MotivoMovimiento','url'=>array('admin')),
);
?>

<h1>View MotivoMovimiento #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'movimiento',
		'tipo_movimiento',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
),
)); ?>
