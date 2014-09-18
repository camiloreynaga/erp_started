<?php
$this->breadcrumbs=array(
	'Comprobante Ventas'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List ComprobanteVenta','url'=>array('index')),
array('label'=>'Manage ComprobanteVenta','url'=>array('admin')),
);
?>

<h1>Create ComprobanteVenta</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>