<?php
$this->breadcrumbs=array(
	'Movimiento Almacens'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List MovimientoAlmacen','url'=>array('index')),
	array('label'=>'Create MovimientoAlmacen','url'=>array('create')),
	array('label'=>'View MovimientoAlmacen','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage MovimientoAlmacen','url'=>array('admin')),
	);
	?>

	<h1>Update MovimientoAlmacen <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>