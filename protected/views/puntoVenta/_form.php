<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'punto-venta-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block"><?php echo yii::t('app','Fields with');?> <span class="required">*</span> <?php echo yii::t('app','are required.') ;?></p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'punto_venta',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>

	<?php // echo $form->textFieldGroup($model,'tipo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
        <?php 
//        echo $form->dropDownListGroup(
//			$model,
//			'tipo',
//			array(
//				'wrapperHtmlOptions' => array(
//					'class' => 'col-sm-5',
//				),
//				'widgetOptions' => array(
//					'data' => array($model->_tipo[0],$model->_tipo[1]),// array('Something ...', '1', '2', '3', '4', '5'),
//					'htmlOptions' => array(),
//				)
//			)
//		); 
        ?>
         <?php
         echo $form->switchGroup($model,'tipo',
                array('class'=>'span5',
                        'widgetOptions'=>array(
                            'options'=>array(
                                'size'=>'small',
                                'onText'=>$model->_tipo[1],//'MOVIL',
                                'offText'=>$model->_tipo[0],
                                'onColor' => 'danger',
                                'offColor' => 'primary', 
                                )
                    )
                )
                
                );
         ?>
	<?php echo $form->textAreaGroup($model,'observacion', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>

	<?php echo $form->textFieldGroup($model,'direccion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>

	<?php //echo $form->textFieldGroup($model,'activo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
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
                
                );?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? yii::t('app','Create') : yii::t('app','Save'),
		)); ?>
</div>

<?php $this->endWidget(); ?>
