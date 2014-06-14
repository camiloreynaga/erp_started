<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldGroup($model,'id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'nombre',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldGroup($model,'ap_paterno',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldGroup($model,'ap_materno',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldGroup($model,'doc_identidad',array('class'=>'span5','maxlength'=>10)); ?>

		<?php echo $form->textFieldGroup($model,'direccion',array('class'=>'span5','maxlength'=>100)); ?>

		<?php echo $form->textFieldGroup($model,'telefono',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldGroup($model,'movil',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->datepickerGroup($model,'fecha_nacimiento',array('options'=>array(),'htmlOptions'=>array('class'=>'span5')),array('prepend'=>'<i class="icon-calendar"></i>','append'=>'Click on Month/Year at top to select a different year or type in (mm/dd/yyyy).')); ?>

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
