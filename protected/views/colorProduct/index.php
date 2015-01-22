<?php
$this->breadcrumbs=array(
        yii::t('app','Color Products'),
);

$this->menu=array(
array('label'=>yii::t('app','Create').' '.yii::t('app','ColorProduct'),'url'=>array('create')),
array('label'=>yii::t('app','Manage').' '.yii::t('app','ColorProduct'),'url'=>array('admin')),
);
?>

<h1><?php echo yii::t('app','Color Products'); ?></h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
