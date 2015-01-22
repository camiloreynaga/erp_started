<?php
$this->breadcrumbs=array(
        yii::t('app','Fabricantes'),
);

$this->menu=array(
array('label'=>yii::t('app','Create').' '.yii::t('app','Fabricante'),'url'=>array('create')),
array('label'=>yii::t('app','Manage').' '.yii::t('app','Fabricante'),'url'=>array('admin')),
);
?>

<h1><?php echo yii::t('app','Fabricantes'); ?></h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
