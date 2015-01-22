<?php
$this->breadcrumbs=array(
	Yii::t('app', 'Purchase order')=>array('admin'),
        //Yii::t('app', 'Purchase order')=>array('index'),
	$model->id,
);

$this->menu=array(
//array('label'=>'List OrdenCompra','url'=>array('index'),),
array('label'=>Yii::t('app','Create').' '. Yii::t('app', 'Purchase order'),'url'=>array('create')),
array('label'=>Yii::t('app','Update').' '. Yii::t('app', 'Purchase order'),'url'=>array('update','id'=>$model->id),'visible'=>$model->estado==0),
//array('label'=>'Delete OrdenCompra','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>Yii::t('app','Manage').' '. Yii::t('app', 'Purchase order'),'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app','View').' '. Yii::t('app', 'Purchase order').' # '. $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id',
		'fecha_orden',
                array(
                    'name'=>'proveedor_id',
                    //'header'=>'Proveedor'
                    'value'=>$model->r_proveedor->nombre_rz
                ),
		'observaciones',
		array(
                    'name'=>'estado',
                    'value'=>$model->_estado[$model->estado]
                ),
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

<?php
$this->renderPartial('//DetalleOrdenCompra/_viewDetalleOc',array('model'=>  DetalleOrdenCompra::model(),'pid'=>$model->id));
?>