<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'cliente-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block"><?php echo yii::t('app','Fields with') ;?> <span class="required">*</span> <?php echo yii::t('app','are required.') ;?></p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'nombre_rz',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldGroup($model,'ruc',array('class'=>'span5','maxlength'=>11)); ?>

	<?php echo $form->textFieldGroup($model,'contacto',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldGroup($model,'direccion',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldGroup($model,'ciudad',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldGroup($model,'telefono',array('class'=>'span5','maxlength'=>50)); ?>

	
	<?php echo $form->textFieldGroup($model,'linea_credito',array('class'=>'span5','maxlength'=>10)); ?>
        
        <?php echo $form->textFieldGroup($model,'credito_disponible',array('class'=>'span5','maxlength'=>10)); ?>
        
        <?php echo $form->switchGroup($model,'activo',
                array('class'=>'span5',
                        'widgetOptions'=>array(
                            'options'=>array(
                                'size'=>'small',
                                'onText'=>'NO',
                                'offText'=>'SI',
                                'onColor' => 'danger',
                                'offColor' => 'primary', 
                                )
                    )
                )
                
                );

// echo $form->textFieldGroup($model,'activo',array('class'=>'span5')); ?>


<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
