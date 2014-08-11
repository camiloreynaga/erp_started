<?php
$this->breadcrumbs=array(
        yii::t('app','Purchase')=>array('//Compra/admin'),
	//'Detalle Compras'=>array('index'),
	yii::t('app','Details').' '.yii::t('app','Purchase'),
);

$this->menu=array(
array('label'=>'List DetalleCompra','url'=>array('index')),
array('label'=>'Manage DetalleCompra','url'=>array('admin')),
);
?>



<?php
$compra= Compra::model()->findByPk($_GET['pid']);
//$model = new Compra();
//$model->getat
echo $this->renderPartial('//Compra/_head', array('compra'=>$compra));
?>
<h4> <?php echo yii::t('app','Details').' '.yii::t('app','Purchase');?></h4>
<?php 
$model->estado=''; // estado limpio
echo $this->renderPartial('_form', array('model'=>$model)); ?>