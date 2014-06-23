<?php
$this->breadcrumbs=array(
	'Proveedors'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Proveedor','url'=>array('index')),
array('label'=>'Create Proveedor','url'=>array('create')),
array('label'=>'Update Proveedor','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Proveedor','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Proveedor','url'=>array('admin')),
);
?>

<h1>View Proveedor #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'nombre_rz',
		'ruc',
		'contacto',
		'direccion',
		'ciudad',
		'telefono',
		'linea_credito',
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
