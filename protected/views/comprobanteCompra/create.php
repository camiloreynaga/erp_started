<?php
$this->breadcrumbs=array(
	'Compras'=>array('/Compra/admin'),
	'Create',
);

$this->menu=array(
array('label'=>'List ComprobanteCompra','url'=>array('index')),
array('label'=>'Manage Compra','url'=>array('admin')),
);
?>

<h1> <?php echo yii::t('app', 'Create'); ?> Comprobante Compra</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>