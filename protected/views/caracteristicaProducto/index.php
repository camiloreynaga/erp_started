<?php
/* @var $this CaracteristicaProductoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Caracteristica Productos',
);

$this->menu=array(
	array('label'=>'Create CaracteristicaProducto', 'url'=>array('create')),
	array('label'=>'Manage CaracteristicaProducto', 'url'=>array('admin')),
);
?>

<h1>Caracteristica Productos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
