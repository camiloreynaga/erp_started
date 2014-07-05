<?php
$this->breadcrumbs=array(
	'Forma Pagos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List FormaPago','url'=>array('index')),
array('label'=>'Manage FormaPago','url'=>array('admin')),
);
?>

<h1>Create FormaPago</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>