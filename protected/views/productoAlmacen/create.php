<?php
$this->breadcrumbs=array(
	'Producto Almacens'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List ProductoAlmacen','url'=>array('index')),
array('label'=>'Manage ProductoAlmacen','url'=>array('admin')),
);
?>

<h1>Create ProductoAlmacen</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>