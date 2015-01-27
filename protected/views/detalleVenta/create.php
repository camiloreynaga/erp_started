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
<?php 
$this->renderPartial('_headVenta',array('model'=>$model));
?>
<h1>Create DetalleVenta</h1>

<?php echo $this->renderPartial('_form_venta2', array('model'=>$model)); ?>