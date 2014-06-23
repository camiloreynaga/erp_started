<?php
$this->breadcrumbs=array(
	'Detalle Orden Compras',
);

$this->menu=array(
array('label'=>'Create DetalleOrdenCompra','url'=>array('create')),
array('label'=>'Manage DetalleOrdenCompra','url'=>array('admin')),
);
?>

<h1>Detalle Orden Compras</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
