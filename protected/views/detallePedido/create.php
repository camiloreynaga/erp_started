<?php
$this->breadcrumbs=array(
	'Detalle Pedidos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List DetallePedido','url'=>array('index')),
array('label'=>'Manage DetallePedido','url'=>array('admin')),
);
?>

<h1>Create DetallePedido</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>