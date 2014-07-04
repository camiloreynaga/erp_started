<?php
$this->breadcrumbs=array(
	'Ubicacions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Ubicacion','url'=>array('index')),
	array('label'=>'Create Ubicacion','url'=>array('create')),
	array('label'=>'View Ubicacion','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Ubicacion','url'=>array('admin')),
	);
	?>

	<h1>Update Ubicacion <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>