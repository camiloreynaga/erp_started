<?php
/* @var $this ProductoController */
/* @var $model Producto */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'producto-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_producto_id'); ?>
		<?php echo $form->dropDownList($model,'tipo_producto_id',CHtml::listData($model->getTipoOptions(),'id','tipo_producto')); ?>
		<?php echo $form->error($model,'tipo_producto_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'presentacion_id'); ?>
		<?php echo $form->dropDownList($model,'presentacion_id', CHtml::listData($model->getPresentacionOptions(),'id','presentacion'));?>
		<?php echo $form->error($model,'presentacion_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'unidad_medida_id'); ?>
		<?php echo $form->dropDownList($model,'unidad_medida_id',  CHtml::listData($model->getUndMedidaOptions(),'id','unidad_medida')); ?>
		<?php echo $form->error($model,'unidad_medida_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fabricante_id'); ?>
		<?php echo $form->dropDownList($model,'fabricante_id',CHtml::listData($model->getFabricanteOptions(),'id','fabricante')); ?>
		<?php echo $form->error($model,'fabricante_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'minimo_stock'); ?>
		<?php echo $form->textField($model,'minimo_stock'); ?>
		<?php echo $form->error($model,'minimo_stock'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'stock'); ?>
		<?php echo $form->textField($model,'stock'); ?>
		<?php echo $form->error($model,'stock'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descontinado'); ?>
		<?php echo $form->textField($model,'descontinado'); ?>
		<?php echo $form->error($model,'descontinado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'precio'); ?>
		<?php echo $form->textField($model,'precio'); ?>
		<?php echo $form->error($model,'precio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'observacion'); ?>
		<?php echo $form->textArea($model,'observacion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'observacion'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

<?php $this->renderPartial('//CaracteristicaProducto/_form',array('model'=>CaracteristicaProducto::model())) ?>        
        
</div><!-- form -->