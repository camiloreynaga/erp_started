<?php
$this->breadcrumbs=array(
        yii::t('app','Cargos'),
);

$this->menu=array(
array('label'=>yii::t('app','Create').' '.yii::t('app','Cargo'),'url'=>array('create')),
array('label'=>yii::t('app','Manage').' '.yii::t('app','Cargo'),'url'=>array('admin')),
);
?>

<h1><?php echo yii::t('app','Cargos'); ?></h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
