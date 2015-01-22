<?php
$this->breadcrumbs=array(
        yii::t('app','Nota Creditos'),
);

$this->menu=array(
array('label'=>yii::t('app','Create').' '.yii::t('app','NotaCredito'),'url'=>array('create')),
array('label'=>yii::t('app','Manage').' '.yii::t('app','NotaCredito'),'url'=>array('admin')),
);
?>

<h1><?php echo yii::t('app','Nota Creditos'); ?></h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
