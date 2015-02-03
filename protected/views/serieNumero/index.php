<?php
$this->breadcrumbs=array(
        yii::t('app','Serie Numeros'),
);

$this->menu=array(
array('label'=>yii::t('app','Create').' '.yii::t('app','SerieNumero'),'url'=>array('create')),
array('label'=>yii::t('app','Manage').' '.yii::t('app','SerieNumero'),'url'=>array('admin')),
);
?>

<h1><?php echo yii::t('app','Serie Numeros'); ?></h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
