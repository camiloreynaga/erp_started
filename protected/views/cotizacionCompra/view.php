<?php
$this->breadcrumbs=array(
	'Cotizacion Compras'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List CotizacionCompra','url'=>array('index')),
array('label'=>'Create CotizacionCompra','url'=>array('create')),
array('label'=>'Update CotizacionCompra','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete CotizacionCompra','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage CotizacionCompra','url'=>array('admin')),
);
?>

<h1>View CotizacionCompra #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'fecha_cotizacion',
		'proveedor_id',
		'validez',
		'estado',
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
),
)); ?>
