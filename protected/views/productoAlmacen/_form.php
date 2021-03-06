<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'producto-almacen-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block"><?php echo yii::t('app','Fields with') ;?> <span class="required">*</span> <?php echo yii::t('app','are required.') ;?></p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'almacen_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'producto_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'lote',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->datepickerGroup($model,'fecha_vencimiento',array('options'=>array(),'htmlOptions'=>array('class'=>'span5')),array('prepend'=>'<i class="icon-calendar"></i>','append'=>'Click on Month/Year at top to select a different year or type in (mm/dd/yyyy).')); ?>

	<?php echo $form->textFieldGroup($model,'cantidad_disponible',array('class'=>'span5')); ?>

	
<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
