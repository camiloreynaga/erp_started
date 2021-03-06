<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldGroup($model,'id',array('class'=>'span5')); ?>

		<?php echo $form->datepickerGroup($model,'fecha_movimiento',array('options'=>array(),'htmlOptions'=>array('class'=>'span5')),array('prepend'=>'<i class="icon-calendar"></i>','append'=>'Click on Month/Year at top to select a different year or type in (mm/dd/yyyy).')); ?>

		<?php echo $form->textFieldGroup($model,'producto_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'cantidad',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'motivo_movimiento_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'detalle_compra_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'detalle_venta_id',array('class'=>'span5')); ?>

		<?php echo $form->textAreaGroup($model,'observacion',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldGroup($model,'almacen_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'saldo_stock',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'operacion',array('class'=>'span5')); ?>

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
