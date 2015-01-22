<?php
$this->breadcrumbs=array(
	Yii::t('app', 'Purchase')=>array('admin'),
	yii::t('app','Manage'),
);

$this->menu=array(
//array('label'=>'List Compra','url'=>array('index')),
array('label'=>Yii::t('app','Create').' '. Yii::t('app', 'Purchase'),'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('compra-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1><?php echo Yii::t('app','Manage').' '. Yii::t('app', 'Purchase');?></h1>

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
'id'=>'compra-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		array(
                    'name'=>'id',
                    'htmlOptions'=>array(
                        'width'=>'50px',
                    )
                ),
		'fecha_compra',
//                array(
//                    //'name'=>'comprobante_id',
//                    'value'=>'$data->r_comprobante_compra->numero'
//                ),
                array(
                    'name'=>'proveedor_id',
                    'value'=>'$data->r_proveedor->nombre_rz'
                ),
                 'observacion',
                array(
                    'name'=>'estado',
                    'value'=>'$data->_estado[$data->estado]',
                    'filter'=>  array_merge(array(''=>yii::t('app','ALL')),$model->_estado),
                    
                ),
               
                /*
		'base_imponible',
		'impuesto',
		
		'importe_total',
		
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
                        'visible'=>'$data->estado<3', //'$data->estado==0 || $data->estado==2 ',
                        'url'=>'Yii::app()->createUrl("//detalleCompra/create", array("pid"=>$data->id))'
                        //'url'=>$this->createUrl('//detalleCompra/create',array('pid'=>$model->id)) 
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
