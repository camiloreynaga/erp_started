<?php
$this->breadcrumbs=array(
	'Forma Pagos',
);

$this->menu=array(
array('label'=>'Create FormaPago','url'=>array('create')),
array('label'=>'Manage FormaPago','url'=>array('admin')),
);
?>

<h1>Forma Pagos</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
