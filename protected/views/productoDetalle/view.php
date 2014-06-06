<?php
/* @var $this ProductoDetalleController */
/* @var $model ProductoDetalle */

$this->breadcrumbs=array(
	'Producto Detalles'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ProductoDetalle', 'url'=>array('index')),
	array('label'=>'Create ProductoDetalle', 'url'=>array('create')),
	array('label'=>'Update ProductoDetalle', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProductoDetalle', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductoDetalle', 'url'=>array('admin')),
);
?>

<h1>View ProductoDetalle #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'producto_grupo_id',
		'producto_id',
		'cantidad',
	),
)); ?>
