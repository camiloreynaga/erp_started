<?php
$this->breadcrumbs=array(
        yii::t('app','Tipo Productos'),
);

$this->menu=array(
array('label'=>yii::t('app','Create').' '.yii::t('app','TipoProducto'),'url'=>array('create')),
array('label'=>yii::t('app','Manage').' '.yii::t('app','TipoProducto'),'url'=>array('admin')),
);
?>

<h1><?php echo yii::t('app','Tipo Productos'); ?></h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
