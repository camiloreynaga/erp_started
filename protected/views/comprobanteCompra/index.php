<?php
$this->breadcrumbs=array(
	'Comprobante Compras',
);

$this->menu=array(
array('label'=>'Create ComprobanteCompra','url'=>array('create')),
array('label'=>'Manage ComprobanteCompra','url'=>array('admin')),
);
?>

<h1>Comprobante Compras</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
