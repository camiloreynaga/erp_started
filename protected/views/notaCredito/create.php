<?php
$this->breadcrumbs=array(
	'Nota Creditos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List NotaCredito','url'=>array('index')),
array('label'=>'Manage NotaCredito','url'=>array('admin')),
);
?>

<h1>Create NotaCredito</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>