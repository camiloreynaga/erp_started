<?php
$this->breadcrumbs=array(
	'Detalle Nota Creditos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List DetalleNotaCredito','url'=>array('index')),
	array('label'=>'Create DetalleNotaCredito','url'=>array('create')),
	array('label'=>'View DetalleNotaCredito','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage DetalleNotaCredito','url'=>array('admin')),
	);
	?>

	<h1>Update DetalleNotaCredito <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>