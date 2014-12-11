<?php
$this->breadcrumbs=array(
	'Movimiento Almacens'=>array('index'),
	$model->id,
);

$this->menu=array(
    //array('label'=>'List MovimientoAlmacen','url'=>array('index')),
    //array('label'=>'Create MovimientoAlmacen','url'=>array('create')),
    array('label'=>yii::t('app','Process').' '. yii::t('app','Sale'),'url'=>array('sacarVenta')), 
    array('label'=>yii::t('app','Process').' '. yii::t('app','Purchase'),'url'=>array('ingresarCompra')),   
        
    array('label'=>yii::t('app','check-in'),'url'=>array('ingreso')),

    array('label'=>yii::t('app','check-out'),'url'=>array('salida')),
    //array('label'=>'Update MovimientoAlmacen','url'=>array('update','id'=>$model->id)),
    //array('label'=>'Delete MovimientoAlmacen','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('label'=>'Manage MovimientoAlmacen','url'=>array('admin')),
);
?>

<h1>View MovimientoAlmacen #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'fecha_movimiento',
                array(
                    'name'=>'producto_id',
                    'value'=>$model->r_producto->nombre
                ),
		'cantidad',
                array(
                    'name'=>'motivo_movimiento_id',
                    'value'=>$model->r_motivo_movimiento->movimiento
                ),
		//'detalle_compra_id',
		//'detalle_venta_id',
		'observacion',
                array(
                    'name'=>'almacen_id',
                    'value'=>$model->r_almacen->almacen
                ),
		
		'saldo_stock',
                array(
                    'name'=>'operacion',
                    'value'=>$model->_operacion[$model->operacion]
                ),
		
		'create_time',
		array(
                  'name'=>'create_user_id',
                  'value'=>  User::model()->getUsuario($model->create_user_id),
                ),
		'update_time',
                array(
                    'name'=>'update_user_id',
                    'value'=>User::model()->getUsuario($model->update_user_id),
                ),
),
)); ?>
