<?php
$this->breadcrumbs=array(
	'Detalle Guia Remisions'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List DetalleGuiaRemision','url'=>array('index')),
array('label'=>'Create DetalleGuiaRemision','url'=>array('create')),
array('label'=>'Update DetalleGuiaRemision','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete DetalleGuiaRemision','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage DetalleGuiaRemision','url'=>array('admin')),
);
?>

<h1>View DetalleGuiaRemision #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'guia_remision_id',
		'producto_id',
		'descripcion',
		'cantidad',
		'unidad_medida',
		'peso',
),
)); ?>
