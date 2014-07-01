<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldGroup($model,'id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'pedido_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'producto_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'cantidad',array('class'=>'span5')); ?>

		<?php echo $form->textAreaGroup($model,'observacion',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldGroup($model,'precio_unitario',array('class'=>'span5','maxlength'=>10)); ?>

		<?php echo $form->textFieldGroup($model,'subtotal',array('class'=>'span5','maxlength'=>10)); ?>

		<?php echo $form->textFieldGroup($model,'impuesto',array('class'=>'span5','maxlength'=>10)); ?>

		<?php echo $form->textFieldGroup($model,'total',array('class'=>'span5','maxlength'=>10)); ?>

	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType' => 'submit',
			'context'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
