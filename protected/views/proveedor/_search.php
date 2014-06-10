<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldGroup($model,'id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'nombre_rz',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldGroup($model,'ruc',array('class'=>'span5','maxlength'=>11)); ?>

		<?php echo $form->textFieldGroup($model,'contacto',array('class'=>'span5','maxlength'=>100)); ?>

		<?php echo $form->textFieldGroup($model,'direccion',array('class'=>'span5','maxlength'=>100)); ?>

		<?php echo $form->textFieldGroup($model,'ciudad',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldGroup($model,'telefono',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldGroup($model,'linea_credito',array('class'=>'span5','maxlength'=>10)); ?>

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
