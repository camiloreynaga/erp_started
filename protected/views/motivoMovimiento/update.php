<?php
$this->breadcrumbs=array(
	'Motivo Movimientos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List MotivoMovimiento','url'=>array('index')),
	array('label'=>'Create MotivoMovimiento','url'=>array('create')),
	array('label'=>'View MotivoMovimiento','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage MotivoMovimiento','url'=>array('admin')),
	);
	?>

	<h1>Update MotivoMovimiento <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>