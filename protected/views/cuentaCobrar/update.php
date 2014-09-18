<?php
$this->breadcrumbs=array(
	'Cuenta Cobrars'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List CuentaCobrar','url'=>array('index')),
	array('label'=>'Create CuentaCobrar','url'=>array('create')),
	array('label'=>'View CuentaCobrar','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage CuentaCobrar','url'=>array('admin')),
	);
	?>

	<h1>Update CuentaCobrar <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>