<?php
$this->breadcrumbs=array(
        yii::t('app','Cuenta Pagars'),
);

$this->menu=array(
array('label'=>yii::t('app','Create').' '.yii::t('app','CuentaPagar'),'url'=>array('create')),
array('label'=>yii::t('app','Manage').' '.yii::t('app','CuentaPagar'),'url'=>array('admin')),
);
?>

<h1><?php echo yii::t('app','Cuenta Pagars'); ?></h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
