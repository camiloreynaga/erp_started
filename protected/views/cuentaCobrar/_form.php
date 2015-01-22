<script> //
        //actualiza la grila 
        function updateGrilla(data) {
                // refresh your grid
                $.fn.yiiGridView.update('cuenta-cobrar-grid');
        }
</script>

<?php
// llamando al script que hace la validación del form via ajax
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/validacionAjaxForm.js',CClientScript::POS_HEAD);
//$cs->registerCssFile($baseUrl.'/css/style.css');
?>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'dialogClassroom',
    'options'=>array(
        'title'=>'Registrar pago',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>550,
        'height'=>470,
    ),
));?>
    <div class="divForForm"></div>
<?php $this->endWidget(); ?>





<script type="text/javascript">
    function updateItem(url)
    {
        <?php echo CHtml::ajax(array(
            'url'=>'js:url',
            'data'=> "js:$('#cuenta-cobrar-form').serialize()",
            'type'=>'post',
            'dataType'=>'json',
            'success'=>"function(data)
            {
                if (data.status == 'failure')
                {
                    $('#dialogClassroom div.divForForm').html(data.div);
                          // Here is the trick: on submit-> once again this function!
                    //$('#dialogClassroom div.divForForm form').submit(updateItem);
                }
                else
                {
                    $('#dialogClassroom div.divForForm').html(data.div);
                    setTimeout(\"$('#dialogClassroom').dialog('close') \",3000);
                    $.fn.yiiGridView.update('cuenta-cobrar-grid');//update GRID!!! :D
                }

            } ",
            ))?>;
        return false;  
    }
    function loadForm()
    {

    }
        
    function clearForm()
    {
//        $('#s2id_DetalleOrdenCompra_producto_id').select2('data', null);//reset select2
//        $("#DetalleOrdenCompra_cantidad").val(null);//
//        $("#DetalleOrdenCompra_precio_unitario").val(null);//
//        $("#DetalleOrdenCompra_observacion").val(null);
    }
</script>    


<?php //$this->renderPartial('_partialForm',array('model'=>$model));?>
<div> 

    <?php 
$form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'cuenta-cobrar-form',
        'type'=>$model->isNewRecord?'inline':'vertical',
	'enableAjaxValidation'=>true,
        'clientOptions' =>array(
            'validateOnSubmit' => true,
            'validateOnChange' => false,
            'validateOnType' => false,
        )
)); 
?>

<p class="help-block"><?php echo yii::t('app','Fields with') ;?> <span class="required">*</span> <?php echo yii::t('app','are required.') ;?></p>

<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldGroup($model,'venta_id',array('class'=>'span5')); ?>

	<?php
        if($model->isNewRecord)
        echo $form->textFieldGroup($model,'monto',array('class'=>'span5','maxlength'=>10)); ?>
       
	<?php //echo $form->textFieldGroup($model,'estado',array('class'=>'span5')); ?>

        <?php 
        if($model->isNewRecord)
            echo $form->datepickerGroup($model,
                'fecha_vencimiento'
                ,array(
				'widgetOptions' => array(
					'options' => array(
                                           // 'language' => 'es',
                                           //'format'=>'dd/mm/yyyy',
                                            
                                            'format'=>'yyyy-mm-dd',
                                            //'starView'=>2,
                                            //'minViewMode'=>1,
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
        
        //else
          //   echo $form->textFieldGroup($model,'fecha_vencimiento',array('class'=>'span5','maxlength'=>10));
            //echo $form->datepickerGroup($model,'fecha_vencimiento',array('options'=>array(),'htmlOptions'=>array('class'=>'span5')),array('prepend'=>'<i class="icon-calendar"></i>','append'=>'Click on Month/Year at top to select a different year or type in (mm/dd/yyyy).')); ?>
                  

        
	<?php 
         if(!$model->isNewRecord)
//             echo $form->datepickerGroup($model,
//                'fecha_pago'
//                ,array(
//				'widgetOptions' => array(
//					'options' => array(
//                                           // 'language' => 'es',
//                                           //'format'=>'dd/mm/yyyy',
//                                            
//                                            'format'=>'yyyy-mm-dd',
//                                            //'starView'=>2,
//                                            //'minViewMode'=>1,
//                                            'autoclose'=>true,
//                                            'todayHighlight'=>true,
//                                            )
//				),
//				'wrapperHtmlOptions' => array(
//					'class' => 'col-sm-5',
//				),
//				'hint' => 'Ingrese fecha.',
//				'prepend' => '<i class="glyphicon glyphicon-calendar"></i>'
//			)
//		);
//         else
             echo $form->textFieldGroup($model,'fecha_pago',array('class'=>'span5','maxlength'=>10));
        //echo $form->datepickerGroup($model,'fecha_pago',array('options'=>array(),'htmlOptions'=>array('class'=>'span5')),array('prepend'=>'<i class="icon-calendar"></i>','append'=>'Click on Month/Year at top to select a different year or type in (mm/dd/yyyy).')); ?>
	
	<?php 
        if(!$model->isNewRecord)
                      echo $form->textFieldGroup($model,'medio_pago',array('class'=>'span5'));
        ?>

	<?php // echo $form->textFieldGroup($model,'descuento',array('class'=>'span5','maxlength'=>10)); ?>

        <?php 
        if($model->isNewRecord)
        {
        $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'ajaxSubmit',
			'context'=>'primary',
			//'label'=>$model->isNewRecord ? 'Create' : 'Save',
                        'url'=>CController::createUrl('CuentaCobrar/create',
                                array('pid'=>$model->venta_id)
                                ),
			'label'=> yii::t('app','Add'),//$orden_compra->isNewRecord ? 'Create' : 'Save',
                        //'id'=>'update',
                        'ajaxOptions'=>array(
                            'dataType'=>'json',
                            'type' => 'POST',
                            'data' => "js:$('#cuenta-cobrar-form').serialize()",
                            'success'=>'function(data){
                            if(data.status=="success")
                            {      
                                    updateGrilla(data);
                                    hideFormErrors(form="#cuenta-cobrar-form");
                                    //clearForm();
                                    
                            }else{
                                    formErrors(data,form="#cuenta-cobrar-form");
                            }
                            }',
                            )
		));
        }
        else
        {
                 $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? yii::t('app','Create') : yii::t('app','Save'),
		)); 
                 //$this->endWidget();
                ?>
            </div>
            <script type="text/javascript">
                $("#cuenta-cobrar-form").submit(
                    function(e){
                        e.preventDefault();
                        updateItem($("#cuenta-cobrar-form").attr('action'));
                        return false;
                 });
            </script>
        <?php } ?>

<div class="form-actions">
	
</div>
<?php $this->endWidget(); ?>

</div>

<?php             

$model->venta_id=isset($_GET['pid'])? $_GET['pid']: 0;
$this->widget('booster.widgets.TbExtendedGridView',array(
    'id'=>'cuenta-cobrar-grid',
    'type'=>'striped bordered',
    //'fixedHeader' => true,
    //'headerOffset' => 40,    
    'dataProvider'=>$model->search(),
    //'filter'=>$model,
    'columns'=>array(
            array(
           'class'=>'CCheckBoxColumn', // Checkboxes
           'selectableRows'=>1,        // Allow multiple selections 
           ),
          // 'id',
           'monto',
           'fecha_vencimiento',
           'fecha_pago',
           'medio_pago',
           array(
               'name'=>'estado',
               'value'=>'$data->_estado[$data->estado]'
           ),
           array(
               'header'=>'Acción',
               'class'=>'booster.widgets.TbButtonColumn',
               'template'=>'{pay}',
               'buttons'=>array(
                   'pay'=>
                       array(
                           'label'=>'<i class="glyphicon glyphicon-usd"></i>',
                           'url'=>'Yii::app()->createUrl("cuentaCobrar/update", array("id"=>$data->id))',
//                                                'options'=>array(
//                                                   
//                                                ),

//                                                'click'=>"function(){
//                                                            $.fn.yiiGridView.update('cuenta-cobrar-grid', {
//                                                                type:'POST',
//                                                                url:$(this).attr('href'),
//                                                                success:function(data) {
//                                                                      $('#AjFlash').html(data).fadeIn().animate({opacity: 1.0}, 3000).fadeOut('slow');
//
//                                                                      $.fn.yiiGridView.update('cuenta-cobrar-grid');
//                                                                }
//                                                            })
//                                                            return false;
//                                                      }",
                           'click'=>'function(){updateItem($(this).attr("href")); $("#dialogClassroom").dialog("open");return false;}',
                           'options'=>array(
                              'title'=>'Pagar',
                              //'confirm'=>'Pagar ?',
                           ),
                       ),
               ),
           ),
        ),
)); 
?>
