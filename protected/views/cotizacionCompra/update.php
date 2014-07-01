<?php
$this->breadcrumbs=array(
	'Cotizacion Compras'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List CotizacionCompra','url'=>array('index')),
	array('label'=>'Create CotizacionCompra','url'=>array('create')),
	array('label'=>'View CotizacionCompra','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage CotizacionCompra','url'=>array('admin')),
	);
	?>

	<h1>Update CotizacionCompra <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>