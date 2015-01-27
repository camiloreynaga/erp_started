<?php
$this->breadcrumbs=array(
        yii::t('app','Empleados'),
);

$this->menu=array(
array('label'=>yii::t('app','Create').' '.yii::t('app','Empleado'),'url'=>array('create')),
array('label'=>yii::t('app','Manage').' '.yii::t('app','Empleado'),'url'=>array('admin')),
);
?>

<h1><?php echo yii::t('app','Empleados'); ?></h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
