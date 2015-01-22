<?php
$this->breadcrumbs=array(
	yii::t('app','Productos')=>array('index'),
	yii::t('app','Manage'),
);

$this->menu=array(
array('label'=>yii::t('app','List').' '.yii::t('app','Producto'),'url'=>array('index')),
array('label'=>yii::t('app','Create').' '.yii::t('app','Producto'),'url'=>array('create')),
);

Yii::app()->clientScript->registerScript( yii::t('app','search'), "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('producto-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1><?php echo yii::t('app','Manage');?>  <?php echo yii::t('app','Productos'); ?></h1>

<p>
	<?php echo yii::t('app','You may optionally enter a comparison operator');?> (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	<?php yii::t('app','or');?> <b>=</b>) <?php echo yii::t('app','at the beginning of each of your search values to specify how the comparison should be done.');?></p>

<?php echo CHtml::link(yii::t('app','Advanced Search'),'#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'producto-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
                array(
                    'name'=>'id',
                    'htmlOptions'=>array(
                        'width'=>'50px',
                    )
                ),    
                array(
                    'name'=>'nombre',
                    'header'=>'Producto',
                    //'value'=>'$data->r_Producto'
                ),
		'descripcion',
		array(
                    'name'=>'tipo_producto_id',
                    'header'=>'Tipo Producto',
                    'value'=>'isset($data->r_tipoProducto->tipo_producto)?$data->r_tipoProducto->tipo_producto:null',
//                    'filter'=> $this->widget('booster.widgets.TbSelect2',
//                            array(
//                                    'name' => 'tipo_producto_id',
//                                    //'asDropDownList' => true,
//                                        'data'=> CHtml::listData(Producto::model()->getTipoOptions(),'id','tipo_producto'),
//                                        'options' => array(
//                                                //'tags' => array('clever', 'is', 'better', 'clevertech'),
//                                                //'placeholder' => 'eliga por favor.',
//                                                /* 'width' => '40%', */
//                                                //'tokenSeparators' => array(',', ' ')
//                                        )
//                            )
//                    ),
                ),
                array(
                    'name'=>'presentacion_id',
                    'header'=>'Presentación',
                    'value'=>'isset($data->r_presentacion->presentacion)?$data->r_presentacion->presentacion:null'
                ),
                array(
                    'name'=>'unidad_medida_id',
                    'header'=>'Medida',
                    'value'=>'isset($data->r_unidadMedida->unidad_medida)?$data->r_unidadMedida->unidad_medida:null'
                ),
                array(
                    'name'=>'fabricante_id',
                    'header'=>'Laboratorio',
                    'value'=>'isset($data->r_fabricante->fabricante)?$data->r_fabricante->fabricante:null'
                ),
                'stock',
                array(
                    'name'=>'precio_venta',
                    //'widgetOptions'=>array(
                      //  ,
//                    ),
                    
                    'class'=>'booster.widgets.TbEditableColumn',
                        'editable'=>array(
                            'type'=>'text',
                            //'inputClass'=>'inline',
                            'url' => $this->createUrl('producto/editItem'),
                        )
                ),
                array(
                    'name'=>'descontinuado',
                    'value'=>'$data->_estado[$data->descontinuado]',
                    'filter'=>  array_merge(array(''=>yii::t('app','ALL')),$model->_estado)
                    //'value'=>'$data->descontinuado'
                ),
                
		
		/*
		'fabricante_id',
		'minimo_stock',
		
		
		
		'ventaUnd',
		'observacion',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
		*/
                array(
                'class'=>'booster.widgets.TbButtonColumn',
                    
                'htmlOptions'=>array(
                                'width'=>'70px',
                            )
                  
                ),
    ),
)); ?>
