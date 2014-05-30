<?php
/* @var $this FabricanteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Fabricantes',
);

$this->menu=array(
	array('label'=>'Create Fabricante', 'url'=>array('create')),
	array('label'=>'Manage Fabricante', 'url'=>array('admin')),
);
?>

<h1>Fabricantes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
