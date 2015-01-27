<?php
$this->breadcrumbs=array(
        yii::t('app','Offers'),
);

$this->menu=array(
array('label'=>yii::t('app','Create').' '.yii::t('app','Offer'),'url'=>array('create')),
array('label'=>yii::t('app','Manage').' '.yii::t('app','Offer'),'url'=>array('admin')),
);
?>

<h1><?php echo yii::t('app','Offers'); ?></h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
