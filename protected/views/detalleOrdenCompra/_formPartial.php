<?php 
$form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'detalle-orden-compra',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('class' => 'well'),
        'clientOptions' =>array(
            'validateOnSubmit' => true,
            'validateOnChange' => false,
            'validateOnType' => false
            ))); ?>
<p class="help-block"><?php echo yii::t('app','Fields with');?> <span class="required">*</span> <?php echo yii::t('app','are required.')?></p>
<?php 
        echo $form->errorSummary($model); 
        if($model->isNewRecord)
        {
        echo $form->select2Group($model,'producto_id',
                array(
                    'wrapperHtmlOptions' => array('class' => 'col-sm-5'),
                    'widgetOptions' => array(
                        'asDropDownList' => true,
                        'data'=> CHtml::listData(Producto::model()->getProductos(), "id","text"),
                        'options' => array(
                            'placeholder' =>yii::t('app','Select product'),
                            'tokenSeparators' => array(',', ' ')
                            ))));
         }
        else
        {
            echo $model->r_producto->nombre; //$form->dropDownList($model,'producto_id',$data,array('prompt'=>'--Seleccione--'));
        }
	echo $form->textFieldGroup($model,'cantidad',array('class'=>'span5'));
        echo $form->textFieldGroup($model,'precio_unitario',array('class'=>'span5'));
        echo $form->textAreaGroup($model,'observacion');?>

<div class="form-actions">
    <?php 
     $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); 
     $this->endWidget();
    ?>
</div>
<script type="text/javascript">
    $("#detalle-orden-compra").submit(
        function(e){
            e.preventDefault();
            updateItem($("#detalle-orden-compra").attr('action'));
     });
</script>
    