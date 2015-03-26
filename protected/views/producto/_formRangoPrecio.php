<script> //
        //actualiza la grila 
        function updateGrilla(data) {
                // refresh your grid
                $.fn.yiiGridView.update('rango-precio-grid');
        }
</script>


<?php 
//seteando el valor de id producto
$model->producto_id=$product_id;

?>

<?php


// llamando al script que hace la validación del form via ajax
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/validacionAjaxForm.js',CClientScript::POS_HEAD);
//$cs->registerCssFile($baseUrl.'/css/style.css');
?>

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'rango-precio-form',
	'enableAjaxValidation'=>true,
        'clientOptions' =>array(
            'validateOnSubmit' => true,
            'validateOnChange' => false,
            'validateOnType' => false,
        )
)); ?>

<p class="help-block"><?php echo yii::t('app','Fields with');?> <span class="required">*</span> <?php echo yii::t('app','are required.') ;?></p>

<?php 

echo $form->errorSummary($model); ?>

<div style="width: 100%">
    <div style="float: left">
        <?php 
        echo $form->select2Group(
			$model,
			'unidad_medida_id',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
                                
				'widgetOptions' => array(
				'asDropDownList' => true,
                                    'data'      => CHtml::listData(Producto::model()->getUndMedidaOptions(),'id','unidad_medida'),
					'options' => array(
						//'tags' => array('clever', 'is', 'better', 'clevertech'),
						'placeholder' => 'eliga por favor.',
						/* 'width' => '40%', */
						//'tokenSeparators' => array(',', ' ')
					)
				)
			)
		);
        ?>
    </div> 
    <div style="width: 2.5%; float: left"> &nbsp </div>
    <div style="width: 15%; float: left">
        <?php echo $form->textFieldGroup($model,'cantidad_inicial',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

    </div>
    <div style="width: 2.5%; float: left"> &nbsp </div>
    <div style="width: 15%; float: left">
        <?php echo $form->textFieldGroup($model,'cantidad_final',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

    </div>
    
    <div style="width: 2.5%; float: left"> &nbsp </div>
    <div style="width: 15%; float: left">
        <?php echo $form->textFieldGroup($model,'precio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10)))); ?>

    </div>
    <div style="width: 2.5%; float: left"> &nbsp </div>
    
        <div class="form-actions">
                <?php $this->widget('booster.widgets.TbButton', array(
                                'buttonType'=>'ajaxSubmit',
                                'context'=>'primary',
                                'url'=>CController::createUrl('rangoPrecio/create',
                                        array('id'=>$model->producto_id)
                                        ),
                                'label'=>yii::t('app','Add'),
                                'ajaxOptions'=>array(
                                    'dataType'=>'json',
                                    'type'=>'POST',
                                    'data'=>"js:$('#rango-precio-form').serialize()",
                                    'success'=>'function(data){
                                        if(data.status=="success")
                                        {
                                            window.location.reload();
                                            updateGrilla(data);
                                            hideFormErrors(form="#rango-precio-form");

                                        }
                                        else
                                        {
                                            formErrors(data,form="#rango-precio-form");
                                        }
                                    }
                                    ',
                                    
                                )
                    
                        )); ?>
        </div>
    
</div>
<?php $this->endWidget(); ?>

<div>

<?php             

//$model->producto_id=isset($_GET['pid'])? $_GET['pid']: 0;

$this->widget('booster.widgets.TbExtendedGridView',array(
    'id'=>'rango-precio-grid',
    'type'=>'striped bordered',
    //'fixedHeader' => true,
    //'headerOffset' => 40,    
    'dataProvider'=>$model->search(),
    //'filter'=>$model,
    'columns'=>array(
           array(
                    'name'=>'unidad_medida_id',
                    'header'=>'Medida',
                    'value'=>'isset($data->r_unidadMedida->unidad_medida)?$data->r_unidadMedida->unidad_medida:null'
                ),
           'cantidad_inicial',
           'cantidad_final',
           'precio',
            array(
                'class'=>'booster.widgets.TbButtonColumn',
                'template'=>'{delete}',
                'buttons'=>array(
                    'delete'=>array(
                        'url'=>'Yii::app()->createUrl("RangoPrecio/Delete", array("id"=>$data->id))',
                         
                    ),
                ),    
                 
                ),
           
        ),
)); 
?>
</div>