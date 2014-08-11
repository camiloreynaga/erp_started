<script> //
        
//        "success"=>\'js:function(html){
//          jQuery("#pub\'.$row.\'")
//          .html((html>0)?"Unpublish":"Publish");
        
        function updateRow(data)
        {
            var row = $(this).parent().parent().parent();
            $.ajax({
            type: 'POST',
            data: data,
            url: jQuery(this).attr('href'),
            success: function(data, textStatus, jqXHR) {
 
                if (data == 'error') {
                    alert("Data has error(s)");
                } else {
                    //this code updates only the specific row
                    var dataT = $('tbody tr ',$(data));
                    row.html(dataT.html());
                    /////////////////////////////////////////
                    console.log(data);
                    console.log(textStatus);
                    console.log(jqXHR);
                }
            },
            error: function(textStatus, errorThrown) {
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
        return false;
        }
        
        
        //actualiza la grila 
        function updateGrilla(data) {
//                $.ajax({
//                    
//                type: 'POST',
//                data: data,
//                url: jQuery(this).attr('href'), 
//                success: function(data){
//                    if(data =='error'){
//                        alert("Data has error(s)");
//                    }
//                    else{
//                         $(".view").html(text);
//                        // $("#Items").html(data);
//                    }
//                        
//                }
//                })
                
                // display data returned from action
                //$("#Items").html(data);
               // $("#view").html(data);
                // refresh your grid
                $.fn.yiiGridView.update('detalle-orden-compra-grid');
                
        }
        //muestra errores del form luego de la validación
        function formErrors(data,form){
        var summary = '';
        summary="<p>Please solve following errors:</p>";

        $.each(data, function(key, val) {
        $(form+" #"+key+"_em_").html(val.toString());
        $(form+" #"+key+"_em_").show();

        $("#"+key).parent().addClass("form group");
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

<?php

    Yii::app()->clientScript->registerScript('search', "
    $('.add-button').click(function(){
    $('.search-form').toggle();
    return false;
    });
    $('.search-form form').submit(function(){
    $.fn.yiiGridView.update('detalle-compra-grid', {
    data: $(this).serialize()
    });
    return false;
    });
    ");
?>

<?php echo CHtml::link('Agregar Producto','#',array('class'=>'add-button btn')); //Advanced Search ?>
<div class="search-form" style="display:none">
<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'detalle-compra-form',
	'enableAjaxValidation'=>true,
        'clientOptions' =>array(
            'validateOnSubmit' => true,
            'validateOnChange' => false,
            'validateOnType' => false,

        )
)); ?>

<p class="help-block"><?php echo yii::t('app','Fields with');?>  <span class="required">*</span> <?php echo ' '.yii::t('app','are required.');?></p>



<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldGroup($model,'compra_id',array('class'=>'span5')); ?>

	<?php
        echo $form->select2Group(
			$model,
			'producto_id',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
                                    
                                    'asDropDownList' => true,
                                    //'data'      => CHtml::listData(Producto::model()->findAll('descontinuado=0'), "id","nombre"),
                                    'data'      => CHtml::listData(Producto::model()->getProductos(), "id","text"),
                                    'options' => array(
                                            'placeholder' =>'Seleccione producto', 
                                            //'tags'=>'de',
                                            //'width' => '40%', 
                                            'tokenSeparators' => array(',', ' ')
                                    ),
				)
			)
		);
        //echo $form->textFieldGroup($model,'producto_id',array('class'=>'span5')); ?>

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

	<?php //echo $form->textFieldGroup($model,'subtotal',array('class'=>'span5','maxlength'=>10)); ?>

	<?php //echo $form->textFieldGroup($model,'impuesto',array('class'=>'span5','maxlength'=>10)); ?>

	<?php //echo $form->textFieldGroup($model,'total',array('class'=>'span5','maxlength'=>10)); ?>


<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
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
		)); ?>
</div>

<?php $this->endWidget(); ?>
</div>

<div id="Items"></div>

    <?php 
        
    $this->widget('booster.widgets.TbExtendedGridView',array(
                'id'=>'detalle-orden-compra-grid',
                'type'=>'striped bordered',
                'fixedHeader' => true,
                'headerOffset' => 40,
                //'responsiveTable' => true,
                'dataProvider'=>$model->search(),
                 'selectableRows' => 2,


                'columns'=>array(

                                 array(
                                'class'=>'CCheckBoxColumn', // Checkboxes
                                'selectableRows'=>2,        // Allow multiple selections 
                                ),
                               // 'id',
                               // 'orden_compra_id',
                                //'cotizacion_id',
    //                            array(
    //                                //'name'=>'producto_id',
    //                                'header'=>'laboratorio',
    //                                'value'=>'$data->r_producto->r_fabricante->fabricante', 
    //                            ),
                                array(
                                    'name'=>'producto_id',
                                    'header'=>'Producto',
                                    'value'=>'$data->r_producto->nombre', 
                                ),
                                array(
                                    'name'=>'presentacion_id',
                                    'header'=>'Present.',
                                    'value'=>'$data->r_producto->r_presentacion->presentacion'
                                ),
                               
                                array(
                                'name' => 'cantidad',
                                'header' => 'Cant.',
                                'class' => 'booster.widgets.TbEditableColumn',
                                //'headerHtmlOptions' => array('style' => 'width:200px'),

                                'editable' => array(
                                    'type' => 'text',
                                    'url' => $this->createUrl('detalleCompra/editCantidad'),
                                    //'options'=>array('class'=>'save-ajax-button'),
                                    //'placement' => 'left',
                                    'success'=>'updateGrilla',
                                                                        
                                    //'success'=>'function(link,success,data){ if(success) window.location.reload();',
                                    )
                                ),
                                array(
                                'name' => 'lote',
                                'header' => 'Lote',
                                'class' => 'booster.widgets.TbEditableColumn',
                                //'headerHtmlOptions' => array('style' => 'width:200px'),

                                'editable' => array(
                                    'type' => 'text',
                                    'url' => $this->createUrl('detalleCompra/editItem'),
                                    //'success'=>'updateGrilla'
                                    //'success'=>'function(link,success,data){ if(success) window.location.reload();',
                                    )
                                ),
                                //'lote',
                                array(
                                'name' => 'fecha_vencimiento',
                                'header' => 'F.V.',
                                'class' => 'booster.widgets.TbEditableColumn',
                                'editable' => array(
                                    'type' => 'combodate',
                                    'url' => $this->createUrl('detalleCompra/editItem'),
                                    //'format'      => 'Y-m-d',//'YYYY-MM-DD', //in this format date sent to server  
                                    'viewformat'  => 'MM-YYYY', //in this format date is displayed
                                    'template'    => 'MM / YYYY', //template for dropdowns
//                                    'options'     => array(
//                                            'datepicker' => array('language' => yii::app()->params['language']) 
//                                        ) 
                                    'combodate'   => array('minYear' => 2015, 'maxYear' => 2030),
                                    //'success'=>'updateGrilla'
                                    //'success'=>'function(link,success,data){ if(success) window.location.reload();',
                                    )
                                ),
                                array(
                                'name' => 'cantidad_bueno',
                                'header' => 'B',
                                'class' => 'booster.widgets.TbEditableColumn',
                                'editable' => array(
                                    'type' => 'text',
                                    'url' => $this->createUrl('detalleCompra/editItem'),
                                    //'success'=>'updateGrilla',
//                                    'htmlOptions'=>array(
//                                        'update'=>'".button-column"'
//                                    )
                                    
                                    //'success'=>'function(link,success,data){ if(success) window.location.reload();',
                                    )
                                ),
                                array(
                                'name' => 'cantidad_malo',
                                'header' => 'M',
                                'class' => 'booster.widgets.TbEditableColumn',
                                'editable' => array(
                                    'type' => 'text',
                                    'url' => $this->createUrl('detalleCompra/editItem'),
                                    'htmlOptions'=>array(
                                        'style'=> 'text-align: right',
                                        //'ajax'=>array('update'=>'#button-column',),
                                        
                                        ),
                                    //'success'=>'updateRow'
                                    //'success'=>'function(link,success,data){ if(success) window.location.reload();',
                                    )
                                ),
                                array(
                                    'name'=>'observacion',
                                    'header'=>'Obs.',
                                    'class' => 'booster.widgets.TbEditableColumn',
                                    'editable' => array(
                                    'type' => 'textarea',
                                    'url' => $this->createUrl('detalleCompra/editItem'),
                                   // 'success'=>'updateGrilla'
                                    //'success'=>'function(link,success,data){ if(success) window.location.reload();',
                                    )

                                ),
                                array(
                                    'name'=>'estado',
                                    'value'=>'$data->_estado[$data->estado]'
                                ),
                                
                                array(
                                    'name'=>'precio_unitario',
                                    'header'=>'P.U.',
                                    'class' => 'booster.widgets.TbEditableColumn',
                                    'editable' => array(
                                    'type' => 'text',
                                    'url' => $this->createUrl('detalleCompra/editPrecioUnitario'),
                                    'htmlOptions'=>array('style'=> 'text-align: right'),
                                    'success'=>'updateGrilla',
                                     //'disabled'=>'($data->estado>2) ? false : true',
                                     'apply' => '($data->estado>2) ? false : true', //deshabilita la edición 
//                                      
                                        
                                )),
                                array(
                                    'name'=>'subtotal',
                                    'header'=>'Subtotal',
                                    'htmlOptions'=>array('style'=> 'text-align: right')
                                ),
                                array(
                                    'name'=>'impuesto',
                                    'header'=>'IGV',
                                    'htmlOptions'=>array('style'=> 'text-align: right')
                                ),
                                array(
                                    'name'=>'total',
                                    'header'=>'Total',
                                    'htmlOptions'=>array('style'=> 'text-align: right')
                                ),

                array(
                    'header'=>'Acción',
                    'class'=>'booster.widgets.TbButtonColumn',
                    'template'=>'{delete} {obs}',
                    'buttons'=>array(
                        'delete'=>array(
                            'url'=>'Yii::app()->createUrl("detalleCompra/delete", array("id"=>$data->id))',
                        ),
                        'obs'=>array(
                            'label'=>'<i class="glyphicon glyphicon-exclamation-sign"></i>',
                            'url'=>'Yii::app()->createUrl("detalleCompra/upObs")',
                            'visible'=>'$data->cantidad_malo>0 || $data->cantidad_bueno < $data->cantidad ',
                            'options'=>array(
                                'title'=>'Observado',
                                
                            )
                        )
                    ),
                    'deleteConfirmation'=>'Esta seguro de eliminar este item?',
                    'afterDelete'=>'function(link,success,data){ if(success) window.location.reload(); }',

                    ),
                ),
    )); 

   
?>


<?php
echo CHtml::Button('Confirmar Registro',
             array(
                 'submit'=>array('detalleCompra/finalizar',
                     'id'=>$model->compra_id,
                     ),
                     'confirm'=>'Esta seguro de proceder?',
                 )
             );
?>