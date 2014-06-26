<?php 
$js = "if (confirm('Success. Do you like insert another?')) {
        form[0].reset();
    }";

$form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'detalle-orden-compra-form',
	'enableAjaxValidation'=>true,
       //'enableClientValidation' => true,
        'focus' => 'input:text:enabled:visible:first',
        'clientOptions' =>array(
            'validateOnSubmit' => true,
            'validateOnChange' => false,
            'validateOnType' => false,
//            'afterValidate' => "js:function(form, data, hasError){
//            //RECEIVE FORM VALIDATION MESSAGES
//            if (hasError) {
//                alert(data.msg);
//                //DO SOMETHING IF NECESSARY
//                return false;
//            }
//            //RECEIVE other validation messages from try/catch: database constraints, unknown messages
//            else {
//                //SHOW MESSAGES
//                if (typeof data.status !== 'undefined')
//                    alert(data.msg);
//                //NO ERROR, DO SOMETHING (SHOW ABOVE CONDITIONS)
//                else {
//                    " . $js . "
//                }
//            }
//        }"
        )
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php


echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'orden_compra_id',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldGroup($model,'cotizacion_id',array('class'=>'span5')); ?>

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
                                    'data'      => CHtml::listData(Producto::model()->findAll('descontinuado=0'), "id","nombre"),
					'options' => array(
						'placeholder' =>'Seleccione producto', 
                                                //'tags'=>'de',
                                                'width' => '40%', 
						'tokenSeparators' => array(',', ' ')
					),
				)
			)
		);
//		
        //echo CHtml::hiddenField('CargoespecSearch', '', array('class' => 'span5'));
        
//        echo $form->select2Group(
//			$model,
//			'producto_id',
//			array(
//				'wrapperHtmlOptions' => array(
//					'class' => 'col-sm-5',
//				),
//				'widgetOptions' => array(
//                                    'asDropDownList' => false,
//                                   // CHtml::listData(Producto::model()->findAll(), "id","nombre"),
//					'options' => array(
//						'placeholder' =>'Seleccione producto', 
//                                                //'tags'=>'de',
//                                                //'width' => '40%', 
//						//'tokenSeparators' => array(',', ' '),
//                                                //'minimumInputLength'=>'2',
//                                                'ajax' => array(
//                                                'url' => Yii::app()->controller->createUrl('Producto/FiltroProducto'),
//                                                    'type'=>'GET',
//                                                    'dataType' => 'json',
//                                                    'quietMillis'=> 100,
//                                                    'data' => 'js: function(text,page) {
//                                                    return {
//                                                                //get im my controller
//                                                                q: text, 
//                                                              //  page_limit: 10,
//                                                               // page: page,
//                                                            };
//                                                        }',
//                                                    'results'=>'js:function(data,page) { var more = (page * 10) < data.total; return {results: data, more:more }; }',
//                                                ),
//					),
//				)
//			)
//		);
        
       
        
       // echo $form->textFieldGroup($model,'producto_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'cantidad',array('class'=>'span5')); ?>

	<?php echo $form->textAreaGroup($model,'observacion',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldGroup($model,'precio_unitario',array('class'=>'span5','maxlength'=>10, 'width'=>'40px')); ?>

	<?php //echo $form->textFieldGroup($model,'subtotal',array('class'=>'span5','maxlength'=>10)); ?>

	<?php //echo $form->textFieldGroup($model,'impuesto',array('class'=>'span5','maxlength'=>10)); ?>

	<?php //echo $form->textFieldGroup($model,'total',array('class'=>'span5','maxlength'=>10)); ?>

<div class="form-actions">
    <?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'ajaxSubmit',
			'context'=>'primary',
                        'url'=>CController::createUrl('detalleOrdenCompra/create',
                                array('pid'=>$model->orden_compra_id)
                                ),
//                        'url'=>CController::createUrl('ordenCompra/agregarDetalle',
//                                array('id'=>$orden_compra->id)),       
			'label'=> 'Add Item',//$orden_compra->isNewRecord ? 'Create' : 'Save',
                        'id'=>'update',
                        'ajaxOptions'=>array(
                            'dataType'=>'json',
                            'type' => 'POST',
                            'data' => "js:$('#detalle-orden-compra-form').serialize()",
                            'success'=>'function(data){
                            if(data.status=="success")
                            {      
                                    updateGrilla(data);
                                    hideFormErrors(form="#detalle-orden-compra-form");
                                    //callback(status=data.status);
                                    
                            }else{
                                    formErrors(data,form="#detalle-orden-compra-form");
                            }
                            }',
                           // 'success'=>'updateGrilla',
                            )
                            
                        
		)); 
    
    ?>
</div>

<?php $this->endWidget(); ?>

<script>
        function updateGrilla(data) {
                // display data returned from action
                $("#Items").html(data);
                // refresh your grid
                $.fn.yiiGridView.update('detalle-orden-compra-grid');
        }
        function formErrors(data,form){
        var summary = '';
        summary="<p>Please solve following errors:</p>";

        $.each(data, function(key, val) {
        $(form+" #"+key+"_em_").html(val.toString());
        $(form+" #"+key+"_em_").show();

        $("#"+key).parent().addClass("row error");
        summary = summary + "<ul><li>" + val.toString() + "</li></ul>";
        });
        $(form+"_es_").html(summary.toString());
        $(form+"_es_").show();

        $("[id^='update-button']").show();
        $('#ajax-status').hide();//css({display:'none'});
        $('#ajax-status').text('');
        }
        
        function hideFormErrors(form){
        //alert (form+"_es_");
        $(form+"_es_").html('');
        $(form+"_es_").hide();
        $("[id$='_em_']").html('');
        }
</script>


<div id="Items"></div>
<?php 
//$orden_compra=new DetalleOrdenCompra;
//$orden_compra->orden_compra_id=$orden_compra->id;

$this->widget('booster.widgets.TbGridView',array(
            'id'=>'detalle-orden-compra-grid',
            'dataProvider'=>$model->search(),
            //'filter'=>$orden_compra,
            'columns'=>array(
                            'id',
                            'orden_compra_id',
                            'cotizacion_id',
                            'producto_id',
                            array(
                            'name' => 'cantidad',
                            'header' => 'Cantidad',
                            'class' => 'booster.widgets.TbEditableColumn',
                            'headerHtmlOptions' => array('style' => 'width:200px'),
                            'editable' => array(
                                'type' => 'text',
                                'url' => $this->createUrl('ordenCompra/editCantidad')
                            )
                        ),
                           // 'cantidad',
                            'observacion',
                            /*
                            'precio_unitario',
                            'subtotal',
                            'impuesto',
                            'total',
                            */
            array(
                'class'=>'booster.widgets.TbButtonColumn',
                'template'=>'{delete}',
                'buttons'=>array(
                    'delete'=>array(
                        'url'=>'Yii::app()->createUrl("ordenCompra/deleteItem", array("id"=>$data->id))',
                    )
                ),
                'deleteConfirmation'=>'Esta seguro de eliminar este item?',
                'afterDelete'=>'function(link,success,data){ if(success) window.location.reload(); }',
		
                ),
            ),
)); ?>