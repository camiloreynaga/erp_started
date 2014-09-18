<?php
$this->breadcrumbs=array(
	Yii::t('app', 'Purchase order')=>array('admin'),
         Yii::t('app','Create'),
);

$this->menu=array(
array('label'=> Yii::t('app','List').' '. Yii::t('app', 'Purchase order'),'url'=>array('index')),
array('label'=>Yii::t('app','Manage').' '. Yii::t('app', 'Purchase order'),'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app','Create').' '. Yii::t('app', 'Purchase order');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>