<?php
$this->breadcrumbs=array(
	'Producto Almacens',
);

$this->menu=array(
array('label'=>'Create ProductoAlmacen','url'=>array('create')),
array('label'=>'Manage ProductoAlmacen','url'=>array('admin')),
);
?>

<h1>Producto Almacens</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
