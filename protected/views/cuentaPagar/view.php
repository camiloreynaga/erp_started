<?php
$this->breadcrumbs=array(
	'Cuenta Pagars'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List CuentaPagar','url'=>array('index')),
array('label'=>'Create CuentaPagar','url'=>array('create')),
array('label'=>'Update CuentaPagar','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete CuentaPagar','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage CuentaPagar','url'=>array('admin')),
);
?>

<h1>View CuentaPagar #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'compra_id',
		'monto',
		'estado',
		'fecha_pago',
		'fecha_vencimiento',
		'interes',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
),
)); ?>
