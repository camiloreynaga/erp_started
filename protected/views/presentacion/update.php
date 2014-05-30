<?php
/* @var $this PresentacionController */
/* @var $model Presentacion */

$this->breadcrumbs=array(
	'Presentacions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Presentacion', 'url'=>array('index')),
	array('label'=>'Create Presentacion', 'url'=>array('create')),
	array('label'=>'View Presentacion', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Presentacion', 'url'=>array('admin')),
);
?>

<h1>Update Presentacion <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>