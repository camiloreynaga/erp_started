<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'unidad-medida-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block"><?php echo yii::t('app','Fields with');?> <span class="required">*</span> <?php echo yii::t('app','are required.') ;?></p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'unidad_medida',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>

	<?php echo $form->textFieldGroup($model,'nonmenclatura',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10)))); ?>

	<?php echo $form->textFieldGroup($model,'cantidad_equivalente',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10)))); ?>

	<?php // echo $form->textFieldGroup($model,'unidad_equivalente',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
        
        <?php 
         echo $form->select2Group(
			$model,
			'unidad_equivalente',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
                                
				'widgetOptions' => array(
				'asDropDownList' => true,
                                    'data'      => CHtml::listData(Producto::model()->getUndMedidaOptions(),'id','unidad_medida'),
					'options' => array(
						//'tags' => array('clever', 'is', 'better', 'clevertech'),
						'placeholder' => 'elija por favor.',
						/* 'width' => '40%', */
						//'tokenSeparators' => array(',', ' ')
					)
				)
			)
		);
        ?>
	<?php 
        
            echo $form->switchGroup($model,'activo',
                array('class'=>'span5',
                        'widgetOptions'=>array(
                            'options'=>array(
                                'size'=>'small',
                                'onText'=>yii::t('app','NO'),
                                'offText'=>yii::t('app','SI'),
                                'onColor' => 'danger',
                                'offColor' => 'primary', 
                                )
                        )
                    )
                );
        ?>


<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? yii::t('app','Create') : yii::t('app','Save'),
		)); ?>
</div>

<?php $this->endWidget(); ?>
