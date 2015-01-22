<?php
$this->breadcrumbs=array(
        yii::t('app','Color Products')=>array('index'),
	yii::t('app','Create'),
);

$this->menu=array(
array('label'=>yii::t('app','List').' '.yii::t('app','ColorProduct'),'url'=>array('index')),
array('label'=>yii::t('app','Manage').' '.yii::t('app','ColorProduct'),'url'=>array('admin')),
);
?>

<h1> <?php echo yii::t('app','Create');?> <?php echo yii::t('app','ColorProduct'); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>