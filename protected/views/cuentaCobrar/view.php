<?php
$this->breadcrumbs=array(
	'Cuenta Cobrars'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List CuentaCobrar','url'=>array('index')),
array('label'=>'Create CuentaCobrar','url'=>array('create')),
array('label'=>'Update CuentaCobrar','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete CuentaCobrar','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage CuentaCobrar','url'=>array('admin')),
);
?>

<h1>View CuentaCobrar #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'venta_id',
		'monto',
		'estado',
		'fecha_pago',
		'fecha_vencimiento',
		'medio_pago',
		'interes',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
),
)); ?>
