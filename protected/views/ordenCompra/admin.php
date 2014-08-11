<?php
$this->breadcrumbs=array(
	Yii::t('app', 'Purchase order')=>array('admin'),
	yii::t('app','Manage'),
        //'Manage',
);

$this->menu=array(
//array('label'=>'List OrdenCompra','url'=>array('index')),
array('label'=>Yii::t('app','Create').' '. Yii::t('app', 'Purchase order'),'url'=>array('create')),
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

<h1><?php echo Yii::t('app','Manage').' '. Yii::t('app', 'Purchase order');?></h1>

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
                    'value'=>'$data->_estado[$data->estado]',
                    'filter'=> array_merge(array(''=> yii::t('app','ALL')),$model->_estado ),// $model->_estado,// array('1'=>'On','0'=>'Off'),  //CHtml::listData($model,, $textField)
                    
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
                array(
                'class'=>'booster.widgets.TbButtonColumn',
                'template'=>'{reception}',
                'buttons'=>array(
                    'reception'=>array(
                        'label'=>'<i class="glyphicon glyphicon-check"></i>',
                        'url'=>'Yii::app()->createUrl("Compra/Create", array("id"=>$data->id))',
                        'visible'=>'$data->estado==0',
                         'options'=>array(
                                                    'title'=>yii::t('app','Reception'),
                                                        'confirm'=>yii::t('app','Receive?'),
//                                                    'ajax'=>array(
//                                                        'type'=>'POST',
//                                                        'url'=>'Yii::app()->createUrl("movimientoAlmacen/RegistrarCompra", array("id"=>$data->id))',
////                                                        'success'=>'function(data) { $("#viewModal .modal-body p").html(data); $("#viewModal").modal(); }'
//                                                    ),
                                                ),
                    ),
                ),    
                 
                ),
),
)); ?>
