<?php
/* @var $this CaracteristicaProductoController */
/* @var $model CaracteristicaProducto */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'caracteristica-producto-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'producto_id'); ?>
		<?php echo $form->textField($model,'producto_id'); ?>
		<?php echo $form->error($model,'producto_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'caracteristica_id'); ?>
		<?php echo $form->dropDownList($model,'caracteristica_id',CHtml::listData(Producto::model()->getCaracteristicaOptions(),'id','caracteristica')); ?>
		<?php echo $form->error($model,'caracteristica_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'valor'); ?>
		<?php echo $form->textField($model,'valor'); ?>
		<?php echo $form->error($model,'valor'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->