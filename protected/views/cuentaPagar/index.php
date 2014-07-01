<?php
$this->breadcrumbs=array(
	'Cuenta Pagars',
);

$this->menu=array(
array('label'=>'Create CuentaPagar','url'=>array('create')),
array('label'=>'Manage CuentaPagar','url'=>array('admin')),
);
?>

<h1>Cuenta Pagars</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
