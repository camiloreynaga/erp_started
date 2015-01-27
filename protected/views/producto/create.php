<?php
$this->breadcrumbs=array(
        yii::t('app','Productos')=>array('index'),
	yii::t('app','Create'),
);

$this->menu=array(
array('label'=>yii::t('app','List').' '.yii::t('app','Producto'),'url'=>array('index')),
array('label'=>yii::t('app','Manage').' '.yii::t('app','Producto'),'url'=>array('admin')),
);
?>

<h1> <?php echo yii::t('app','Create');?> <?php echo yii::t('app','Producto'); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>