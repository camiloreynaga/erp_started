<?php
$this->breadcrumbs=array(
        yii::t('app','Tax Products'),
);

$this->menu=array(
array('label'=>yii::t('app','Create').' '.yii::t('app','TaxProduct'),'url'=>array('create')),
array('label'=>yii::t('app','Manage').' '.yii::t('app','TaxProduct'),'url'=>array('admin')),
);
?>

<h1><?php echo yii::t('app','Tax Products'); ?></h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
