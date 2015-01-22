<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cuenta-form',
	'enableAjaxValidation'=>true,
            'clientOptions' =>array(
            'validateOnSubmit' => true,
            'validateOnChange' => false,
            'validateOnType' => false
            )
)); ?>
	<p class="note"><?php echo yii::t('app','Fields with') ;?> <span class="required">*</span><?php echo yii::t('app','are required.') ;?></p>
   
	<?php echo $form->errorSummary($model); ?>
   
        <div class="row">
		<?php echo $form->labelEx($model,'monto',array('style'=>'padding-right:75px;float:left;')); ?>
                <?php echo Chtml::encode($model->monto); ?>
		<?php //echo $form->textField($model,'monto'); ?>
		<?php echo $form->error($model,'monto'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'fecha_vencimiento',array('style'=>'padding-right:75px;float:left;')); ?>
                <?php echo Chtml::encode($model->fecha_vencimiento); ?>
		<?php //echo $form->textField($model,'fecha_vencimiento'); ?>
		<?php echo $form->error($model,'fecha_vencimiento'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'fecha_pago',array('style'=>'float:left;padding-right:15px;')); ?>
		<?php //echo CHtml::encode($model->fecha_compra);
                      //echo $form->hiddenField($model,'fecha_compra');
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model'=>$model,
                            'attribute'=>'fecha_pago',
                            'options'=>array(
                                'showAnim'=>'fold',
                                'dateFormat'=>'yy-mm-dd'
                                //'language'=>'es',
                            ),
                            'htmlOptions'=>array(
                                'style'=>'height:20px;'
                            ),
                        ));
                ?>
		<?php echo $form->error($model,'fecha_pago'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'medio_pago',array('style'=>'float:left;padding-right:15px;')); ?>
                <?php echo $form->textField($model,'medio_pago'); ?>
		<?php echo $form->error($model,'medio_pago'); ?>
	</div>
    
	
        
        
	<div class="row buttons" style="clear:both">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear compra' : 'Guardar cambios'); ?>
	</div>
        <script type="text/javascript">
                $("#cuenta-form").submit(
                    function(e){
                        e.preventDefault();
                        updateItem($("#cuenta-form").attr('action'));
                        return false;
                 });
            </script>
<?php $this->endWidget(); ?>

</div><!-- form -->