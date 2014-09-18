<?php
$this->breadcrumbs=array(
	Yii::t('app', 'Purchase order')=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	yii::t('app','Update'),
);

	$this->menu=array(
	//array('label'=>'List OrdenCompra','url'=>array('index')),
	array('label'=>Yii::t('app','Create').' '. Yii::t('app', 'Purchase order'),'url'=>array('create')),
	//array('label'=>'View OrdenCompra','url'=>array('view','id'=>$model->id)),
	array('label'=>Yii::t('app','Manage').' '. Yii::t('app', 'Purchase order'),'url'=>array('admin')),
	);
	?>

	<h1><?php echo yii::t('app','Update').' '. yii::t('app','Purchase order');  echo ' '. $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
        <h3> <?php echo yii::t('app','Details');?> </h3>
<?php 
$detalle_orden = new DetalleOrdenCompra();
$detalle_orden->orden_compra_id=$model->id;

echo $this->renderPartial('//DetalleOrdenCompra/_form',array('model'=>$detalle_orden))?> 