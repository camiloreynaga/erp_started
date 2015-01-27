<?php
$this->breadcrumbs=array(
	yii::t('app','Currencies')=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	yii::t('app','Update'),
);

	$this->menu=array(
        array('label'=>yii::t('app','List').' '.yii::t('app','Currency'),'url'=>array('index')),
	array('label'=>yii::t('app','Create').' '.yii::t('app','Currency'),'url'=>array('create')),
        array('label'=>yii::t('app','View').' '.yii::t('app','Currency'),'url'=>array('view','id'=>$model->id)),
        array('label'=>yii::t('app','Manage').' '.yii::t('app','Currency'),'url'=>array('admin')),
	);
	?>

	<h1> <?php echo yii::t('app','Update');?> <?php echo yii::t('app','Currency');?> <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>