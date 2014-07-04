<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'detalle-cotizacion-compra-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'cotizacion_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'producto_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'cantidad',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'precio_unitario',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldGroup($model,'subtotal',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldGroup($model,'impuesto',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldGroup($model,'total',array('class'=>'span5','maxlength'=>10)); ?>

	

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
