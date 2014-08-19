<?php
$this->breadcrumbs=array(
	'Tipo Productos'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List TipoProducto','url'=>array('index')),
array('label'=>'Create TipoProducto','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('tipo-producto-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<H1> <?php echo yii::t('app','Manage'); ?>   Tipo Productos</h1>

<!--<p>
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php 
//echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<!--<div class="search-form" style="display:none">-->
	<?php // $this->renderPartial('_search',array(
//	'model'=>$model,
//));
?>
<!--</div> search-form -->

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'tipo-producto-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		array(
                    'name'=>'id',
                    'htmlOptions'=>array(
                        'width'=>'30px',
                    )
                ), 
		'tipo_producto',
//		'create_time',
//		'create_user_id',
//		'update_time',
//		'update_user_id',
        array(
        'class'=>'booster.widgets.TbButtonColumn',
        'htmlOptions'=>array(
                        'width'=>'70px',
                    )   
        ),
),
)); ?>
