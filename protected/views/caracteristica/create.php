<?php
$this->breadcrumbs=array(
	'Caracteristicas'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Caracteristica','url'=>array('index')),
array('label'=>'Manage Caracteristica','url'=>array('admin')),
);
?>

<h1>Create Caracteristica</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>