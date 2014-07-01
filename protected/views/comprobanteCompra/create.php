<?php
$this->breadcrumbs=array(
	'Comprobante Compras'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List ComprobanteCompra','url'=>array('index')),
array('label'=>'Manage ComprobanteCompra','url'=>array('admin')),
);
?>

<h1>Create ComprobanteCompra</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>