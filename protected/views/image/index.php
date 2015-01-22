<?php
$this->breadcrumbs=array(
        yii::t('app','Images'),
);

$this->menu=array(
array('label'=>yii::t('app','Create').' '.yii::t('app','Image'),'url'=>array('create')),
array('label'=>yii::t('app','Manage').' '.yii::t('app','Image'),'url'=>array('admin')),
);
?>

<h1><?php echo yii::t('app','Images'); ?></h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
