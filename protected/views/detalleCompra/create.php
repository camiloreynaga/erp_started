<?php
$this->breadcrumbs=array(
	'Detalle Compras'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List DetalleCompra','url'=>array('index')),
array('label'=>'Manage DetalleCompra','url'=>array('admin')),
);
?>

<h1>Create DetalleCompra</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>