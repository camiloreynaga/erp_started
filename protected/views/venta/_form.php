<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'venta-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->datepickerGroup($model,'fecha_venta',array('options'=>array(),'htmlOptions'=>array('class'=>'span5')),array('prepend'=>'<i class="icon-calendar"></i>','append'=>'Click on Month/Year at top to select a different year or type in (mm/dd/yyyy).')); ?>

	<?php echo $form->textFieldGroup($model,'cliente_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'vendedor_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'forma_pago',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'pedido_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'base_imponible',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldGroup($model,'impuesto',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldGroup($model,'importe_total',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textAreaGroup($model,'observacion',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
