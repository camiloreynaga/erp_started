<?php
/* @var $this ProductoDetalleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Producto Detalles',
);

$this->menu=array(
	array('label'=>'Create ProductoDetalle', 'url'=>array('create')),
	array('label'=>'Manage ProductoDetalle', 'url'=>array('admin')),
);
?>

<h1>Producto Detalles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
