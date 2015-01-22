<script> //
        //actualiza la grila 
        function updateGrilla(data) {
                // display data returned from action
                $("#Items").html(data);
                // refresh your grid
                $.fn.yiiGridView.update('detalle-orden-compra-grid');
        }
        
</script>

<script type="text/javascript">
    
    
    /* 
    // as a global variable
    var gridId = "detalle-orden-compra-grid";

    $(function(){
        // prevent the click event
        $(document).on('click','#detalle-orden-compra-grid a.bulk-action',function() {
            return false;
        });
    });
    
    
    function batchActions()
    {   
        var url = $(this).attr('href');
        var checked = $.fn.yiiGridView.getCheckedRowsIds('detalle-orden-compra-grid');
        var count = checked.length;
        if (!count) {
	                alert('No items are checked');
	                //return false;
	            }
//        if(count>0 && confirm("Do you want to delete these "+count+" item(s)"))
//        {
                $.ajax({
                        
                        type: "POST",
                        dataType:'json',
                        url:url,
                        data:{ids:checked},
                        //"'.CHtml::normalizeUrl(array('CONTROLLER_NAME/RemoveChecked')).'",
                        success: function(data){
                            //alert( "Data Saved: " + resp);
                                if(data.status == "success"){
                                    updateGrilla(data);
                                   //$.fn.yiiGridView.update(gridId);
                                }else{
                                    alert(data.msg);
                                }
                            }
                        //success:function(data){$("#GRID_ID").yiiGridView("update",{});},              
                });
//        }
    }
   */
</script>

<?php
//script para boton delete 
Yii::app()->clientScript->registerScript('delete','
$("#delete").click(function(){
        var checked=$("#detalle-orden-compra-grid").yiiGridView("getChecked","detalle-orden-compra-grid_c0"); // _c0 means the checkboxes are located in the first column, change if you put the checkboxes somewhere else
        var count=checked.length;
                if(count==0){
                alert("'.yii::t('app','No items selected.').'");
                }
        if(count>0 && confirm("'.yii::t('app','Do you want to delete these').' "+count+" item(s)"))
        {
                $.ajax({
                        data:{ids:checked},
                        url:"'.CController::createUrl('detalleOrdenCompra/batchDelete').'",
                        success:function(data){$("#detalle-orden-compra-grid").yiiGridView("update",{});},              
                });
        }
        });
');

?>

<?php 
$form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'detalle-orden-compra-form',
	'enableAjaxValidation'=>true,
       //'enableClientValidation' => true,
       //'type'=>'inline',
        'htmlOptions' => array('class' => 'well'),
//        'focus' => 'input:text:enabled:visible:first',
        'clientOptions' =>array(
            'validateOnSubmit' => true,
            'validateOnChange' => false,
            'validateOnType' => false,

        )
)); ?>

<p class="help-block"><?php echo yii::t('app','Fields with') ;?> <span class="required">*</span> <?php echo yii::t('app','are required.') ;?></p>

<?php


echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldGroup($model,'orden_compra_id',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldGroup($model,'estado',array('class'=>'span5')); ?>

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
						'placeholder' =>yii::t('app','Select product'),
                                                //'tags'=>'de',
                                                //'width' => '40%', 
						'tokenSeparators' => array(',', ' ')
					),
				)
			)
		);
//		
        
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
//                                                'minimumInputLength'=>'2',
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
        
        ?>

	<?php echo $form->textFieldGroup($model,'cantidad',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'precio_unitario',array('class'=>'span5')); //,'maxlength'=>10, 'width'=>'40px' ?>

        <?php echo $form->textAreaGroup($model,'observacion'); //,array( 'class'=>'span8')'rows'=>6, 'cols'=>50, ?>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'dialogClassroom',
    'options'=>array(
        'title'=>'Editar Orden de Compra',
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
            'data'=> "js:$('#detalle-orden-compra').serialize()",
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
                    $.fn.yiiGridView.update('detalle-orden-compra-grid');//update GRID!!! :D
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
        $('#s2id_DetalleOrdenCompra_producto_id').select2('data', null);//reset select2
        $("#DetalleOrdenCompra_cantidad").val(null);//
        $("#DetalleOrdenCompra_precio_unitario").val(null);//
        $("#DetalleOrdenCompra_observacion").val(null);
    }
</script>
    
    
<div class="form-actions">
    <?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'ajaxSubmit',
			'context'=>'primary',
                        //'loadingText'=>'trabajando...',
                        'url'=>CController::createUrl('detalleOrdenCompra/create',
                                array('pid'=>$model->orden_compra_id)
                                ),
			'label'=> yii::t('app','Add'),//$orden_compra->isNewRecord ? 'Create' : 'Save',
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
                                    clearForm();
                                    //callback(status=data.status);
                                    
                            }else{
                                    formErrors(data,form="#detalle-orden-compra-form");
                            }
                            }',
                            )
		)); 
    ?>
</div>

<?php $this->endWidget(); ?>




<div id="Items"></div>
<?php 

$this->widget('booster.widgets.TbExtendedGridView',array(
            'id'=>'detalle-orden-compra-grid',
            'type'=>'striped bordered',
            'fixedHeader' => true,
            //'headerOffset' => 40,
            //'responsiveTable' => true,
            'dataProvider'=>$model->search(),
             'selectableRows' => 2,
            //'filter'=>$model,
//            'bulkActions' => array(
//                'actionButtons' => array(
//                        array(
//                        'id'=>'del_id',
//                        'buttonType' => 'button',
//                        'type' => 'primary',
//                        'size' => 'small',
//                        'label' => 'bulk delete',
//                        'url' => $this->createUrl('detalleOrdenCompra/batchDelete'),
//                        'htmlOptions' => array(
//                                'class'=>'bulk-action'),
//                        'click' => 'js:batchActions()',
//                        )
//                ),
//                // if grid doesn't have a checkbox column type, it will attach
//                // one and this configuration will be part of it
//                'checkBoxColumnConfig' => array(
//                'name' => 'id'
//                ),
//                ),
            
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
                                'header'=>'Presentacion',
                                'value'=>'isset($data->r_producto->r_presentacion->presentacion)?$data->r_producto->r_presentacion->presentacion:null'
                            ),
                            array(
                            'name' => 'cantidad',
                            'header' => 'Cantidad',
                            //'class' => 'booster.widgets.TbEditableColumn',
                            //'headerHtmlOptions' => array('style' => 'width:200px'),
                            
                            /*'editable' => array(
                                'type' => 'text',
                                'url' => $this->createUrl('detalleOrdenCompra/editCantidad'),
                                //'placement' => 'left',
                                'success'=>'updateGrilla'
                                //'success'=>'function(link,success,data){ if(success) window.location.reload();',
                            )*/
                             ),
                             
                            array(
                                'name'=>'observacion',
                                'header'=>'Obs.',
                                /*'class'=>'booster.widgets.TbEditableColumn',
                                'editable'=>array(
                                    'type'=>'text',
                                    'url'=>$this->createUrl('detalleOrdenCompra/editItem'),
                                )*/
                                
                            ),
                            
                            array(
                                'name'=>'precio_unitario',
                                'header'=>'P.U.',
                                'htmlOptions'=>array('style'=> 'text-align: right'),
                                /*'class' => 'booster.widgets.TbEditableColumn',
                                    'editable' => array(
                                        'type' => 'text',
                                        'url' => $this->createUrl('detalleOrdenCompra/editPrecioUnitario'),
                                        'success'=>'updateGrilla'
                                    )*/
                            ),
                            array(
                                'name'=>'subtotal',
                                'class'=>'booster.widgets.TbTotalSumColumnCurrency',
                                'footerHtmlOptions'=>array('style'=> 'text-align: right'),
                                //'header'=>'Subtotal',
                                'htmlOptions'=>array('style'=> 'text-align: right')
                            ),
                            array(
                                'name'=>'impuesto',
                                'header'=>'IGV',
                                'class'=>'booster.widgets.TbTotalSumColumnCurrency',
                                'footerHtmlOptions'=>array('style'=> 'text-align: right'),
                                'htmlOptions'=>array('style'=> 'text-align: right')
                            ),
                            array(
                                'name'=>'total',
                                'header'=>'Total',
                                'class'=>'booster.widgets.TbTotalSumColumnCurrency',
                                'footerHtmlOptions'=>array('style'=> 'text-align: right'),
                                'htmlOptions'=>array('style'=> 'text-align: right')
                            ),
                            
            array(
                'class'=>'booster.widgets.TbButtonColumn',
                'template'=>'{delete}{update}',
                'buttons'=>array(
                    'delete'=>array(
                        'url'=>'Yii::app()->createUrl("detalleOrdenCompra/delete", array("id"=>$data->id))',
                    ),
                    'update'=>array(
                        'url'=>'Yii::app()->createUrl("detalleOrdenCompra/update", array("id"=>$data->id))',
                        'click'=>'function(){updateItem($(this).attr("href")); $("#dialogClassroom").dialog("open");return false;}'
                    )
                ),
                'deleteConfirmation'=>yii::t('app','Are you sure to delete this item?'),
                'afterDelete'=>'function(link,success,data){ if(success) window.location.reload(); }',
		
                ),
            ),
)); 

   
?>
<div >
    
    <?php  $this->widget('booster.widgets.TbButton',array( // Button to delete
            'label' => yii::t('app','Delete Selected Items'),
            'context' => 'danger',
            'size' => 'small',
            'id' => 'delete',
            //'url'=>CController::createUrl('detalleOrdenCompra/create')
            ));
    ?>
</div>

<div class="row buttons">
    <br>
    <?php
//    $this->widget('booster.widgets.TbButton', array(
//			//'buttonType'=>'Submit',
//			'context'=>'success',
//                        //'loadingText'=>'trabajando...',
//                        'url'=>array('detalleOrdenCompra/finalizarOc',
//                                array('id'=>$model->orden_compra_id)
//                                ),
//			'label'=> 'Finalizar',//$orden_compra->isNewRecord ? 'Create' : 'Save',
//                        'id'=>'end',
//                        //'confirm'=>'Esta seguro de proceder con la compra?'
//                        
//		));
    ?>

     <?php  echo CHtml::Button(yii::t('app','Confirm').' '.yii::t('app','Purchase'),
             array(
                 'submit'=>array('detalleOrdenCompra/finalizarOc',
                     'id'=>$model->orden_compra_id,
                     ),
                     'confirm'=>yii::t('app','Are you sure to process this purchase?'),
                 )
             );/*
     echo CHtml::ajaxButton('Cancelar compra',array('compra/delete','id'=>$model->orden_compra_id),
                 array(
                      'type' => 'post',
                      'success'=>'function(data){location.href="'.CController::createUrl('compra/admin').'"}'
                ),
             array(
                 'confirm'=>'Esta seguro de eliminar/cancelar la compra en proceso?',
             ));*/
         ?>
              
    
</div>
