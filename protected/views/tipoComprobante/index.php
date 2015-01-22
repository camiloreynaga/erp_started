<?php
$this->breadcrumbs=array(
        yii::t('app','Tipo Comprobantes'),
);

$this->menu=array(
array('label'=>yii::t('app','Create').' '.yii::t('app','TipoComprobante'),'url'=>array('create')),
array('label'=>yii::t('app','Manage').' '.yii::t('app','TipoComprobante'),'url'=>array('admin')),
);
?>

<h1><?php echo yii::t('app','Tipo Comprobantes'); ?></h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
