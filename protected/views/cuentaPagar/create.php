<?php
$this->breadcrumbs=array(
	'Cuenta Pagars'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List CuentaPagar','url'=>array('index')),
array('label'=>'Manage CuentaPagar','url'=>array('admin')),
);
?>

<h1>Create CuentaPagar</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>