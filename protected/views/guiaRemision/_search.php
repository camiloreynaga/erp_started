<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldGroup($model,'id',array('class'=>'span5')); ?>

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
