<?php
$this->breadcrumbs=array(
	'Motivo Movimientos',
);

$this->menu=array(
array('label'=>'Create MotivoMovimiento','url'=>array('create')),
array('label'=>'Manage MotivoMovimiento','url'=>array('admin')),
);
?>

<h1>Motivo Movimientos</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
