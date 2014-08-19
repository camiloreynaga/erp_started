<?php
$this->breadcrumbs=array(
	yii::t('app','Sale')=>array('admin'),
	yii::t('app','Create')
);

$this->menu=array(
//array('label'=>'List Venta','url'=>array('index')),
array('label'=>yii::t('app','Create').' '.yii::t('app','Sale'),'url'=>array('create')),
);
?>

<h1><?php echo yii::t('app','Create').' '.yii::t('app','Sale'); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>