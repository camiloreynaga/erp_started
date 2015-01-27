<?php
$this->breadcrumbs=array(
            yii::t('app','Color Products')=>array('index'),
            $model->id,
    );

    $this->menu=array(
        array('label'=>yii::t('app','List').' '.yii::t('app','ColorProduct'),'url'=>array('index')),
        array('label'=>yii::t('app','Create').' '.yii::t('app','ColorProduct'),'url'=>array('create')),
        array('label'=>yii::t('app','Update').' '.yii::t('app','ColorProduct'),'url'=>array('update','id'=>$model->id)),
        array('label'=>yii::t('app','Delete').' '.yii::t('app','ColorProduct'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>yii::t('app','Are you sure you want to delete this item?'))),
        array('label'=>yii::t('app','Manage').' '.yii::t('app','ColorProduct'),'url'=>array('admin')),
        );
    ?>

    <h1><?php echo yii::t('app','View');?> <?php echo yii::t('app','ColorProduct');?> #<?php echo $model->id; ?></h1>

    <?php $this->widget('booster.widgets.TbDetailView',array(
        'data'=>$model,
        'attributes'=>array(
        		'id',
		'color_id',
		'producto_id',
		'stock',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
        ),
)); ?>
