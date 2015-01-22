<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'empleado-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block"><?php echo yii::t('app','Fields with') ;?> <span class="required">*</span> <?php echo yii::t('app','are required.') ;?></p>

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

	<?php
//        echo $form->datepickerGroup($model,'fecha_nacimiento',
//                array(
//                    'options'=>array(),
//                    'htmlOptions'=>array('class'=>'span5')),
//                    array('prepend'=>'<i class="icon-calendar"></i>',
//                        'append'=>'Click on Month/Year at top to select a different year or type in (mm/dd/yyyy).')); 
        ?>
        
       <?php echo $form->datepickerGroup(
                $model,
                'fecha_nacimiento',
                array(
                    'widgetOptions'=> array(
                        'options'=>array(
                            //'language' => 'es',
                            //'format'=>'dd/mm/yyyy',
                             'format'=>'yyyy-mm-dd',
                             'autoclose'=>true,
                             'todayHighlight'=>true,
                            
                        ),
                       //'htmlOptions'=>array('class'=>'span5')
                        ),
                        'hint' => yii::t('app','Put date'),
                        'prepend' => '<i class="glyphicon glyphicon-calendar"></i>'
                    )
                ) ;
        
        ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? yii::t('app','Create') : yii::t('app','Save'),
		)); ?>
</div>

<?php $this->endWidget(); ?>
