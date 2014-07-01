<?php
$this->breadcrumbs=array(
	'Producto Almacens'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List ProductoAlmacen','url'=>array('index')),
	array('label'=>'Create ProductoAlmacen','url'=>array('create')),
	array('label'=>'View ProductoAlmacen','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage ProductoAlmacen','url'=>array('admin')),
	);
	?>

	<h1>Update ProductoAlmacen <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>