<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldGroup($model,'id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'guia_remision_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'producto_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'descripcion',array('class'=>'span5','maxlength'=>100)); ?>

		<?php echo $form->textFieldGroup($model,'cantidad',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'unidad_medida',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'peso',array('class'=>'span5','maxlength'=>10)); ?>

	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType' => 'submit',
			'context'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
