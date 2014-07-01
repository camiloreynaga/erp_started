<?php
$this->breadcrumbs=array(
	'Guia Remisions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List GuiaRemision','url'=>array('index')),
	array('label'=>'Create GuiaRemision','url'=>array('create')),
	array('label'=>'View GuiaRemision','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage GuiaRemision','url'=>array('admin')),
	);
	?>

	<h1>Update GuiaRemision <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>