<?php
$this->breadcrumbs=array(
        Yii::t('app', 'Sale')=>array('admin'),
	$model->id,
);

$this->menu=array(
//array('label'=>'List Venta','url'=>array('index')),
array('label'=>yii::t('app','Create').' '.yii::t('app','Sale'),'url'=>array('create')),
array('label'=>yii::t('app','Update').' '.yii::t('app','Sale'),'url'=>array('//detalleVenta/create','pid'=>$model->id)),
//array('label'=>yii::t('app','Delete').' '.yii::t('app','Sale'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>yii::t('app','Manage').' '.yii::t('app','Sale'),'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app','View').' '. Yii::t('app', 'Sale').' # '. $model->id; ?></h1>

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
                    'value'=>$model->r_forma_pago->forma_pago
                ),
		
		//'pedido_id',
		'base_imponible',
		'impuesto',
		'importe_total',
		'observacion',
                array(
                    'name'=>'estado',
                    'value'=>$model->_estado[$model->estado]
                ),
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