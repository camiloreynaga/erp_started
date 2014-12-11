<?php
$this->breadcrumbs=array(
	yii::t('app','Stock movements')=>array('admin'),
	yii::t('app','check-in'),
);

$this->menu=array(
    //array('label'=>'List MovimientoAlmacen','url'=>array('index')),
    
    array('label'=>yii::t('app','Process').' '. yii::t('app','Sale'),'url'=>array('sacarVenta')), 
    array('label'=>yii::t('app','Process').' '. yii::t('app','Purchase'),'url'=>array('ingresarCompra')),   
        
    //array('label'=>yii::t('app','check-in'),'url'=>array('ingreso')),

    array('label'=>yii::t('app','check-out'),'url'=>array('salida')),
    
    array('label'=>yii::t('app','Manage').' '.yii::t('app','Stock movements'),'url'=>array('admin')),

    
);
?>

<?php 

//$model=  MovimientoAlmacen::model();
?>

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'ingreso-almacen-form',
        //'action'=>'Ingreso',
//	'enableAjaxValidation'=>true,
//    'clientOptions' =>array(
//            'validateOnSubmit' => true),
        )
    ); ?>

<p class="help-block"> <?php echo yii::t('app','Fields with') ;?> <span class="required"> * </span> <?php echo yii::t('app','are required.') ;?> </p>

<?php echo $form->errorSummary($model); ?>
        
        <?php 
        
        echo $form->hiddenField($model,'operacion',array(
            'value'=>0,
        )); 

         ?>

         <?php 
         
         
         
        echo $form->select2Group($model, 
                'motivo_movimiento_id',
                array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
                                    
                                    'asDropDownList' => true,
                                    'data'      => CHtml::listData(MotivoMovimiento::model()->getMovimientosAdicionales(0), "id","movimiento"),
					'options' => array(
						'placeholder' =>'Seleccione Motivo', 
					),
				)
			)
		);
        
        ?>
        <?php 
//        echo $form->DropDownListGroup($model,
//                'almacen_id',
//                 array(
//                    'widgetOptions'=>array(
//                    'data'=>CHtml::listData(Almacen::model()->getAlmacen(),'id','almacen'),
//                    )
//                ),
//                array('class'=>'span5')); 
        ?>

	<?php //echo $form->textFieldGroup($model,'producto_id',array('class'=>'span5'));
        
        $htmlOptions=array(
          'ajax'=>array(
              'url'=>CController::createUrl('movimientoAlmacen/lotesIngreso'),
              'type'=>'POST',
              'update'=>'#MovimientoAlmacen__lote',
          ),  
        );
        
        echo $form->select2Group(
			$model,
			'producto_id',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
                                    
                                    'asDropDownList' => true,
                                    //'data'      => CHtml::listData(Producto::model()->findAll('descontinuado=0'), "id","nombre"),
                                    'data'      => CHtml::listData(Producto::model()->getProductos(), "id","text"),
                                    'options' => array(
                                            'placeholder' =>'Seleccione producto', 
                                            //'tags'=>'de',
                                            //'width' => '40%', 
                                            'tokenSeparators' => array(',', ' ')
                                    ),
                                   // 'htmlOptions'=>$htmlOptions,
				)
			)
		);
        
        ?>
        <?php
        
        
        
//        echo $form->DropDownListGroup($model,
//                '_lote',
//                 array(
//                    'widgetOptions'=>array(
//                    //'data'=>CHtml::listData(Almacen::model()->getAlmacen(),'id','almacen'),
//                    )
//                ),
//                array('class'=>'span5')); 

       echo $form->textFieldGroup($model,'_lote',array('class'=>'span5'));

        ?>
        <?php
        
        
        echo $form->datepickerGroup($model,
                '_fecha_vencimiento'
                ,array(
				'widgetOptions' => array(
					'options' => array(
                                           // 'language' => 'es',
                                           //'format'=>'dd/mm/yyyy',
                                            
                                            'format'=>'yyyy-mm-dd',
                                            'starView'=>2,
                                            'minViewMode'=>1,
                                            'autoclose'=>true,
                                            'todayHighlight'=>true,
                                            )
				),
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'hint' => 'Ingrese fecha.',
				'prepend' => '<i class="glyphicon glyphicon-calendar"></i>'
			)
		);
        ?>

	<?php echo $form->textFieldGroup($model,'cantidad',array('class'=>'span5')); ?>


	<?php //echo $form->textFieldGroup($model,'detalle_compra_id',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldGroup($model,'detalle_venta_id',array('class'=>'span5')); ?>

	<?php echo $form->textAreaGroup($model,'observacion',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	

	<?php //echo $form->textFieldGroup($model,'saldo_stock',array('class'=>'span5')); ?>

	


<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? yii::t('app','Create') : yii::t('app','Save'),
                        'htmlOptions'=>array(
                            'confirm'=>yii::t('app','Are you sure to process?'),
                        )
		)); ?>
</div>


<?php $this->endWidget(); ?>

<div id="Detalle"></div>
