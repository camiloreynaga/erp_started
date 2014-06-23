<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldGroup($model,'id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'nombre',array('class'=>'span5','maxlength'=>100)); ?>

		<?php echo $form->textAreaGroup($model,'descripcion',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldGroup($model,'tipo_producto_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'presentacion_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'unidad_medida_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'fabricante_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'minimo_stock',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'stock',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'descontinuado',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'precio',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'ventaUnd',array('class'=>'span5')); ?>

		<?php echo $form->textAreaGroup($model,'observacion',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

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
