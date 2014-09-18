<?php
$this->breadcrumbs=array(
	'Ventas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Venta','url'=>array('index')),
	array('label'=>yii::t('app','Create').' '.yii::t('app','Sale'),'url'=>array('create')),
	array('label'=>'View Venta','url'=>array('view','id'=>$model->id)),
	array('label'=>yii::t('app','Manage').' '.yii::t('app','Sale'),'url'=>array('admin')),
	);
	?>

	<h1>Update Venta <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>