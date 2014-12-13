<?php
$this->breadcrumbs=array(
	'Comprobante Ventas'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List ComprobanteVenta','url'=>array('index')),
array('label'=>'Create ComprobanteVenta','url'=>array('create')),
array('label'=>'Update ComprobanteVenta','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete ComprobanteVenta','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage ComprobanteVenta','url'=>array('admin')),
);
?>

<h1>View ComprobanteVenta #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'venta_id',
		'tipo_comprobante_id',
		'fecha_emision',
		'fecha_cancelacion',
		'serie',
		'numero',
		'estado',
		'guia_remision_remitente',
		'guia_remision_transportista',
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
