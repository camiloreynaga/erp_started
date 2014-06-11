<?php
$this->breadcrumbs=array(
	'Unidad Medidas'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List UnidadMedida','url'=>array('index')),
array('label'=>'Create UnidadMedida','url'=>array('create')),
array('label'=>'Update UnidadMedida','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete UnidadMedida','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage UnidadMedida','url'=>array('admin')),
);
?>

<h1>View UnidadMedida #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'unidad_medida',
		'nonmenclatura',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
),
)); ?>
