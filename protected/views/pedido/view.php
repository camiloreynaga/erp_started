<?php
$this->breadcrumbs=array(
	'Pedidos'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Pedido','url'=>array('index')),
array('label'=>'Create Pedido','url'=>array('create')),
array('label'=>'Update Pedido','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Pedido','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Pedido','url'=>array('admin')),
);
?>

<h1>View Pedido #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id',
		'fecha_pedido',
		array(
                    'name'=>'cliente_id',
                    'value'=>$model->r_cliente->nombre_rz
                ),
                array(
                    'name'=>'vendedor_id',
                    'value'=>$model->r_empleado->nombre.' '.$model->r_empleado->ap_paterno
                ),
		//'vendedor_id',
		'cotizacion_id',
		'observaciones',
		'estado',
		//'create_time',
		//'create_user_id',
		//'update_time',
		//'update_user_id',
),
)); ?>

<?php
$this->renderPartial('//DetallePedido/_viewDetallePedido',array('model'=>DetallePedido::model(),'pid'=>$model->id));

?>

