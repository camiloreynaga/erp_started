<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'pedido-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->datepickerGroup($model,'fecha_pedido',array('options'=>array(),'htmlOptions'=>array('class'=>'span5')),array('prepend'=>'<i class="icon-calendar"></i>','append'=>'Click on Month/Year at top to select a different year or type in (mm/dd/yyyy).')); ?>

	<?php echo $form->textFieldGroup($model,'cliente_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'vendedor_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'cotizacion_id',array('class'=>'span5')); ?>

	<?php echo $form->textAreaGroup($model,'observaciones',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldGroup($model,'estado',array('class'=>'span5')); ?>

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
