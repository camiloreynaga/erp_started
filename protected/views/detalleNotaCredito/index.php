<?php
$this->breadcrumbs=array(
	'Detalle Nota Creditos',
);

$this->menu=array(
array('label'=>'Create DetalleNotaCredito','url'=>array('create')),
array('label'=>'Manage DetalleNotaCredito','url'=>array('admin')),
);
?>

<h1>Detalle Nota Creditos</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
