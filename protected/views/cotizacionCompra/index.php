<?php
$this->breadcrumbs=array(
	'Cotizacion Compras',
);

$this->menu=array(
array('label'=>'Create CotizacionCompra','url'=>array('create')),
array('label'=>'Manage CotizacionCompra','url'=>array('admin')),
);
?>

<h1>Cotizacion Compras</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
