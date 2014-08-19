<?php
$this->breadcrumbs=array(
	'Motivo Movimientos'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List MotivoMovimiento','url'=>array('index')),
array('label'=>'Create MotivoMovimiento','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('motivo-movimiento-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<H1> <?php echo yii::t('app','Manage'); ?>   Motivo Movimientos</h1>

<!--<p>
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php // echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<!--<div class="search-form" style="display:none">
	<?php // $this->renderPartial('_search',array(
//	'model'=>$model,
//)); ?>
</div> search-form -->

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'motivo-movimiento-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		'movimiento',
                array(
                    'name'=>'tipo_movimiento',
                    //'value'=> $model->tipo_movimiento==0 ? 'ingreso' : 'salida'
                        
                         //='0' ? 'Ingreso' : 'Salida',
                ),
		
		'create_time',
		'create_user_id',
		'update_time',
		/*
		'update_user_id',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
