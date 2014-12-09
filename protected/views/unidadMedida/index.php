<?php
$this->breadcrumbs=array(
        yii::t('app','Unidad Medidas'),
);

$this->menu=array(
array('label'=>yii::t('app','Create').' '.yii::t('app','UnidadMedida'),'url'=>array('create')),
array('label'=>yii::t('app','Manage').' '.yii::t('app','UnidadMedida'),'url'=>array('admin')),
);
?>

<h1><?php echo yii::t('app','Unidad Medidas'); ?></h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
