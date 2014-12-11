<?php
$this->breadcrumbs=array(
        yii::t('app','Cargos')=>array('index'),
	yii::t('app','Create'),
);

$this->menu=array(
array('label'=>yii::t('app','List').' '.yii::t('app','Cargo'),'url'=>array('index')),
array('label'=>yii::t('app','Manage').' '.yii::t('app','Cargo'),'url'=>array('admin')),
);
?>

<h1> <?php echo yii::t('app','Create');?> <?php echo yii::t('app','Cargo'); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>