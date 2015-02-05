<?php
$this->breadcrumbs=array(
	yii::t('app','Serie Numeros')=>array('index'),
	yii::t('app','Manage'),
);

$this->menu=array(
array('label'=>yii::t('app','List').' '.yii::t('app','SerieNumero'),'url'=>array('index')),
array('label'=>yii::t('app','Create').' '.yii::t('app','SerieNumero'),'url'=>array('create')),
);

Yii::app()->clientScript->registerScript( yii::t('app','search'), "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('serie-numero-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1><?php echo yii::t('app','Manage');?>  <?php echo yii::t('app','Serie Numeros'); ?></h1>

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
'id'=>'serie-numero-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		'serie',
		'numero',
                array(
                    'name'=>'comprobante_id',
                    'value'=>'$data->r_comprobante->comprobante'
                ),
		array(
                    'name'=>'punto_venta_id',
                    'value'=>'$data->r_punto_venta->punto_venta'
                ),
		
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
