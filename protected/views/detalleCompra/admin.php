<?php
$this->breadcrumbs=array(
	'Detalle Compras'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List DetalleCompra','url'=>array('index')),
array('label'=>'Create DetalleCompra','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('detalle-compra-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Detalle Compras</h1>

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
'id'=>'detalle-compra-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		'compra_id',
		'producto_id',
		'cantidad',
		'lote',
		'fecha_vencimiento',
		/*
		'cantidad_bueno',
		'cantidad_malo',
		'estado',
		'observacion',
		'precio_unitario',
		'subtotal',
		'impuesto',
		'total',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
