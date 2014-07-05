<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'forma-pago-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'forma_pago',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldGroup($model,'activo',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'create_time',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'create_user_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'update_time',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'update_user_id',array('class'=>'span5')); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
