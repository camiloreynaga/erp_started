<?php
$this->breadcrumbs=array(
	'Detalle Compras'=>array('index'),
	'Create',
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
<h4> Detalle Compra</h4>
<?php 
$model->estado=''; // estado limpio
echo $this->renderPartial('_form', array('model'=>$model)); ?>