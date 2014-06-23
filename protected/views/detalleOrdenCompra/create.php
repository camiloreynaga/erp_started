<?php
$this->breadcrumbs=array(
	'Detalle Orden Compras'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List DetalleOrdenCompra','url'=>array('index')),
array('label'=>'Manage DetalleOrdenCompra','url'=>array('admin')),
);
?>

<h1>Create DetalleOrdenCompra</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>