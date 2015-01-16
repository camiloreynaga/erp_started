<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block"><?php echo yii::t('app','Fields with');?> <span class="required">*</span> <?php echo yii::t('app','are required.') ;?></p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'username',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

	<?php echo $form->textFieldGroup($model,'email',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>
        
        <?php echo $form->passwordFieldGroup($model,'password',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>


        <?php echo $form->passwordFieldGroup($model,'password_repeat',array('class'=>'span5')); ?>
        

	
	<?php //echo $form->textFieldGroup($model,'empleado_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); 
        
        echo $form->select2Group(
                $model,
                'empleado_id',
                    array(
                         'wrapperHtmlOptions'=>array(
                             'class'=> 'col-sm-5',
                         ),
                        'widgetOptions'=>array(
                            'asDropDownList'=>true,
                            'data'=>  CHtml::listData(Empleado::model()->getEmpleados_sin_usuario(),'id','text'),
                            'options'=>array(
                                'placeholder'=>yii::t('app','Please select option.'),
                            )
                        )
                    )
                )
        
        ?>


<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? yii::t('app','Create') : yii::t('app','Save'),
		)); ?>
</div>

<?php $this->endWidget(); ?>
