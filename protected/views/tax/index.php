<?php
$this->breadcrumbs=array(
        yii::t('app','Taxes'),
);

$this->menu=array(
array('label'=>yii::t('app','Create').' '.yii::t('app','Tax'),'url'=>array('create')),
array('label'=>yii::t('app','Manage').' '.yii::t('app','Tax'),'url'=>array('admin')),
);
?>

<h1><?php echo yii::t('app','Taxes'); ?></h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
