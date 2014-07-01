<?php
$this->breadcrumbs=array(
	'Comprobante Ventas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List ComprobanteVenta','url'=>array('index')),
	array('label'=>'Create ComprobanteVenta','url'=>array('create')),
	array('label'=>'View ComprobanteVenta','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage ComprobanteVenta','url'=>array('admin')),
	);
	?>

	<h1>Update ComprobanteVenta <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>