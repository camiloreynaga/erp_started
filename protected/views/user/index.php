<?php
$this->breadcrumbs=array(
        yii::t('app','Users'),
);

$this->menu=array(
array('label'=>yii::t('app','Create').' '.yii::t('app','User'),'url'=>array('create')),
array('label'=>yii::t('app','Manage').' '.yii::t('app','User'),'url'=>array('admin')),
);
?>

<h1><?php echo yii::t('app','Users'); ?></h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
