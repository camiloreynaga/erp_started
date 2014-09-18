<?php
$this->breadcrumbs=array(
	'Detalle Nota Creditos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List DetalleNotaCredito','url'=>array('index')),
array('label'=>'Manage DetalleNotaCredito','url'=>array('admin')),
);
?>

<h1>Create DetalleNotaCredito</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>