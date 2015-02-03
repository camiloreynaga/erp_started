<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'almacen-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block"><?php echo yii::t('app','Fields with') ;?> <span class="required">*</span> <?php echo yii::t('app','are required.') ;?></p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'almacen',array('class'=>'span5','maxlength'=>50)); ?>
        
         <?php 
         
         //if($model->isNewRecord)
            echo $form->dropDownListGroup(
                           $model,
                           'punto_venta_id',
                           array(
                                   'wrapperHtmlOptions' => array(
                                           'class' => 'col-sm-5',
                                   ),
                                   'widgetOptions' => array(
                                           'data' => $model->IsNewRecord ? CHtml::listData(PuntoVenta::model()->getPunto_venta_almacen(), "id","text") : CHtml::listData(PuntoVenta::model()->getPunto_venta(), "id","text"),// array('Something ...', '1', '2', '3', '4', '5'),
                                           'htmlOptions' => array(),
                                   )
                           )
                   ); 
        ?>

	<?php echo $form->textFieldGroup($model,'direccion',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldGroup($model,'ubicacion_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'activo',array('class'=>'span5')); ?>

	

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
