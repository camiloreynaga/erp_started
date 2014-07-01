<?php
$this->breadcrumbs=array(
	'Detalle Cotizacion Compras'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List DetalleCotizacionCompra','url'=>array('index')),
	array('label'=>'Create DetalleCotizacionCompra','url'=>array('create')),
	array('label'=>'View DetalleCotizacionCompra','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage DetalleCotizacionCompra','url'=>array('admin')),
	);
	?>

	<h1>Update DetalleCotizacionCompra <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>