<?php
$this->breadcrumbs=array(
        yii::t('app','Proveedors'),
);

$this->menu=array(
array('label'=>yii::t('app','Create').' '.yii::t('app','Proveedor'),'url'=>array('create')),
array('label'=>yii::t('app','Manage').' '.yii::t('app','Proveedor'),'url'=>array('admin')),
);
?>

<h1><?php echo yii::t('app','Proveedors'); ?></h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
