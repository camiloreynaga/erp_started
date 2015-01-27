<?php
$this->breadcrumbs=array(
	'Detalle Compras'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List DetalleCompra','url'=>array('index')),
array('label'=>'Create DetalleCompra','url'=>array('create')),
array('label'=>'Update DetalleCompra','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete DetalleCompra','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage DetalleCompra','url'=>array('admin')),
);
?>

<h1>View DetalleCompra #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'compra_id',
		'producto_id',
		'cantidad',
		'lote',
		'fecha_vencimiento',
		'cantidad_bueno',
		'cantidad_malo',
		'estado',
		'observacion',
		'precio_unitario',
		'subtotal',
		'impuesto',
		'total',
		'create_time',
                array(
                  'name'=>'create_user_id',
                  'value'=>User::model()->getUsuario($model->create_user_id),
                ),
		'update_time',
                array(
                    'name'=>'update_user_id',
                    'value'=>User::model()->getUsuario($model->update_user_id),
                ),
		'comprobante_id',
),
)); ?>
