<?php
$this->breadcrumbs=array(
        yii::t('app','Clientes'),
);

$this->menu=array(
array('label'=>yii::t('app','Create').' '.yii::t('app','Cliente'),'url'=>array('create')),
array('label'=>yii::t('app','Manage').' '.yii::t('app','Cliente'),'url'=>array('admin')),
);
?>

<h1><?php echo yii::t('app','Clientes'); ?></h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
