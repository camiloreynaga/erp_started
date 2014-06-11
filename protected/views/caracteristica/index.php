<?php
$this->breadcrumbs=array(
	'Caracteristicas',
);

$this->menu=array(
array('label'=>'Create Caracteristica','url'=>array('create')),
array('label'=>'Manage Caracteristica','url'=>array('admin')),
);
?>

<h1>Caracteristicas</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
