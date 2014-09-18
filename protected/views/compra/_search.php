<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldGroup($model,'id',array('class'=>'span5')); ?>

		<?php echo $form->datepickerGroup($model,'fecha_compra',array('options'=>array(),'htmlOptions'=>array('class'=>'span5')),array('prepend'=>'<i class="icon-calendar"></i>','append'=>'Click on Month/Year at top to select a different year or type in (mm/dd/yyyy).')); ?>

		<?php echo $form->textFieldGroup($model,'proveedor_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'base_imponible',array('class'=>'span5','maxlength'=>10)); ?>

		<?php echo $form->textFieldGroup($model,'orden_compra_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'impuesto',array('class'=>'span5','maxlength'=>10)); ?>

		<?php echo $form->textFieldGroup($model,'importe_total',array('class'=>'span5','maxlength'=>10)); ?>

		<?php echo $form->textAreaGroup($model,'observacion',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldGroup($model,'estado',array('class'=>'span5')); ?>

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
