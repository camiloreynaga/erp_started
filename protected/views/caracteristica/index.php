<?php
$this->breadcrumbs=array(
        yii::t('app','Caracteristicas'),
);

$this->menu=array(
array('label'=>yii::t('app','Create').' '.yii::t('app','Caracteristica'),'url'=>array('create')),
array('label'=>yii::t('app','Manage').' '.yii::t('app','Caracteristica'),'url'=>array('admin')),
);
?>

<h1><?php echo yii::t('app','Caracteristicas'); ?></h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
