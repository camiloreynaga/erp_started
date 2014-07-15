

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'movimiento-almacen-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->datepickerGroup($model,'fecha_movimiento',array('options'=>array(),'htmlOptions'=>array('class'=>'span5')),array('prepend'=>'<i class="icon-calendar"></i>','append'=>'Click on Month/Year at top to select a different year or type in (mm/dd/yyyy).')); ?>
        <?php
        $htmlOptions=array(
          //'style'=>'width:150px',  
          'ajax'=>array(
              'url'=>CController::createUrl('movimientoAlmacen/Operacion'),//determina tipo de operación: ingreso(0) /salida (1)
              'type'=>'POST',
              'update'=>'#MovimientoAlmacen_motivo_movimiento_id',
          ),  
        );
        
        echo $form->switchGroup($model,'operacion',
                array('class'=>'span5',
                        'widgetOptions'=>array(
                            'options'=>array(
                                'size'=>'large',
                                'onText'=>'Salida',
                                'offText'=>'Ingreso',
                                'onColor' => 'danger',
                                'offColor' => 'primary', 
                                ),
                            'htmlOptions'=>$htmlOptions,
                    )
                )
                
                ); ?>
        <?php //echo $form->textFieldGroup($model,'operacion',array('class'=>'span5')); ?>
         <?php 
         
        echo $form->DropDownListGroup($model, //select2Group
                'motivo_movimiento_id',
                array(
//				'wrapperHtmlOptions' => array(
//					'class' => 'col-sm-5',
//				),
                               // 'selector'=>'movimiento_id',
				'widgetOptions' => array(
                                    
                                  //  'asDropDownList' => true,
                                    //'data'      => CHtml::listData(MotivoMovimiento::model()->getMovimientos(0), "id","movimiento"),
				//	'options' => array(
                                                
				//		'placeholder' =>'Seleccione Motivo', 
				//	),
				)
			)
		);
        
        ?>
        <?php 
        echo $form->DropDownListGroup($model,
                'almacen_id',
                 array(
                    'widgetOptions'=>array(
                    'data'=>CHtml::listData(Almacen::model()->getAlmacen(),'id','almacen'),
                    )
                ),
                array('class'=>'span5')); ?>

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
                                    'data'      => CHtml::listData(Producto::model()->getProductosStock(), "id","text"),
                                    'options' => array(
                                            'placeholder' =>'Seleccione producto', 
                                            //'tags'=>'de',
                                            //'width' => '40%', 
                                            'tokenSeparators' => array(',', ' ')
                                    ),
                                    'htmlOptions'=>$htmlOptions,
				)
			)
		);
        
        ?>
        <?php
        
        
        
        echo $form->DropDownListGroup($model,
                '_lote',
                 array(
                    'widgetOptions'=>array(
                    //'data'=>CHtml::listData(Almacen::model()->getAlmacen(),'id','almacen'),
                    )
                ),
                array('class'=>'span5')); ?>
       


	<?php echo $form->textFieldGroup($model,'cantidad',array('class'=>'span5')); ?>


	<?php //echo $form->textFieldGroup($model,'detalle_compra_id',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldGroup($model,'detalle_venta_id',array('class'=>'span5')); ?>

	<?php echo $form->textAreaGroup($model,'observacion',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	

	<?php //echo $form->textFieldGroup($model,'saldo_stock',array('class'=>'span5')); ?>

	



<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'ajaxSubmit',
			'context'=>'primary',
                        'url'=>  CController::createUrl('movimientoAlmacen/create'
                                //array('')
                                ),
			'label'=>'Procesar', //$model->isNewRecord ? 'Create' : 'Save',
                        'ajaxOptions'=>array(
                            'dataType'=>'json',
                            'type'=>'POST',
                            'data'=>'js:$("#movimiento-almacen-form").serialize()',
//                            'success'=>'function(data){
//                                if(data.status=="success")
//                                    updateGrilla(data);
//                                }
//                                else
//                                {
//                                    formErrors(data,form="#movimiento-almacen-form");
//                                }
//                                ',
                        )
		)); ?>
</div>

<?php $this->endWidget(); ?>

<div id="Detalle"></div>