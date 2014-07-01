<?php
$this->breadcrumbs=array(
	'Cuenta Cobrars',
);

$this->menu=array(
array('label'=>'Create CuentaCobrar','url'=>array('create')),
array('label'=>'Manage CuentaCobrar','url'=>array('admin')),
);
?>

<h1>Cuenta Cobrars</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
