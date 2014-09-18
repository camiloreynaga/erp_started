<?php
$this->breadcrumbs=array(
	'Ventas',
);

$this->menu=array(
array('label'=>yii::t('app','Create').' '.yii::t('app','Sale'),'url'=>array('create')),
array('label'=>yii::t('app','Manage').' '.yii::t('app','Sale'),'url'=>array('admin')),
);
?>

<h1>Ventas</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
