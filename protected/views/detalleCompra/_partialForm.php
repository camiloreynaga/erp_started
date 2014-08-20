<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>$model->isNewRecord?'detalle-compra-form':'detalle-form',
	'enableAjaxValidation'=>true,
        'clientOptions' =>array(
            'validateOnSubmit' => true,
            'validateOnChange' => false,
            'validateOnType' => false,

        )
)); ?>

<p class="help-block"><?php echo yii::t('app','Fields with') ;?>  <span class="required">*</span> <?php echo yii::t('app','are required.') ;?></p>



<?php 
echo $form->errorSummary($model);
$data=CHtml::listData(Producto::model()->getProductosStock(), "id","text");
if($model->isNewRecord)
{
        echo $form->select2Group(
                $model,'producto_id',
                array(
                    'wrapperHtmlOptions' => array('class' => 'col-sm-5'),
                    'widgetOptions' => array(
                        'asDropDownList' => true,
                        'data'=> $data,
                        'options' => array(
                            'placeholder' =>'Seleccione producto', 
                            'tokenSeparators' => array(',', ' ')
                ))));
}
else
{
    echo $form->dropDownList($model,'producto_id',$data,array('prompt'=>'--Seleccione--'));
}
        ?>

	<?php echo $form->textFieldGroup($model,'cantidad',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'lote',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->datepickerGroup($model,
                'fecha_vencimiento'
                ,array(
				'widgetOptions' => array(
					'options' => array(
                                           // 'language' => 'es',
                                           //'format'=>'dd/mm/yyyy',
                                            
                                            'format'=>'yyyy-mm-dd',
                                            'starView'=>2,
                                            'minViewMode'=>1,
                                            'autoclose'=>true,
                                            'todayHighlight'=>true,
                                            )
				),
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'hint' => 'Ingrese fecha.',
				'prepend' => '<i class="glyphicon glyphicon-calendar"></i>'
			)
		);
        ?>

	<?php echo $form->textFieldGroup($model,'cantidad_bueno',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'cantidad_malo',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldGroup($model,'estado',array('class'=>'span5')); ?>

	<?php echo $form->textAreaGroup($model,'observacion',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldGroup($model,'precio_unitario',array('class'=>'span5','maxlength'=>10)); ?>

	<?php 
        if($model->isNewRecord)
        {?>
            <div class="form-actions"> <?php
            $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'ajaxSubmit',
			'context'=>'primary',
                        'url'=>CController::createUrl('detalleCompra/create',
                                array('pid'=>$model->compra_id)
                                ),
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
                        'id'=>'update',
                        'ajaxOptions'=>array(
                            'dataType'=>'json',
                            'type' => 'POST',
                            'data' => "js:$('#detalle-compra-form').serialize()",
                            'success'=>'function(data){
                            if(data.status=="success")
                            {      
                                    updateGrilla(data);
                                    hideFormErrors(form="#detalle-compra-form");
                                    //callback(status=data.status);
                                    
                            }else{
                                    formErrors(data,form="#detalle-compra-form");
                            }
                            }',
                            )
		)); 
        ?></div> <?php
                 $this->endWidget();
        }
        else
        {
                 $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); 
                 $this->endWidget();
                ?>
            </div>
            <script type="text/javascript">
                $("#detalle-form").submit(
                    function(e){
                        e.preventDefault();
                        updateItem($("#detalle-form").attr('action'));
                        return false;
                 });
            </script>
        <?php } ?>