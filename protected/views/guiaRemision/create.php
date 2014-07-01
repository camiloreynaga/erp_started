<?php
$this->breadcrumbs=array(
	'Guia Remisions'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List GuiaRemision','url'=>array('index')),
array('label'=>'Manage GuiaRemision','url'=>array('admin')),
);
?>

<h1>Create GuiaRemision</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>