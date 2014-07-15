<?php
$this->breadcrumbs=array(
	'Productos'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Producto','url'=>array('index')),
array('label'=>'Create Producto','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
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

<h1>Manage Productos</h1>

<!--<p>
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php // echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<!--<div class="search-form" style="display:none">
	<?php 
//        $this->renderPartial('_search',array(
//	'model'=>$model,
//)); 
        ?>
</div> search-form -->

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
                    'value'=>'$data->r_tipoProducto->tipo_producto',
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
                    'value'=>'$data->r_presentacion->presentacion'
                ),
                array(
                    'name'=>'unidad_medida_id',
                    'header'=>'Medida',
                    'value'=>'$data->r_unidadMedida->unidad_medida'
                ),
                array(
                    'name'=>'fabricante_id',
                    'header'=>'Laboratorio',
                    'value'=>'$data->r_fabricante->fabricante'
                ),
    
		
		/*
		'fabricante_id',
		'minimo_stock',
		'stock',
		'descontinado',
		'precio',
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
