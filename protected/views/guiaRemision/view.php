<?php
$this->breadcrumbs=array(
            yii::t('app','Guia Remisions')=>array('index'),
            $model->id,
    );

    $this->menu=array(
        array('label'=>yii::t('app','List').' '.yii::t('app','GuiaRemision'),'url'=>array('index')),
        array('label'=>yii::t('app','Create').' '.yii::t('app','GuiaRemision'),'url'=>array('create')),
        array('label'=>yii::t('app','Update').' '.yii::t('app','GuiaRemision'),'url'=>array('update','id'=>$model->id)),
        array('label'=>yii::t('app','Delete').' '.yii::t('app','GuiaRemision'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>yii::t('app','Are you sure you want to delete this item?'))),
        array('label'=>yii::t('app','Manage').' '.yii::t('app','GuiaRemision'),'url'=>array('admin')),
        );
    ?>

    <h1><?php echo yii::t('app','View');?> <?php echo yii::t('app','GuiaRemision');?> #<?php echo $model->id; ?></h1>

    <?php $this->widget('booster.widgets.TbDetailView',array(
        'data'=>$model,
        'attributes'=>array(
        		'id',
		'remitente',
		'serie',
		'numero',
		'cliente_proveedor_id',
		'motivo_traslado',
		'fecha_inicio_traslado',
		'transportista_id',
		'punto_partida',
		'punto_llegada',
		'marca_placa',
		'licencia_conducir',
		'estado_gr',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
        ),
)); ?>
