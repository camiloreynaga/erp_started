<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'currency-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block"><?php echo yii::t('app','Fields with');?> <span class="required">*</span> <?php echo yii::t('app','are required.') ;?></p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'currency',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>

	<?php echo $form->textFieldGroup($model,'symbol',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>5)))); ?>

	<?php echo $form->textFieldGroup($model,'iso_code',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>5)))); ?>

	<?php echo $form->textFieldGroup($model,'create_time',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'create_user_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'update_time',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'update_user_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? yii::t('app','Create') : yii::t('app','Save'),
		)); ?>
</div>

<?php $this->endWidget(); ?>
