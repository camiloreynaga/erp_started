<?php
$this->breadcrumbs=array(
	'Cuenta Cobrars'=>array('index'),
	'Create',
);
$this->menu=array(
array('label'=>'List CuentaCobrar','url'=>array('index')),
array('label'=>'Manage CuentaCobrar','url'=>array('admin')),
);
?>
<?php 
$venta= Venta::model();
echo $this->renderPartial('_venta', array('venta'=>$venta));  ?>
<h3>Cuenta por Cobrar</h3>
<?php
// partial de encabezado de venta
 if(isset($_GET['pid']))
{
     //echo $this->renderPartial('_formModal'); 
     $venta=Venta::model()->findByPk($_GET['pid']);
     //$venta->id=;
   echo $this->renderPartial('_venta_head', array('venta'=>$venta));
}
?>
<?php ?>
<?php //echo $this->renderPartial('_formModal', array('model'=>$model)); ?>

<?php 
//echo $this->renderPartial('_ventaForm', array('model'=>$model));
echo $this->renderPartial('_form_pay', array('model'=>$model)); ?>
<?php //echo $this->renderPartial('admin', array('model'=>$model)); ?>

