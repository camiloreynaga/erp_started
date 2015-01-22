<?php
$this->breadcrumbs=array(
        yii::t('app','Currencies'),
);

$this->menu=array(
array('label'=>yii::t('app','Create').' '.yii::t('app','Currency'),'url'=>array('create')),
array('label'=>yii::t('app','Manage').' '.yii::t('app','Currency'),'url'=>array('admin')),
);
?>

<h1><?php echo yii::t('app','Currencies'); ?></h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
