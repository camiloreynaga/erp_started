<?php
$this->breadcrumbs=array(
	Yii::t('app', 'Purchase')=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	yii::t('app','Update'),
);

	$this->menu=array(
	//array('label'=>'List Compra','url'=>array('index')),
	array('label'=>Yii::t('app','Create').' '. Yii::t('app', 'Purchase'),'url'=>array('create')),
	//array('label'=>'View Compra','url'=>array('view','id'=>$model->id)),
	array('label'=>Yii::t('app','Manage').' '. Yii::t('app', 'Purchase'),'url'=>array('admin')),
	);
	?>

	<h1><?php echo yii::t('app','Update').' '. yii::t('app','Purchase');  echo ' '. $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>