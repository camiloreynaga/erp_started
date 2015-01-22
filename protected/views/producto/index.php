<?php
$this->breadcrumbs=array(
        yii::t('app','Productos'),
);

$this->menu=array(
array('label'=>yii::t('app','Create').' '.yii::t('app','Producto'),'url'=>array('create')),
array('label'=>yii::t('app','Manage').' '.yii::t('app','Producto'),'url'=>array('admin')),
);
?>

<h1><?php echo yii::t('app','Productos'); ?></h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
