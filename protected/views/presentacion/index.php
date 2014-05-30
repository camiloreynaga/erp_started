<?php
/* @var $this PresentacionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Presentacions',
);

$this->menu=array(
	array('label'=>'Create Presentacion', 'url'=>array('create')),
	array('label'=>'Manage Presentacion', 'url'=>array('admin')),
);
?>

<h1>Presentacions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
