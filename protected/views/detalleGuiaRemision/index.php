<?php
$this->breadcrumbs=array(
	'Detalle Guia Remisions',
);

$this->menu=array(
array('label'=>'Create DetalleGuiaRemision','url'=>array('create')),
array('label'=>'Manage DetalleGuiaRemision','url'=>array('admin')),
);
?>

<h1>Detalle Guia Remisions</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
