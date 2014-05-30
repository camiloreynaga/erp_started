<?php
/* @var $this UnidadMedidaController */
/* @var $model UnidadMedida */

$this->breadcrumbs=array(
	'Unidad Medidas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UnidadMedida', 'url'=>array('index')),
	array('label'=>'Create UnidadMedida', 'url'=>array('create')),
	array('label'=>'View UnidadMedida', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UnidadMedida', 'url'=>array('admin')),
);
?>

<h1>Update UnidadMedida <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>