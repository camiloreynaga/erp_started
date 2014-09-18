<?php
$this->breadcrumbs=array(
	'Detalle Ventas'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List DetalleVenta','url'=>array('index')),
array('label'=>'Manage DetalleVenta','url'=>array('admin')),
);
?>

<h1>Create DetalleVenta</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>