<?php
$this->breadcrumbs=array(
	'Fabricantes'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Fabricante','url'=>array('index')),
array('label'=>'Manage Fabricante','url'=>array('admin')),
);
?>

<h1>Create Fabricante</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>