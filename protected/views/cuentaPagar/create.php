<?php
$this->breadcrumbs=array(
        yii::t('app','Cuenta Pagars')=>array('index'),
	yii::t('app','Create'),
);

$this->menu=array(
array('label'=>yii::t('app','List').' '.yii::t('app','CuentaPagar'),'url'=>array('index')),
array('label'=>yii::t('app','Manage').' '.yii::t('app','CuentaPagar'),'url'=>array('admin')),
);
?>

<h1> <?php echo yii::t('app','Create');?> <?php echo yii::t('app','CuentaPagar'); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>