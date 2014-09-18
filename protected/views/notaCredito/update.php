<?php
$this->breadcrumbs=array(
	'Nota Creditos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List NotaCredito','url'=>array('index')),
	array('label'=>'Create NotaCredito','url'=>array('create')),
	array('label'=>'View NotaCredito','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage NotaCredito','url'=>array('admin')),
	);
	?>

	<h1>Update NotaCredito <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>