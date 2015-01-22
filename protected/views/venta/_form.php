<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'venta-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block"><?php echo yii::t('app','Fields with') ;?> <span class="required">*</span> <?php echo yii::t('app','are required.') ;?></p>

<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->datepickerGroup($model,'fecha_venta',array('options'=>array(),'htmlOptions'=>array('class'=>'span5')),array('prepend'=>'<i class="icon-calendar"></i>','append'=>'Click on Month/Year at top to select a different year or type in (mm/dd/yyyy).')); ?>
        
        <?php // echo $form->textFieldGroup($model,'pedido_id',array('class'=>'span5')); ?>
        
	<?php 
        
        $htmlOptions=array(
          'ajax'=>array(
              'url'=>CController::createUrl('Venta/lineaCredito'),
              //'url'=>CController::createUrl('detalleVenta/precios'),
              'type'=>'POST',
              'update'=>'#linea_credito',
          ),  
        );
        
        
        echo $form->select2Group(
			$model,
			'cliente_id',
                      
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
                                    
                                    'asDropDownList' => true,
                                    'data'      => CHtml::listData (Cliente::model()->getClientes(), "id","text"),
					'options' => array(
						'placeholder' =>'Seleccione Cliente', 
                                                //'width' => '40%', 
						'tokenSeparators' => array(',', ' ')
					),
                                    'htmlOptions'=>$htmlOptions,
				)
			)
		);
        
        ?>

	<?php 
        echo $form->select2Group(
			$model,
			'vendedor_id',
                      
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
                                    
                                    'asDropDownList' => true,
                                    'data'      => CHtml::listData (Empleado::model()->getVendedores(), "id","text"),
					'options' => array(
						'placeholder' =>'Seleccione Preventista', 
                                                //'width' => '40%', 
						'tokenSeparators' => array(',', ' ')
					),
				)
			)
		);
        ?>

	<?php 
        
        
        
        echo $form->select2Group(
			$model,
			'forma_pago_id',
                      
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
                                    
                                    'asDropDownList' => true,
                                    'data'      => CHtml::listData (FormaPago::model()->getFormasPagos(), "id","forma_pago"),
					'options' => array(
						'placeholder' =>'Seleccione Forma Pago', 
                                                //'width' => '40%', 
						'tokenSeparators' => array(',', ' ')
					),
                                    'htmlOptions'=>$htmlOptions,
				)
			)
		);
        
        //echo $form->textFieldGroup($model,'forma_pago_id',array('class'=>'span5')); 
        
        ?>
        <div id="linea_credito"></div>
	<?php echo $form->textAreaGroup($model,'observacion',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
