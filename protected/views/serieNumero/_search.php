<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldGroup($model,'id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'serie',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10)))); ?>

		<?php echo $form->textFieldGroup($model,'numero',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10)))); ?>

		<?php echo $form->textFieldGroup($model,'comprobante_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'punto_venta_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType' => 'submit',
			'context'=>'primary',
			'label'=>yii::t('app','Search'),
		)); ?>
	</div>

<?php $this->endWidget(); ?>
