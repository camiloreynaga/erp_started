<?php
$this->breadcrumbs=array(
	'Forma Pagos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List FormaPago','url'=>array('index')),
	array('label'=>'Create FormaPago','url'=>array('create')),
	array('label'=>'View FormaPago','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage FormaPago','url'=>array('admin')),
	);
	?>

	<h1>Update FormaPago <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>