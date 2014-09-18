<?php
$this->breadcrumbs=array(
	'Guia Remisions',
);

$this->menu=array(
array('label'=>'Create GuiaRemision','url'=>array('create')),
array('label'=>'Manage GuiaRemision','url'=>array('admin')),
);
?>

<h1>Guia Remisions</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
