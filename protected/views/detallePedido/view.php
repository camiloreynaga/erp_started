<?php
$this->breadcrumbs=array(
	'Detalle Pedidos'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List DetallePedido','url'=>array('index')),
array('label'=>'Create DetallePedido','url'=>array('create')),
array('label'=>'Update DetallePedido','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete DetallePedido','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage DetallePedido','url'=>array('admin')),
);
?>

<h1>View DetallePedido #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'pedido_id',
		'producto_id',
		'cantidad',
		'observacion',
		'precio_unitario',
		'subtotal',
		'impuesto',
		'total',
),
)); ?>
