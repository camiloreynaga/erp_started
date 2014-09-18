<?php
$this->breadcrumbs=array(
	'Cuenta Cobrars'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List CuentaCobrar','url'=>array('index')),
array('label'=>'Manage CuentaCobrar','url'=>array('admin')),
);
?>

<h1>Create CuentaCobrar</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>