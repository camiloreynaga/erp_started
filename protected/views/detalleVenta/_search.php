<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldGroup($model,'id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'venta_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'producto_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'cantidad',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'precio_unitario',array('class'=>'span5','maxlength'=>10)); ?>

		<?php echo $form->textFieldGroup($model,'subtotal',array('class'=>'span5','maxlength'=>10)); ?>

		<?php echo $form->textFieldGroup($model,'impuesto',array('class'=>'span5','maxlength'=>10)); ?>

		<?php echo $form->textFieldGroup($model,'total',array('class'=>'span5','maxlength'=>10)); ?>

		<?php echo $form->textFieldGroup($model,'lote',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->datepickerGroup($model,'fecha_vencimiento',array('options'=>array(),'htmlOptions'=>array('class'=>'span5')),array('prepend'=>'<i class="icon-calendar"></i>','append'=>'Click on Month/Year at top to select a different year or type in (mm/dd/yyyy).')); ?>

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
