<?php
$this->breadcrumbs=array(
	'Detalle Pedidos',
);

$this->menu=array(
array('label'=>'Create DetallePedido','url'=>array('create')),
array('label'=>'Manage DetallePedido','url'=>array('admin')),
);
?>

<h1>Detalle Pedidos</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
