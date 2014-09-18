<?php
$this->breadcrumbs=array(
	yii::t('app','Purchase')=>array('admin'),
	yii::t('app','Create')
);

$this->menu=array(
//array('label'=>'List Compra','url'=>array('index')),
array('label'=>yii::t('app','Manage').' '.yii::t('app','Purchase'),'url'=>array('admin')),
);
?>

<h1><?php echo yii::t('app','Create').' '.yii::t('app','Purchase');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>