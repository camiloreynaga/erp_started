<?php
$this->breadcrumbs=array(
	'Detalle Cotizacion Compras'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List DetalleCotizacionCompra','url'=>array('index')),
array('label'=>'Manage DetalleCotizacionCompra','url'=>array('admin')),
);
?>

<h1>Create DetalleCotizacionCompra</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>