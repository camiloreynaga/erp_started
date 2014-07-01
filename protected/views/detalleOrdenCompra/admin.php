<?php
$this->breadcrumbs=array(
	'Detalle Orden Compras'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List DetalleOrdenCompra','url'=>array('index')),
array('label'=>'Create DetalleOrdenCompra','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('detalle-orden-compra-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Detalle Orden Compras</h1>

<p>
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'detalle-orden-compra-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		'orden_compra_id',
		'cotizacion_id',
		'producto_id',
		 array(
                            'name' => 'cantidad',
                            'header' => 'Cantidad',
                            'class' => 'booster.widgets.TbEditableColumn',
                            //'headerHtmlOptions' => array('style' => 'width:200px'),
                            'editable' => array(
                                'type' => 'text',
                                'url' => $this->createUrl('DetalleOrdenCompra/editCantidad')
                            )
                        ),
		'observacion',
		
		'precio_unitario',
		'subtotal',
		'impuesto',
		'total',
		
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
