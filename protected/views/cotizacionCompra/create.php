<?php
$this->breadcrumbs=array(
	'Cotizacion Compras'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List CotizacionCompra','url'=>array('index')),
array('label'=>'Manage CotizacionCompra','url'=>array('admin')),
);
?>

<h1>Create CotizacionCompra</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>