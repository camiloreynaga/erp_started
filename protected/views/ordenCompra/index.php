<?php
$this->breadcrumbs=array(
	Yii::t('app', 'Purchase order'),
);

$this->menu=array(
array('label'=>Yii::t('app','Create').' '. Yii::t('app', 'Purchase order'),'url'=>array('create')),
array('label'=>Yii::t('app','Manage').' '. Yii::t('app', 'Purchase order'),'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('app', 'Purchase order');?> </h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
