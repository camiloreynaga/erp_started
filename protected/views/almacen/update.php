<?php
$this->breadcrumbs=array(
	'Almacens'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Almacen','url'=>array('index')),
	array('label'=>'Create Almacen','url'=>array('create')),
	array('label'=>'View Almacen','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Almacen','url'=>array('admin')),
	);
	?>

	<h1>Update Almacen <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>