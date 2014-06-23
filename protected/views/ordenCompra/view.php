<?php
$this->breadcrumbs=array(
	'Orden Compras'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List OrdenCompra','url'=>array('index')),
array('label'=>'Create OrdenCompra','url'=>array('create')),
array('label'=>'Update OrdenCompra','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete OrdenCompra','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage OrdenCompra','url'=>array('admin')),
);
?>

<h1>View OrdenCompra #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'codigo_unico',
		'fecha_orden',
		'proveedor_id',
		'observaciones',
		'estado',
		'create_time',
                array(
                  'name'=>'create_user_id',
                  'value'=>Usuario::model()->getUsuario($model->create_user_id),
                ),
		'update_time',
                array(
                    'name'=>'update_user_id',
                    'value'=>Usuario::model()->getUsuario($model->update_user_id),
                ),
),
)); ?>
