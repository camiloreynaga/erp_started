<?php
$this->breadcrumbs=array(
        yii::t('app','Colors'),
);

$this->menu=array(
array('label'=>yii::t('app','Create').' '.yii::t('app','Color'),'url'=>array('create')),
array('label'=>yii::t('app','Manage').' '.yii::t('app','Color'),'url'=>array('admin')),
);
?>

<h1><?php echo yii::t('app','Colors'); ?></h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
