<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'tipo-comprobante-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'comprobante',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldGroup($model,'codigo_comprobante',array('class'=>'span5','maxlength'=>5)); ?>

	

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>