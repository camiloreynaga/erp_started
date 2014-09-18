<?php
$this->breadcrumbs=array(
	'Guia Remisions'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List GuiaRemision','url'=>array('index')),
array('label'=>'Create GuiaRemision','url'=>array('create')),
array('label'=>'Update GuiaRemision','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete GuiaRemision','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage GuiaRemision','url'=>array('admin')),
);
?>

<h1>View GuiaRemision #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'remitente',
		'serie',
		'numero',
		'cliente_proveedor_id',
		'motivo_traslado',
		'fecha_inicio_traslado',
		'transportista_id',
		'punto_partida',
		'punto_llegada',
		'marca_placa',
		'licencia_conducir',
		'estado_gr',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
),
)); ?>
