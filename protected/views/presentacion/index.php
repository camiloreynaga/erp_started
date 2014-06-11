<?php
$this->breadcrumbs=array(
	'Presentacions',
);

$this->menu=array(
array('label'=>'Create Presentacion','url'=>array('create')),
array('label'=>'Manage Presentacion','url'=>array('admin')),
);
?>

<h1>Presentacions</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
