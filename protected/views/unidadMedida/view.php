<?php
$this->breadcrumbs=array(
            yii::t('app','Unidad Medidas')=>array('index'),
            $model->id,
    );

    $this->menu=array(
        array('label'=>yii::t('app','List').' '.yii::t('app','UnidadMedida'),'url'=>array('index')),
        array('label'=>yii::t('app','Create').' '.yii::t('app','UnidadMedida'),'url'=>array('create')),
        array('label'=>yii::t('app','Update').' '.yii::t('app','UnidadMedida'),'url'=>array('update','id'=>$model->id)),
        array('label'=>yii::t('app','Delete').' '.yii::t('app','UnidadMedida'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>yii::t('app','Are you sure you want to delete this item?'))),
        array('label'=>yii::t('app','Manage').' '.yii::t('app','UnidadMedida'),'url'=>array('admin')),
        );
    ?>

    <h1><?php echo yii::t('app','View');?> <?php echo yii::t('app','UnidadMedida');?> #<?php echo $model->id; ?></h1>

    <?php $this->widget('booster.widgets.TbDetailView',array(
        'data'=>$model,
        'attributes'=>array(
        		'id',
		'unidad_medida',
		'nonmenclatura',
		'cantidad_equivalente',
                array(
                    'name'=>'unidad_equivalente',
                    'value'=>$model->r_unidadMedida->unidad_medida
                ),
		
		'activo',
		'create_time',
                array(
                  'name'=>'create_user_id',
                  'value'=>User::model()->getUsuario($model->create_user_id),
                ),
		'update_time',
                array(
                    'name'=>'update_user_id',
                    'value'=>User::model()->getUsuario($model->update_user_id),
                ),
        ),
)); ?>
