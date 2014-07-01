<?php
$this->breadcrumbs=array(
	'Tipo Comprobantes'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List TipoComprobante','url'=>array('index')),
array('label'=>'Manage TipoComprobante','url'=>array('admin')),
);
?>

<h1>Create TipoComprobante</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>