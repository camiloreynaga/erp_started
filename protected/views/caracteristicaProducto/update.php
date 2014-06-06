<?php
/* @var $this CaracteristicaProductoController */
/* @var $model CaracteristicaProducto */

$this->breadcrumbs=array(
	'Caracteristica Productos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CaracteristicaProducto', 'url'=>array('index')),
	array('label'=>'Create CaracteristicaProducto', 'url'=>array('create')),
	array('label'=>'View CaracteristicaProducto', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CaracteristicaProducto', 'url'=>array('admin')),
);
?>

<h1>Update CaracteristicaProducto <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>