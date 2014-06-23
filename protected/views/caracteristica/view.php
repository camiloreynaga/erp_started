<?php
$this->breadcrumbs=array(
	'Caracteristicas'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Caracteristica','url'=>array('index')),
array('label'=>'Create Caracteristica','url'=>array('create')),
array('label'=>'Update Caracteristica','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Caracteristica','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Caracteristica','url'=>array('admin')),
);
?>

<h1>View Caracteristica #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'caracteristica',
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
