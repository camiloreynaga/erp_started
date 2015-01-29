<?php
$this->breadcrumbs=array(
        yii::t('app','Punto Ventas'),
);

$this->menu=array(
array('label'=>yii::t('app','Create').' '.yii::t('app','PuntoVenta'),'url'=>array('create')),
array('label'=>yii::t('app','Manage').' '.yii::t('app','PuntoVenta'),'url'=>array('admin')),
);
?>

<h1><?php echo yii::t('app','Punto Ventas'); ?></h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
