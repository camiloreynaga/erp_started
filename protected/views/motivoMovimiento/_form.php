<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'motivo-movimiento-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'movimiento',array('class'=>'span5','maxlength'=>50)); ?>

	<?php 
        
        echo $form->switchGroup($model,'tipo_movimiento',
                array('class'=>'span5',
                        'widgetOptions'=>array(
                            'options'=>array(
                                'size'=>'large',
                                'onText'=>'Salida',
                                'offText'=>'Ingreso',
                                'onColor' => 'danger',
                                'offColor' => 'primary', 
                                ),
                            //'htmlOptions'=>$htmlOptions,
                    )
                )
                
                ); 
        
        //echo $form->textFieldGroup($model,'tipo_movimiento',array('class'=>'span5')); ?>

	

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
