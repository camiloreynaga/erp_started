<?php
$this->breadcrumbs=array(
	'Caracteristica Productos'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List CaracteristicaProducto','url'=>array('index')),
array('label'=>'Create CaracteristicaProducto','url'=>array('create')),
array('label'=>'Update CaracteristicaProducto','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete CaracteristicaProducto','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage CaracteristicaProducto','url'=>array('admin')),
);
?>

<h1>View CaracteristicaProducto #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'producto_id',
		'caracteristica_id',
		'valor',
),
)); ?>
