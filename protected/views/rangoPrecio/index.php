<?php
$this->breadcrumbs=array(
        yii::t('app','Rango Precios'),
);

$this->menu=array(
array('label'=>yii::t('app','Create').' '.yii::t('app','RangoPrecio'),'url'=>array('create')),
array('label'=>yii::t('app','Manage').' '.yii::t('app','RangoPrecio'),'url'=>array('admin')),
);
?>

<h1><?php echo yii::t('app','Rango Precios'); ?></h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
