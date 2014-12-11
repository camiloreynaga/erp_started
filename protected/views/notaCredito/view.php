<?php
$this->breadcrumbs=array(
            yii::t('app','Nota Creditos')=>array('index'),
            $model->id,
    );

    $this->menu=array(
        array('label'=>yii::t('app','List').' '.yii::t('app','NotaCredito'),'url'=>array('index')),
        array('label'=>yii::t('app','Create').' '.yii::t('app','NotaCredito'),'url'=>array('create')),
        array('label'=>yii::t('app','Update').' '.yii::t('app','NotaCredito'),'url'=>array('update','id'=>$model->id)),
        array('label'=>yii::t('app','Delete').' '.yii::t('app','NotaCredito'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>yii::t('app','Are you sure you want to delete this item?'))),
        array('label'=>yii::t('app','Manage').' '.yii::t('app','NotaCredito'),'url'=>array('admin')),
        );
    ?>

    <h1><?php echo yii::t('app','View');?> <?php echo yii::t('app','NotaCredito');?> #<?php echo $model->id; ?></h1>

    <?php $this->widget('booster.widgets.TbDetailView',array(
        'data'=>$model,
        'attributes'=>array(
        		'id',
		'comprobante_venta_id',
		'fecha_emision',
		'serie',
		'numero',
		'estado',
		'motivo_emision',
		'base_imponible',
		'impuesto',
		'importe_total',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
        ),
)); ?>
