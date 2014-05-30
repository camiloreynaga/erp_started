<?php
/* @var $this TipoProductoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Productos',
);

$this->menu=array(
	array('label'=>'Create TipoProducto', 'url'=>array('create')),
	array('label'=>'Manage TipoProducto', 'url'=>array('admin')),
);
?>

<h1>Tipo Productos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
