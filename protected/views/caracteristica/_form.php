<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'caracteristica-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block"><?php echo yii::t('app','Fields with') ;?> <span class="required">*</span> <?php echo yii::t('app','are required.') ;?></p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'caracteristica',array('class'=>'span5','maxlength'=>50)); ?>

	
<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
                        'htmlOptions'=>array(
                            'confirm'=>'Esta seguro de proceder?',
                        )
		)); ?>
</div>

<?php $this->endWidget(); ?>
