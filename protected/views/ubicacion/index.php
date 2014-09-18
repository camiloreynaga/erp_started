<?php
$this->breadcrumbs=array(
	'Ubicacions',
);

$this->menu=array(
array('label'=>'Create Ubicacion','url'=>array('create')),
array('label'=>'Manage Ubicacion','url'=>array('admin')),
);
?>

<h1>Ubicacions</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
