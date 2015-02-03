<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'serie-numero-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block"><?php echo yii::t('app','Fields with');?> <span class="required">*</span> <?php echo yii::t('app','are required.') ;?></p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'serie',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10)))); ?>

	<?php echo $form->textFieldGroup($model,'numero',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10)))); ?>
        <?php echo $form->dropDownListGroup(
			$model,
			'comprobante_id',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
					'data' => CHtml::listData (TipoComprobante::model()->getTiposComprobante(), "id","comprobante"),// array('Something ...', '1', '2', '3', '4', '5'),
					'htmlOptions' => array(),
				)
			)
		); 
        ?>
        <?php echo $form->dropDownListGroup(
			$model,
			'punto_venta_id',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
					'data' => CHtml::listData (PuntoVenta::model()->getPunto_venta(), "id","text"),// array('Something ...', '1', '2', '3', '4', '5'),
					'htmlOptions' => array(),
				)
			)
		); 
        ?>
	<?php //echo $form->textFieldGroup($model,'comprobante_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php //echo $form->textFieldGroup($model,'punto_venta_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? yii::t('app','Create') : yii::t('app','Save'),
		)); ?>
</div>

<?php $this->endWidget(); ?>
