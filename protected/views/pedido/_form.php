<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'pedido-form',
	'enableAjaxValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->datepickerGroup($model,'fecha_pedido',array('options'=>array(),'htmlOptions'=>array('class'=>'span5')),array('prepend'=>'<i class="icon-calendar"></i>','append'=>'Click on Month/Year at top to select a different year or type in (mm/dd/yyyy).')); ?>

	<?php 
        echo $form->select2Group(
			$model,
			'cliente_id',
                      
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
                                    
                                    'asDropDownList' => true,
                                    'data'      => CHtml::listData (Cliente::model()->getClientes(), "id","nombre_rz"),
					'options' => array(
						'placeholder' =>'Seleccione Cliente', 
                                                //'width' => '40%', 
						'tokenSeparators' => array(',', ' ')
					),
				)
			)
		);
        
       // echo $form->textFieldGroup($model,'cliente_id',array('class'=>'span5')); ?>

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
        
        //echo $form->textFieldGroup($model,'vendedor_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'cotizacion_id',array('class'=>'span5')); ?>

	<?php echo $form->textAreaGroup($model,'observaciones',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldGroup($model,'estado',array('class'=>'span5')); ?>



<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
