<?php
$this->breadcrumbs=array(
	'Detalle Cotizacion Compras',
);

$this->menu=array(
array('label'=>'Create DetalleCotizacionCompra','url'=>array('create')),
array('label'=>'Manage DetalleCotizacionCompra','url'=>array('admin')),
);
?>

<h1>Detalle Cotizacion Compras</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
