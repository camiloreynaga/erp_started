<?php
$this->breadcrumbs=array(
	'Movimiento Almacens'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List MovimientoAlmacen','url'=>array('index')),
array('label'=>'Manage MovimientoAlmacen','url'=>array('admin')),
);
?>

<h1>Create MovimientoAlmacen</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>