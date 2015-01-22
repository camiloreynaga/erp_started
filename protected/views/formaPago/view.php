<?php
$this->breadcrumbs=array(
	'Forma Pagos'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List FormaPago','url'=>array('index')),
array('label'=>'Create FormaPago','url'=>array('create')),
array('label'=>'Update FormaPago','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete FormaPago','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage FormaPago','url'=>array('admin')),
);
?>

<h1>View FormaPago #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'forma_pago',
		'activo',
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
