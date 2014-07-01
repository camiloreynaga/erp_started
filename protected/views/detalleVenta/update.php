<?php
$this->breadcrumbs=array(
	'Detalle Ventas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List DetalleVenta','url'=>array('index')),
	array('label'=>'Create DetalleVenta','url'=>array('create')),
	array('label'=>'View DetalleVenta','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage DetalleVenta','url'=>array('admin')),
	);
	?>

	<h1>Update DetalleVenta <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>