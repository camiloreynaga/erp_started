<?php
$this->breadcrumbs=array(
        yii::t('app','Motivo Movimientos'),
);

$this->menu=array(
array('label'=>yii::t('app','Create').' '.yii::t('app','MotivoMovimiento'),'url'=>array('create')),
array('label'=>yii::t('app','Manage').' '.yii::t('app','MotivoMovimiento'),'url'=>array('admin')),
);
?>

<h1><?php echo yii::t('app','Motivo Movimientos'); ?></h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
