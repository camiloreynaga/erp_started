<?php
/* @var $this CaracteristicaProductoController */
/* @var $model CaracteristicaProducto */

$this->breadcrumbs=array(
	'Caracteristica Productos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CaracteristicaProducto', 'url'=>array('index')),
	array('label'=>'Manage CaracteristicaProducto', 'url'=>array('admin')),
);
?>

<h1>Create CaracteristicaProducto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>