<?php
$this->breadcrumbs=array(
	'Comprobante Compras'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List ComprobanteCompra','url'=>array('index')),
	array('label'=>'Create ComprobanteCompra','url'=>array('create')),
	array('label'=>'View ComprobanteCompra','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage ComprobanteCompra','url'=>array('admin')),
	);
	?>

	<h1>Update ComprobanteCompra <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>