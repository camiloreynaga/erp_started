<?php
$this->breadcrumbs=array(
	'Nota Creditos'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List NotaCredito','url'=>array('index')),
array('label'=>'Create NotaCredito','url'=>array('create')),
array('label'=>'Update NotaCredito','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete NotaCredito','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage NotaCredito','url'=>array('admin')),
);
?>

<h1>View NotaCredito #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'comprobante_venta_id',
		'fecha_emision',
		'serie',
		'numero',
		'estado',
		'motivo_emision',
		'base_imponible',
		'impuesto',
		'importe_total',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
),
)); ?>
