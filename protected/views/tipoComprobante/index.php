<?php
$this->breadcrumbs=array(
	'Tipo Comprobantes',
);

$this->menu=array(
array('label'=>'Create TipoComprobante','url'=>array('create')),
array('label'=>'Manage TipoComprobante','url'=>array('admin')),
);
?>

<h1>Tipo Comprobantes</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
