<?php
$this->breadcrumbs=array(
	yii::t('app','Stock movements') =>array('admin'),
	yii::t('app','Manage'),
);

$this->menu=array(
//array('label'=>'List MovimientoAlmacen','url'=>array('index')),
array('label'=>yii::t('app','Register').' '.yii::t('app','Movement'),'url'=>array('create')),
array('label'=>yii::t('app','Process').' '. yii::t('app','Purchase'),'url'=>array('ingresarCompra')),    
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('movimiento-almacen-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1><?php echo yii::t('app','Manage').' '.yii::t('app','Stock movements') ;?></h1>

<!--<p>
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php 
//echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	//<?php // $this->renderPartial('_search',array(
//	'model'=>$model,
//)); 
        ?>
</div> search-form -->

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'movimiento-almacen-grid',
//'fixedHeader'=>true,
//'headerOffset' => 30, 
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		
                array(
                  'name'=>'producto_id',
                  'value'=>'$data->r_producto->nombre'
                ),
                'cantidad',
                'fecha_movimiento',
                
                array(
                    'name'=>'operacion',
                    'value'=>'$data->_operacion[$data->operacion]',
                    'filter'=>  array_merge(array(''=>yii::t('app','ALL')),$model->_operacion)
                ),
                array(
                    'name'=>'motivo_movimiento_id',
                    'value'=>'$data->r_motivo_movimiento->movimiento'
                ),
                array(
                    'name'=>'almacen_id',
                    'value'=>'$data->r_almacen->almacen'
                ),
                'saldo_stock',
		/*
		'detalle_venta_id',
		'observacion',
		
		
		'operacion',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
		*/
                array(
                'class'=>'booster.widgets.TbButtonColumn',
                'template'=>'{view}',
                ),
),
)); ?>
