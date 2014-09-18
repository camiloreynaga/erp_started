<?php
$this->breadcrumbs=array(
	'Detalle Orden Compras'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List DetalleOrdenCompra','url'=>array('index')),
	array('label'=>'Create DetalleOrdenCompra','url'=>array('create')),
	array('label'=>'View DetalleOrdenCompra','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage DetalleOrdenCompra','url'=>array('admin')),
	);
	?>

	<h1>Update DetalleOrdenCompra <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>