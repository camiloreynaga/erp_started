<?php
$this->breadcrumbs=array(
	'Ubicacions'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Ubicacion','url'=>array('index')),
array('label'=>'Manage Ubicacion','url'=>array('admin')),
);
?>

<h1>Create Ubicacion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>