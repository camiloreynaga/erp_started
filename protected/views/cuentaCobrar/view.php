<?php
$this->breadcrumbs=array(
            yii::t('app','Cuenta Cobrars')=>array('index'),
            $model->id,
    );

    $this->menu=array(
        array('label'=>yii::t('app','List').' '.yii::t('app','CuentaCobrar'),'url'=>array('index')),
        array('label'=>yii::t('app','Create').' '.yii::t('app','CuentaCobrar'),'url'=>array('create')),
        array('label'=>yii::t('app','Update').' '.yii::t('app','CuentaCobrar'),'url'=>array('update','id'=>$model->id)),
        array('label'=>yii::t('app','Delete').' '.yii::t('app','CuentaCobrar'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>yii::t('app','Are you sure you want to delete this item?'))),
        array('label'=>yii::t('app','Manage').' '.yii::t('app','CuentaCobrar'),'url'=>array('admin')),
        );
    ?>

    <h1><?php echo yii::t('app','View');?> <?php echo yii::t('app','CuentaCobrar');?> #<?php echo $model->id; ?></h1>

    <?php $this->widget('booster.widgets.TbDetailView',array(
        'data'=>$model,
        'attributes'=>array(
        		'id',
		'venta_id',
		'monto',
		'estado',
		'fecha_pago',
		'fecha_vencimiento',
		'medio_pago',
		'interes',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
        ),
)); ?>
