<?php
$this->breadcrumbs=array(
	'Detalle Guia Remisions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List DetalleGuiaRemision','url'=>array('index')),
	array('label'=>'Create DetalleGuiaRemision','url'=>array('create')),
	array('label'=>'View DetalleGuiaRemision','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage DetalleGuiaRemision','url'=>array('admin')),
	);
	?>

	<h1>Update DetalleGuiaRemision <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>