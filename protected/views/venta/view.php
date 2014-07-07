<?php
$this->breadcrumbs=array(
	'Ventas'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Venta','url'=>array('index')),
array('label'=>'Create Venta','url'=>array('create')),
array('label'=>'Update Venta','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Venta','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Venta','url'=>array('admin')),
);
?>

<h1>View Venta #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id',
		'fecha_venta',
                array(
                    'name'=>'cliente_id',
                    'value'=>$model->r_cliente->nombre_rz
                ),
		array(
                    'name'=>'vendedor_id',
                    'value'=>$model->r_empleado->nombre.' '.$model->r_empleado->ap_paterno
                ),
		array(
                    'name'=>'forma_pago_id',
                    'value'=>$model->r_formaPago->forma_pago
                ),
		
		'pedido_id',
		'base_imponible',
		'impuesto',
		'importe_total',
		'observacion',
		'estado',
		//'create_time',
		//'create_user_id',
		//'update_time',
		//'update_user_id',
),
)); ?>
<?php
$this->renderPartial('//DetalleVenta/_viewDetalleVenta',array('model'=>DetalleVenta::model(),'pid'=>$model->id));

?>
<a href="facturacion2/factura.php?id_venta=<?php echo $model->id; ?>" target="blank" >Facturar</a></p>