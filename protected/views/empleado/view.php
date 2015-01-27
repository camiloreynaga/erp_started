<?php
$this->breadcrumbs=array(
            yii::t('app','Empleados')=>array('index'),
            $model->id,
    );

    $this->menu=array(
        array('label'=>yii::t('app','List').' '.yii::t('app','Empleado'),'url'=>array('index')),
        array('label'=>yii::t('app','Create').' '.yii::t('app','Empleado'),'url'=>array('create')),
        array('label'=>yii::t('app','Update').' '.yii::t('app','Empleado'),'url'=>array('update','id'=>$model->id)),
        array('label'=>yii::t('app','Delete').' '.yii::t('app','Empleado'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>yii::t('app','Are you sure you want to delete this item?'))),
        array('label'=>yii::t('app','Manage').' '.yii::t('app','Empleado'),'url'=>array('admin')),
        );
    ?>

    <h1><?php echo yii::t('app','View');?> <?php echo yii::t('app','Empleado');?> #<?php echo $model->id; ?></h1>

    
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'nombre',
		'ap_paterno',
		'ap_materno',
		'doc_identidad',
                array(
                  'name'=>'cargo_id',
                  'value'=>$model->r_cargo->cargo
                ),
		'direccion',
		'telefono',
		'movil',
		'fecha_nacimiento',
                'fecha_ingreso',
                'fecha_salida',
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
