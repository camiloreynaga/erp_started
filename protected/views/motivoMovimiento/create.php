<?php
$this->breadcrumbs=array(
	'Motivo Movimientos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List MotivoMovimiento','url'=>array('index')),
array('label'=>'Manage MotivoMovimiento','url'=>array('admin')),
);
?>

<h1>Create MotivoMovimiento</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>