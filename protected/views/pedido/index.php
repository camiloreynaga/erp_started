<?php
$this->breadcrumbs=array(
	'Pedidos',
);

$this->menu=array(
array('label'=>'Create Pedido','url'=>array('create')),
array('label'=>'Manage Pedido','url'=>array('admin')),
);
?>

<h1>Pedidos</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
