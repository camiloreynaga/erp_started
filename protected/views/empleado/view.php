<?php
$this->breadcrumbs=array(
	'Empleados'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Empleado','url'=>array('index')),
array('label'=>'Create Empleado','url'=>array('create')),
array('label'=>'Update Empleado','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Empleado','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Empleado','url'=>array('admin')),
);
?>

<h1>View Empleado #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'nombre',
		'ap_paterno',
		'ap_materno',
		'doc_identidad',
		'direccion',
		'telefono',
		'movil',
		'fecha_nacimiento',
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
