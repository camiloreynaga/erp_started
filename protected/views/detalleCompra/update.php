<?php
$this->breadcrumbs=array(
	'Detalle Compras'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List DetalleCompra','url'=>array('index')),
	array('label'=>'Create DetalleCompra','url'=>array('create')),
	array('label'=>'View DetalleCompra','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage DetalleCompra','url'=>array('admin')),
	);
	?>

	<h1>Update DetalleCompra <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>