<?php
$this->breadcrumbs=array(
	'Movimiento Almacens',
);

$this->menu=array(
array('label'=>'Create MovimientoAlmacen','url'=>array('create')),
array('label'=>'Manage MovimientoAlmacen','url'=>array('admin')),
);
?>

<h1>Movimiento Almacens</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
