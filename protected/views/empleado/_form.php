<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'empleado-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'nombre',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldGroup($model,'ap_paterno',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldGroup($model,'ap_materno',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldGroup($model,'doc_identidad',array('class'=>'span5','maxlength'=>10)); ?>
        
         <?php
        echo $form->select2Group(
			$model,
			'cargo_id',
                      
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
                                    
                                    'asDropDownList' => true,
                                    'data'      => CHtml::listData (Cargo::model()->getCargos(), "id","cargo"),
					'options' => array(
						'placeholder' =>'Seleccione Cargo', 
					),
				)
			)
		);
        ?>
        
	<?php echo $form->textFieldGroup($model,'direccion',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldGroup($model,'telefono',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldGroup($model,'movil',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->datepickerGroup($model,'fecha_nacimiento',array('options'=>array(),'htmlOptions'=>array('class'=>'span5')),array('prepend'=>'<i class="icon-calendar"></i>','append'=>'Click on Month/Year at top to select a different year or type in (mm/dd/yyyy).')); ?>
        
       

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
