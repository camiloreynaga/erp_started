<?php
$this->breadcrumbs=array(
	'Cuenta Pagars'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List CuentaPagar','url'=>array('index')),
	array('label'=>'Create CuentaPagar','url'=>array('create')),
	array('label'=>'View CuentaPagar','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage CuentaPagar','url'=>array('admin')),
	);
	?>

	<h1>Update CuentaPagar <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>