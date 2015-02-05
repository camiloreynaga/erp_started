<?php
$this->breadcrumbs=array(
        yii::t('app','Empresas'),
);

$this->menu=array(
array('label'=>yii::t('app','Create').' '.yii::t('app','Empresa'),'url'=>array('create')),
array('label'=>yii::t('app','Manage').' '.yii::t('app','Empresa'),'url'=>array('admin')),
);
?>

<h1><?php echo yii::t('app','Empresas'); ?></h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
