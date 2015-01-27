<?php
$this->breadcrumbs=array(
            yii::t('app','Productos')=>array('index'),
            $model->id,
    );

    $this->menu=array(
        array('label'=>yii::t('app','List').' '.yii::t('app','Producto'),'url'=>array('index')),
        array('label'=>yii::t('app','Create').' '.yii::t('app','Producto'),'url'=>array('create')),
        array('label'=>yii::t('app','Update').' '.yii::t('app','Producto'),'url'=>array('update','id'=>$model->id)),
        array('label'=>yii::t('app','Delete').' '.yii::t('app','Producto'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>yii::t('app','Are you sure you want to delete this item?'))),
        array('label'=>yii::t('app','Manage').' '.yii::t('app','Producto'),'url'=>array('admin')),
        );
    ?>

    <h1><?php echo yii::t('app','View');?> <?php echo yii::t('app','Producto');?> #<?php echo $model->id; ?></h1>

    <?php $this->widget('booster.widgets.TbDetailView',array(
    'data'=>$model,
    'attributes'=>array(
		'id',
		array(
                    'name'=>'nombre',
                    'value'=>$model->nombre
                ),
                array(
                    'name'=>'descripcion',
                    'value'=>$model->descripcion
                ),
		array(
                    'name'=>'tipo_producto_id',
                    'value'=>  isset($model->r_tipoProducto->tipo_producto)?$model->r_tipoProducto->tipo_producto: null,
                ),
		array(
                  'name'=> 'presentacion_id',
                   'value'=>isset($model->r_presentacion->presentacion)?$model->r_presentacion->presentacion:null
                ),
                array(
                    'name'=>'fabricante_id',
                    'value'=>isset($model->r_fabricante->fabricante)?$model->r_fabricante->fabricante:null
                ),
    
    
		array(
                    'name'=>'unidad_medida_id',
                    'value'=>isset($model->r_unidadMedida->unidad_medida)?$model->r_unidadMedida->unidad_medida:null
                ),
		
		'minimo_stock',
		'stock',
		array(
                    'name'=>'descontinuado',
                    'value'=>$model->descontinuado==0?'NO':'SI'
                ),
                'precio_venta',
                'precio_compra',
                'porcentaje_ganancia',
		//'ventaUnd',
		'observacion',
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
