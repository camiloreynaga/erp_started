<?php
$this->breadcrumbs=array(
	'Detalle Ventas',
);

$this->menu=array(
array('label'=>'Create DetalleVenta','url'=>array('create')),
array('label'=>'Manage DetalleVenta','url'=>array('admin')),
);
?>

<h1>Detalle Ventas</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
