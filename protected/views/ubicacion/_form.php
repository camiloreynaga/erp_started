<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'ubicacion-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block"><?php echo yii::t('app','Fields with') ;?> <span class="required">*</span> <?php echo yii::t('app','are required.') ;?></p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'ubicacion',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldGroup($model,'activo',array('class'=>'span5')); ?>

	

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
