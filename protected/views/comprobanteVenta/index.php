<?php
$this->breadcrumbs=array(
	'Comprobante Ventas',
);

$this->menu=array(
array('label'=>'Create ComprobanteVenta','url'=>array('create')),
array('label'=>'Manage ComprobanteVenta','url'=>array('admin')),
);
?>

<h1>Comprobante Ventas</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
