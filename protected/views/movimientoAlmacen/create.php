<?php
$this->breadcrumbs=array(
	yii::t('app','Stock movements')=>array('admin'),
	yii::t('app','Register'),
);

$this->menu=array(
//array('label'=>'List MovimientoAlmacen','url'=>array('index')),
array('label'=>yii::t('app','Manage').' '.yii::t('app','Stock movements'),'url'=>array('admin')),
);
?>

<h1><?php echo yii::t('app','Register').' '. yii::t('app','Stock movements') ;?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php // echo $this_?>