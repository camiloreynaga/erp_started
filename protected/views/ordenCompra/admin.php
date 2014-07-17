<?php
$this->breadcrumbs=array(
	'Orden Compras'=>array('index'),
	'Manage',
);

$this->menu=array(
//array('label'=>'List OrdenCompra','url'=>array('index')),
array('label'=>'Create OrdenCompra','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('orden-compra-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Orden Compras</h1>

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

<?php $this->widget('booster.widgets.TbExtendedGridView',array(
'id'=>'orden-compra-grid',
//'fixedHeader'=>true,
//'headerOffset' => 30,    
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		 array(
                    'name'=>'id',
                    'htmlOptions'=>array(
                        'width'=>'50px',
                    )
                ),
		'fecha_orden',
		//'proveedor_id',
                array(
                    'name'=>'proveedor_id',
                    'header'=>'Proveedor',
                    'value'=>'$data->r_proveedor->nombre_rz'
                ),
		'observaciones',
		
                array(
                    'name'=>'estado',
                    'value'=>'$data->_estado[$data->estado]'
                ),
                 
		/*
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
                        'visible'=>'$data->estado==0'
                    ),
                    'delete'=>array(
                        'visible'=>'$data->estado==0'
                    )
                ),    
                'htmlOptions'=>array(
                                'width'=>'70px',
                            )   
                ),
),
)); ?>
