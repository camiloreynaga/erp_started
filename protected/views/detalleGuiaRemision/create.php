<?php
$this->breadcrumbs=array(
	'Detalle Guia Remisions'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List DetalleGuiaRemision','url'=>array('index')),
array('label'=>'Manage DetalleGuiaRemision','url'=>array('admin')),
);
?>

<h1>Create DetalleGuiaRemision</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>