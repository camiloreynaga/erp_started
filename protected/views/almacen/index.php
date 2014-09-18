<?php
$this->breadcrumbs=array(
	'Almacens',
);

$this->menu=array(
array('label'=>'Create Almacen','url'=>array('create')),
array('label'=>'Manage Almacen','url'=>array('admin')),
);
?>

<h1>Almacens</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
