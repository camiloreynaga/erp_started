<script> //
        //actualiza la grila 
        function updateGrilla(data) {
                // display data returned from action
                $("#Items").html(data);
                // refresh your grid
                $.fn.yiiGridView.update('detalle-pedido-grid');
        }
        //muestra errores del form luego de la validación
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
        
        //esconde los errores del form si la validación es correcta
        function hideFormErrors(form){
        //alert (form+"_es_");
        $(form+"_es_").html('');
        $(form+"_es_").hide();
        $("[id$='_em_']").html('');
        }
</script>

<?php
//script para boton delete 
Yii::app()->clientScript->registerScript('delete','
$("#delete").click(function(){
        var checked=$("#detalle-pedido-grid").yiiGridView("getChecked","detalle-pedido-grid_c0"); // _c0 means the checkboxes are located in the first column, change if you put the checkboxes somewhere else
        var count=checked.length;
                if(count==0){
                alert("No items selected");
                }
        if(count>0 && confirm("Do you want to delete these "+count+" item(s)"))
        {
                $.ajax({
                        data:{ids:checked},
                        url:"'.CController::createUrl('detallePedido/batchDelete').'",
                        success:function(data){$("#detalle-pedido-grid").yiiGridView("update",{});},              
                });
        }
        });
');

?>

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'detalle-pedido-form',
	'enableAjaxValidation'=>true,
        'clientOptions' =>array(
            'validateOnSubmit' => true,
            'validateOnChange' => false,
            'validateOnType' => false,

        )
)); ?>

<p class="help-block"><?php echo yii::t('app','Fields with') ;?> <span class="required">*</span> <?php echo yii::t('app','are required.') ;?></p>

<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldGroup($model,'pedido_id',array('class'=>'span5')); ?>

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

        <?php echo $form->textFieldGroup($model,'precio_unitario',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textAreaGroup($model,'observacion',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	

	<?php //echo $form->textFieldGroup($model,'subtotal',array('class'=>'span5','maxlength'=>10)); ?>

	<?php //echo $form->textFieldGroup($model,'impuesto',array('class'=>'span5','maxlength'=>10)); ?>

	<?php //echo $form->textFieldGroup($model,'total',array('class'=>'span5','maxlength'=>10)); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'ajaxSubmit',
			'context'=>'primary',
                        'url'=>CController::createUrl('detallePedido/create',
                                array('pid'=>$model->pedido_id)
                                ),
			'label'=> 'Add Item',//$orden_compra->isNewRecord ? 'Create' : 'Save',
                        'id'=>'update',
                        'ajaxOptions'=>array(
                            'dataType'=>'json',
                            'type' => 'POST',
                            'data' => "js:$('#detalle-pedido-form').serialize()",
                            'success'=>'function(data){
                            if(data.status=="success")
                            {      
                                    updateGrilla(data);
                                    hideFormErrors(form="#detalle-pedido-form");
                                    //callback(status=data.status);
                                    
                            }else{
                                    formErrors(data,form="#detalle-pedido-form");
                            }
                            }',
                            )
		)); ?>
</div>

<div id="Items"></div>

<?php $this->endWidget(); ?>

    <?php 
    $this->widget('booster.widgets.TbExtendedGridView',array(
    'id'=>'detalle-pedido-grid',
    'type'=>'striped bordered',
    'fixedHeader' => true,    
    'dataProvider'=>$model->search(),
    //'filter'=>$model,
    'columns'=>array(
                    //'id',
                    //'pedido_id',
                    array(
                            'class'=>'CCheckBoxColumn', // Checkboxes
                            'selectableRows'=>2,        // Allow multiple selections 
                            ),
                    array(
                                'name'=>'producto_id',
                                'header'=>'Producto',
                                'value'=>'$data->r_producto->nombre', 
                            ),
                    array(
                            'name' => 'cantidad',
                            'header' => 'Cantidad',
                            'class' => 'booster.widgets.TbEditableColumn',
                            //'headerHtmlOptions' => array('style' => 'width:200px'),
                            
                            'editable' => array(
                                'type' => 'text',
                                'url' => $this->createUrl('detallePedido/editCantidad'),
                                //'success'=>'updateGrilla'
                                
                                
                                )
                            ),
                    array(
                                'name'=>'observacion',
                                'header'=>'Obs.',
                                
                            ),
                    array(
                                'name'=>'precio_unitario',
                                'header'=>'P.U.',
                                'htmlOptions'=>array('style'=> 'text-align: right'),
                                'class' => 'booster.widgets.TbEditableColumn',
                                    'editable' => array(
                                        'type' => 'text',
                                        'url' => $this->createUrl('detallePedido/editPrecioUnitario'),
                                        //'success'=>'updateGrilla'
                                    )
                            ),
                    
                    array(
                                'name'=>'subtotal',
                                //'header'=>'Subtotal',
                                'htmlOptions'=>array('style'=> 'text-align: right')
                            ),
                    /*'impuesto',
                    'total',
                    */
                    array(
                        'class'=>'booster.widgets.TbButtonColumn',
                        'template'=>'{delete}',
                        'buttons'=>array(
                            'delete'=>array(
                                'url'=>'Yii::app()->createUrl("detallePedido/delete", array("id"=>$data->id))',
                            )
                        ),
                        'deleteConfirmation'=>'Esta seguro de eliminar este item?',
                        'afterDelete'=>'function(link,success,data){ if(success) window.location.reload(); }',

                        ),
    ),
)); ?>

<div >
    
    <?php  $this->widget('booster.widgets.TbButton',array( // Button to delete
            'label' => 'Delete Selected Items',
            'context' => 'danger',
            'size' => 'small',
            'id' => 'delete',
            //'url'=>CController::createUrl('detallePedido/create')
            ));
    ?>
</div>

<?php
    echo CHtml::Button('Confirmar pedido',
             array(
                 'submit'=>array('detallePedido/finalizar',
                     'id'=>$model->pedido_id,
                     ),
                     'confirm'=>'Esta seguro de proceder con el pedido?',
                 )
             );
?>