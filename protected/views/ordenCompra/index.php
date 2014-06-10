<?php
$this->breadcrumbs=array(
	'Orden Compras',
);

$this->menu=array(
array('label'=>'Create OrdenCompra','url'=>array('create')),
array('label'=>'Manage OrdenCompra','url'=>array('admin')),
);
?>

<h1>Orden Compras</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
