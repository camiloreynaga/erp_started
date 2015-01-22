<?php
$this->breadcrumbs=array(
	yii::t('app','Empleados')=>array('index'),
	yii::t('app','Manage'),
);

$this->menu=array(
array('label'=>yii::t('app','List').' '.yii::t('app','Empleado'),'url'=>array('index')),
array('label'=>yii::t('app','Create').' '.yii::t('app','Empleado'),'url'=>array('create')),
);

Yii::app()->clientScript->registerScript( yii::t('app','search'), "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('empleado-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1><?php echo yii::t('app','Manage');?>  <?php echo yii::t('app','Empleados'); ?></h1>

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
'id'=>'empleado-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		'nombre',
		'ap_paterno',
		'ap_materno',
		'doc_identidad',
                array(
                    'name'=>'cargo_id',
                    'value'=>'$data->r_cargo->cargo'
                ),
                'movil',
		//'direccion',
		/*
		'telefono',
		
		'fecha_nacimiento',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
		*/
        array(
        'class'=>'booster.widgets.TbButtonColumn',
            'template'=>'{view}{update}{delete}',
            'buttons'=>array(
                'update'=>array(
                    'visible'=>'$data->id>1'
                ),
                'delete'=>array(
                    'visible'=>'$data->id>1'
                )
            )
            
        ),
    ),
)); ?>
