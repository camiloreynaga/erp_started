<?php
$this->breadcrumbs=array(
	'Productos'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Producto','url'=>array('index')),
array('label'=>'Create Producto','url'=>array('create')),
array('label'=>'Update Producto','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Producto','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Producto','url'=>array('admin')),
);
?>

<h1>View Producto #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		array(
                    'name'=>'nombre',
                    'value'=>$model->nombre
                ),
                array(
                    'name'=>'descripcion',
                    'value'=>$model->descripcion
                ),
		array(
                    'name'=>'tipo_producto_id',
                    'value'=>$model->r_tipoProducto->tipo_producto,
                ),
		array(
                  'name'=> 'presentacion_id',
                   'value'=>$model->r_presentacion->presentacion
                ),
		array(
                    'name'=>'unidad_medida_id',
                    'value'=>$model->r_unidadMedida->unidad_medida
                ),
		array(
                    'name'=>'fabricante_id',
                    'value'=>$model->r_fabricante->fabricante
                ),
		'minimo_stock',
		'stock',
		array(
                    'name'=>'descontinuado',
                    'value'=>$model->descontinuado==0?'NO':'SI'
                ),
		'precio',
		'ventaUnd',
		'observacion',
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
