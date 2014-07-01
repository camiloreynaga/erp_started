<?php
$this->breadcrumbs=array(
	'Nota Creditos',
);

$this->menu=array(
array('label'=>'Create NotaCredito','url'=>array('create')),
array('label'=>'Manage NotaCredito','url'=>array('admin')),
);
?>

<h1>Nota Creditos</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
