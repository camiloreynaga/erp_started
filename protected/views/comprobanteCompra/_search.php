<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldGroup($model,'id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'compra_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'tipo_comprobante_id',array('class'=>'span5')); ?>

		<?php echo $form->datepickerGroup($model,'fecha_emision',array('options'=>array(),'htmlOptions'=>array('class'=>'span5')),array('prepend'=>'<i class="icon-calendar"></i>','append'=>'Click on Month/Year at top to select a different year or type in (mm/dd/yyyy).')); ?>

		<?php echo $form->datepickerGroup($model,'fecha_cancelacion',array('options'=>array(),'htmlOptions'=>array('class'=>'span5')),array('prepend'=>'<i class="icon-calendar"></i>','append'=>'Click on Month/Year at top to select a different year or type in (mm/dd/yyyy).')); ?>

		<?php echo $form->textFieldGroup($model,'serie',array('class'=>'span5','maxlength'=>5)); ?>

		<?php echo $form->textFieldGroup($model,'numero',array('class'=>'span5','maxlength'=>10)); ?>

		<?php echo $form->textFieldGroup($model,'estado',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'guia_remision_remitente',array('class'=>'span5','maxlength'=>15)); ?>

		<?php echo $form->textFieldGroup($model,'guia_remision_transportista',array('class'=>'span5','maxlength'=>15)); ?>

		<?php echo $form->textFieldGroup($model,'create_time',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'create_user_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'update_time',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'update_user_id',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType' => 'submit',
			'context'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
