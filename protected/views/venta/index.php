<?php
$this->breadcrumbs=array(
	'Ventas',
);

$this->menu=array(
array('label'=>'Create Venta','url'=>array('create')),
array('label'=>'Manage Venta','url'=>array('admin')),
);
?>

<h1>Ventas</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
