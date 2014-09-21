<?php
$this->breadcrumbs=array(
	'Producto Almacens'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List ProductoAlmacen','url'=>array('index')),
array('label'=>'Create ProductoAlmacen','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('producto-almacen-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<H1> <?php echo yii::t('app','Manage'); ?>   Producto Almacens</h1>

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
'id'=>'producto-almacen-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		//'almacen_id',
                array(
                    'name'=>'almacen_id',
                    'value'=>'$data->r_almacen->almacen'
                ),
		array(
                    'name'=>'producto_id',
                    'value'=>'$data->r_producto->nombre'
                ),
		'lote',
		'fecha_vencimiento',
		'cantidad_disponible',
		/*
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
		*/
//                array(
//                'class'=>'booster.widgets.TbButtonColumn',
//                'template'=>'{view}'
//                ),
),
)); ?>
