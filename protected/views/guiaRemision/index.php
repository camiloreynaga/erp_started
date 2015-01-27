<?php
$this->breadcrumbs=array(
        yii::t('app','Guia Remisions'),
);

$this->menu=array(
array('label'=>yii::t('app','Create').' '.yii::t('app','GuiaRemision'),'url'=>array('create')),
array('label'=>yii::t('app','Manage').' '.yii::t('app','GuiaRemision'),'url'=>array('admin')),
);
?>

<h1><?php echo yii::t('app','Guia Remisions'); ?></h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
