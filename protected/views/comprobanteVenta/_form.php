<?php
// llamando al script que hace la validación del form via ajax
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/validacionAjaxForm.js',CClientScript::POS_HEAD);
//$cs->registerCssFile($baseUrl.'/css/style.css');
?>

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'comprobante-venta-form',
	'enableAjaxValidation'=>true,
        'clientOptions' =>array(
            'validateOnSubmit' => true,
            'validateOnChange' => false,
            'validateOnType' => false,
        )
)); ?>



<p class="help-block"><?php echo yii::t('app','Fields with') ;?> <span class="required">*</span> <?php echo yii::t('app','are required.') ;?></p>

<?php echo $form->errorSummary($model); ?>

	<?php 
        echo $form->hiddenField($model,'venta_id',array(
            'value'=>$_GET['id'],
        )); 

         ?>

	<?php // echo $form->textFieldGroup($model,'tipo_comprobante_id',array('class'=>'span5')); ?>

	<?php // echo $form->datepickerGroup($model,'fecha_emision',array('options'=>array(),'htmlOptions'=>array('class'=>'span5')),array('prepend'=>'<i class="icon-calendar"></i>','append'=>'Click on Month/Year at top to select a different year or type in (mm/dd/yyyy).')); ?>

	<?php //echo $form->datepickerGroup($model,'fecha_cancelacion',array('options'=>array(),'htmlOptions'=>array('class'=>'span5')),array('prepend'=>'<i class="icon-calendar"></i>','append'=>'Click on Month/Year at top to select a different year or type in (mm/dd/yyyy).')); ?>

	<?php echo $form->textFieldGroup($model,'serie',array(
                'widgetOptions' => array(
                    'htmlOptions' => array(
                        'value'=>'101',
                        //'disabled' => true
                        )
				),
                
                'class'=>'span5','maxlength'=>5)); ?>

	<?php 
        echo $form->textFieldGroup($model,'numero',
                array(
                    'widgetOptions' => array(
                    'htmlOptions' => array(
                       // 'value'=> ,
                        )
				),
                    'class'=>'span5','maxlength'=>10)); ?>

	<?php //echo $form->textFieldGroup($model,'estado',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldGroup($model,'guia_remision_remitente',array('class'=>'span5','maxlength'=>15)); ?>

	<?php //echo $form->textFieldGroup($model,'guia_remision_transportista',array('class'=>'span5','maxlength'=>15)); ?>

	

<div class="form-actions">
    <?php
            $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'ajaxSubmit',
			'context'=>'primary',
                        'url'=>CController::createUrl('comprobanteVenta/create',
                                array(
                                    //'id'=>$model->venta_id
                                    )
                                ),
			'label'=> yii::t('app','Save' ) ,
                        
                        'ajaxOptions'=>array(
                            'dataType'=>'json',
                            'type' => 'POST',
                            'data' => "js:$('#comprobante-venta-form').serialize()",
                            'success'=>'function(data){
                            if(data.status=="success")
                            {      
                                    //updateGrilla(data);
                                    hideFormErrors(form="#comprobante-venta-form");
                                    //callback(status=data.status);
                                    
                            }else{
                                    formErrors(data,form="#comprobante-venta-form");
                            }
                            }',
                            )
		)); 
        ?>

</div>

<?php $this->endWidget(); ?>
