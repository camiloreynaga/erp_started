<?php
$this->breadcrumbs=array(
        yii::t('app','Presentacions'),
);

$this->menu=array(
array('label'=>yii::t('app','Create').' '.yii::t('app','Presentacion'),'url'=>array('create')),
array('label'=>yii::t('app','Manage').' '.yii::t('app','Presentacion'),'url'=>array('admin')),
);
?>

<h1><?php echo yii::t('app','Presentacions'); ?></h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
