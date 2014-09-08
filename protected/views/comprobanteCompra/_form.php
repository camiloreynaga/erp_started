<script> //
        //actualiza la grila 
        function updateGrilla(data) {
                // display data returned from action
                $("#Items").html(data);
                // refresh your grid
                $.fn.yiiGridView.update('comprobante-compra-grid');
                window.location.reload();
        }
       //muestra errores del form luego de la validación
        function formErrors(data,form){
        var summary = '';
        summary="<p>Please solve following errors:</p>";

        $.each(data, function(key, val) {
        $(form+" #"+key+"_em_").html(val.toString());
        $(form+" #"+key+"_em_").show();

        $("#"+key).parent().addClass("form-group");
        summary = summary + "<ul><li>" + val.toString() + "</li></ul>";
        });
        $(form+"_es_").html(summary.toString());
        $(form+"_es_").show();

        $("[id^='update-button']").show();
        $('#ajax-status').hide();//css({display:'none'});
        $('#ajax-status').text('');
        }
        
        //esconde los errores del form si la validación es correcta
        function hideFormErrors(form){
        //alert (form+"_es_");
        
        $(form+"_es_").html('');
        $(form+"_es_").hide();
        $("[id$='_em_']").html('');
        }
                
</script>


<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'comprobante-compra-form',
	'enableAjaxValidation'=>true,
        'clientOptions'=> array(
            'validateOnSubmit'=>true,
            'validateOnChange'=>false,
            'validateOnType'=>false,
        )
)); ?>

<p class="help-block"><?php echo yii::t('app','Fields with') ;?> <span class="required">*</span> <?php echo yii::t('app','are required.') ;?></p>

<?php echo $form->errorSummary($model); ?>

	<?php // echo $form->textFieldGroup($model,'compra_id',array('class'=>'span5')); ?>
        <?php echo $form->dropDownListGroup($model,'tipo_comprobante_id',
                //array('class'=>'span5'),
                array(
                    'widgetOptions'=>array(
                    'data'=>CHtml::listData(TipoComprobante::model()->getTiposComprobante(),'id','comprobante'),
                )
                )
                ); ?>
                <?php echo $form->datePickerGroup(
			$model,
			'fecha_emision',
			array(
				'widgetOptions' => array(
					'options' => array(
                                           // 'language' => 'es',
                                           //'format'=>'dd/mm/yyyy',
                                            'format'=>'yyyy-mm-dd',
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
		); ?>
	
	<?php 
        
        
        echo $form->datepickerGroup(
                $model,
                'fecha_cancelacion',
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
                        'hint' => 'Ingrese fecha o deje en blanco.',
                        'prepend' => '<i class="glyphicon glyphicon-calendar"></i>'
                    )
                ) ; ?>

	<?php echo $form->textFieldGroup($model,'serie',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldGroup($model,'numero',array('class'=>'span5','maxlength'=>10)); ?>

	<?php //echo $form->textFieldGroup($model,'estado',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'guia_remision_remitente',array('class'=>'span5','maxlength'=>15)); ?>

	<?php echo $form->textFieldGroup($model,'guia_remision_transportista',array('class'=>'span5','maxlength'=>15)); ?>

	

<div class="form-actions">

	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'ajaxSubmit',
			'context'=>'primary',
                        'url'=>CController::createUrl('comprobanteCompra/create',
                                array('pid'=>$model->compra_id)
                                ),
			'label'=>'Agregar',
                        'id'=>'update',
                        'ajaxOptions'=>array(
                            'dataType'=>'json',
                            'type' => 'POST',
                            'data' => "js:$('#comprobante-compra-form').serialize()",
                            'success'=>'function(data){
                            if(data.status=="success")
                            {      
                                    updateGrilla(data);
                                    hideFormErrors(form="#comprobante-compra-form");
                                    //callback(status=data.status);
                                    
                            }else{
                                    formErrors(data,form="#comprobante-compra-form");
                            }
                            }',
                            )
		)); ?>
</div>

<?php $this->endWidget(); ?>

<div id="Items"></div>
<?php $this->widget('booster.widgets.TbExtendedGridView',array(
        'id'=>'comprobante-compra-grid',
        'type'=>'striped bordered',
        'fixedHeader' => true,
        'dataProvider'=>$model->search(),
        
        //'filter'=>$model,
        'columns'=>array(
                        //'id',
                        //'compra_id',
                        array(
                            'name'=>'tipo_comprobante_id',
                            'header'=>'Tipo',
                            'value'=>'$data->r_tipoComprobante->comprobante'
                        ),
                        array(
                            'name'=>'fecha_emision',
                            'header'=>'F. Emision',
                            'class'=>'booster.widgets.TbEditableColumn',
                            'editable'=>array(
                                'type'=>'date',
                                'url'=>$this->createUrl('comprobanteCompra/editItem'),
                                'options'=>array(
                                    'language'=>Yii::app()->language,
                                    'datepicker' => array(
                                        'language' => Yii::app()->language,
                                    ),
                                ),
                                'format'=>'yyyy-mm-dd',
                                
                            ) 
                        ),
                        array(
                            'name'=>'fecha_cancelacion',
                            'header'=>'F. Cancelación',
                            'class'=>'booster.widgets.TbEditableColumn',
                            'editable'=>array(
                                'type'=>'date',
                                'url'=>$this->createUrl('comprobanteCompra/editItem'),
                                'options'=>array(
                                    'language'=>Yii::app()->language,
                                    'datepicker' => array(
                                        'language' => Yii::app()->language,
                                    ),
                                ),
                                'format'=>'yyyy-mm-dd',
                                
                            )
                        ),
                        array(
                            'name'=>'serie',
                            'header'=>'Serie',
                            'class'=>'booster.widgets.TbEditableColumn',
                            'editable'=>array(
                                'type'=>'text',
                                'url'=>$this->createUrl('comprobanteCompra/editItem'),
                                
                            )
                        ),
                        array(
                            'name'=>'numero',
                            'header'=>'Numero',
                            'class'=>'booster.widgets.TbEditableColumn',
                            'editable'=>array(
                                'type'=>'text',
                                'url'=>$this->createUrl('comprobanteCompra/editItem'),
                            )
                        ),
                        //'estado',
                        array(
                            'name'=>'guia_remision_remitente',
                            'header'=>'GR Remitente',
                            'class'=>'booster.widgets.TbEditableColumn',
                            'editable'=>array(
                                'type'=>'text',
                                'url'=>$this->createUrl('comprobanteCompra/editItem'),
                            )
                        ),
                        array(
                            'name'=>'guia_remision_transportista',
                            'header'=>'GR Transportista',
                            'class'=>'booster.widgets.TbEditableColumn',
                            'editable'=>array(
                                'type'=>'text',
                                'url'=>$this->createUrl('comprobanteCompra/editItem'),
                            )
                        ),
                        //'create_time',
                        //'create_user_id',
                        //'update_time',
                        //'update_user_id',
                        array(
                        'class'=>'booster.widgets.TbButtonColumn',
                        'template'=>'{delete}',
                        'buttons'=>array(
                            'delete'=>array(
                                'url'=>'Yii::app()->createUrl("comprobanteCompra/delete", array("id"=>$data->id))',
                            ),
                        ),
                        'deleteConfirmation'=>'Esta seguro de eliminar este item?',
                        'afterDelete'=>'function(link,success,data){ if(success) window.location.reload(); }',
                            
                            
                        ),
        ),
)); ?>

<?php //  echo CHtml::ajaxButton('Siguiente',array('ComprobanteCompra/finalizar',
//                     'id'=>$model->compra_id,
//                     ),
//                 array(
//                      'dataType'=>'json',
//                      'type' => 'post',
//                      'success'=>'
//                          function(data){
//                                if(data.status=="true")
//                                {
//                                   alert("ingresa comprobante");
//                                }
//                                else
//                                {
//                                    location.href="'.CController::createUrl('DetalleCompra/create',
//                                array('pid'=>$model->compra_id)
//                                ).'"}
//                                }
//                                '
//                     ),
//                     array(
//                         'confirm'=>'Esta seguro de proceder?'
//                     )
//                     
//                     );

?>
<div >
<br>    
<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'ajaxSubmit',
			'context'=>'success',
                        'url'=>CController::createUrl('comprobanteCompra/finalizar',
                                array('id'=>$model->compra_id)
                                ),
			'label'=>'Siguiente',
                        'ajaxOptions'=>array(
                            'dataType'=>'json',
                            'type' => 'POST',
                            //'data' => '',
                            'success'=>'function(data){
                                if(data.status=="true")
                             {
                                alert(" ingrese comprobante");
                             }
                             else
                                {
                                    location.href="'.CController::createUrl('DetalleCompra/create',
                                array('pid'=>$model->compra_id)
                                ).'"
                                }
                                
                             
                            }',  
                            ),
                            'htmlOptions'=>array(
                                'confirm'=>'Esta seguro de proceder?', 
                            )
                               
		)); ?>

</div>