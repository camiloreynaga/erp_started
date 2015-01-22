<?php
$this->breadcrumbs=array(
        yii::t('app','Guia Remisions')=>array('index'),
	yii::t('app','Create'),
);

$this->menu=array(
array('label'=>yii::t('app','List').' '.yii::t('app','GuiaRemision'),'url'=>array('index')),
array('label'=>yii::t('app','Manage').' '.yii::t('app','GuiaRemision'),'url'=>array('admin')),
);
?>

<h1> <?php echo yii::t('app','Create');?> <?php echo yii::t('app','GuiaRemision'); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>