                                    <?php
$this->breadcrumbs=array(
	yii::t('app','Sale')=>array('admin'),
	yii::t('app','Manage')
);

$this->menu=array(
//array('label'=>yii::t('app','List').' '.yii::t('app','Sale'),'url'=>array('index')),
array('label'=>yii::t('app','Create').' '.yii::t('app','Sale'),'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('venta-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<H1> <?php echo yii::t('app','Manage'); ?>   Ventas</h1>

<!--<p>
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->
<!--
<?php // echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php 
// $this->renderPartial('_search',array(
//	'model'=>$model,
//)); 
        ?>
</div> search-form -->

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'venta-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		'fecha_venta',
                array(
                    'name'=>'cliente_id',
                    'value'=>'$data->r_cliente->nombre_rz'
                ),
		array(
                    'name'=>'vendedor_id',
                    'value'=>'$data->r_empleado->nombre'
                ),
		array(
                    'name'=>'forma_pago_id',
                    'value'=>'$data->r_forma_pago->forma_pago'
                ),
                //'estado',
                'importe_total',
		//'observacion',
		//'pedido_id',
		/*
		'base_imponible',
		'impuesto',
		
		
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
		*/
                
                
                array(
                'class'=>'booster.widgets.TbButtonColumn',
                    'template'=>'{view} {update} {delete}',
                'buttons'=>array(
                    'update'=>array(
                        'visible'=>'$data->estado<2 && $data->estado_comprobante=0', //'$data->estado==0 || $data->estado==2 ',
                        'url'=>'Yii::app()->createUrl("//detalleVenta/create", array("pid"=>$data->id))'
                        //'url'=>$this->createUrl('//detalleCompra/create',array('pid'=>$model->id)) 
                    ),
                    'delete'=>array(
                        'visible'=>'$data->estado==0 '
                    )
                ),
                    'htmlOptions'=>array(
                        'width'=>'70px',
                    )
                ),
                ),
)); ?>
