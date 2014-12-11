<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'guia-remision-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block"><?php echo yii::t('app','Fields with') ;?> <span class="required">*</span> <?php echo yii::t('app','are required.') ;?></p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'remitente',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldGroup($model,'serie',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldGroup($model,'numero',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldGroup($model,'cliente_proveedor_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'motivo_traslado',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldGroup($model,'fecha_inicio_traslado',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'transportista_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'punto_partida',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldGroup($model,'punto_llegada',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldGroup($model,'marca_placa',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldGroup($model,'licencia_conducir',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldGroup($model,'estado_gr',array('class'=>'span5')); ?>



<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? yii::t('app','Create') : yii::t('app','Save'),
		)); ?>
</div>

<?php $this->endWidget(); ?>
