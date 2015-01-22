<?php
$this->breadcrumbs=array(
        yii::t('app','Cuenta Cobrars'),
);

$this->menu=array(
array('label'=>yii::t('app','Create').' '.yii::t('app','CuentaCobrar'),'url'=>array('create')),
array('label'=>yii::t('app','Manage').' '.yii::t('app','CuentaCobrar'),'url'=>array('admin')),
);
?>

<h1><?php echo yii::t('app','Cuenta Cobrars'); ?></h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
