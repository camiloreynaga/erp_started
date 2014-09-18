<?php
$this->breadcrumbs=array(
	'Tipo Comprobantes'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List TipoComprobante','url'=>array('index')),
array('label'=>'Create TipoComprobante','url'=>array('create')),
array('label'=>'Update TipoComprobante','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete TipoComprobante','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage TipoComprobante','url'=>array('admin')),
);
?>

<h1>View TipoComprobante #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'comprobante',
		'codigo_comprobante',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
),
)); ?>
