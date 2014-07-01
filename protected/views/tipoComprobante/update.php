<?php
$this->breadcrumbs=array(
	'Tipo Comprobantes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List TipoComprobante','url'=>array('index')),
	array('label'=>'Create TipoComprobante','url'=>array('create')),
	array('label'=>'View TipoComprobante','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage TipoComprobante','url'=>array('admin')),
	);
	?>

	<h1>Update TipoComprobante <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>