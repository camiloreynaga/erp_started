<script> //
        //actualiza la grila 
        function updateGrilla(data) {
                // display data returned from action
                $("#Items").html(data);
                // refresh your grid
                $.fn.yiiGridView.update('detalle-venta-grid');
                window.location.reload();
        }
        
</script>

<?php
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/validacionAjaxForm.js',CClientScript::POS_HEAD);
//$cs->registerCssFile($baseUrl.'/css/style.css');
?>

<?php
//script para boton delete 
Yii::app()->clientScript->registerScript('delete','
$("#delete").click(function(){
        var checked=$("#detalle-venta-grid").yiiGridView("getChecked","detalle-venta-grid_c0"); // _c0 means the checkboxes are located in the first column, change if you put the checkboxes somewhere else
        var count=checked.length;
                if(count==0){
                alert("No items selected");
                }
        if(count>0 && confirm("Do you want to delete these "+count+" item(s)"))
        {
                $.ajax({
                        data:{ids:checked},
                        url:"'.CController::createUrl('detalleVenta/batchDelete').'",
                        success:function(data){$("#detalle-venta-grid").yiiGridView("update",{});},              
                });
        }
        });
');

?>

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'detalle-venta-form',
	'enableAjaxValidation'=>true,
        'clientOptions' =>array(
            'validateOnSubmit' => true,
            'validateOnChange' => false,
            'validateOnType' => false,

        )
        
)); ?>

<p class="help-block"><?php echo yii::t('app','Fields with') ;?> <span class="required">*</span> <?php echo yii::t('app','are required.') ;?>
<?php echo ' -  Forma de pago: '. $model->r_venta->r_forma_pago->forma_pago .' Monto Disponible: '.$model->r_venta->r_cliente->credito_disponible; ?>
</p>

<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldGroup($model,'venta_id',array('class'=>'span5')); ?>

	<?php 
        $htmlOptions=array(
          'ajax'=>array(
              'url'=>CController::createUrl('detalleVenta/lotes'),
              //'url'=>CController::createUrl('detalleVenta/precios'),
              'type'=>'POST',
              'update'=>'#DetalleVenta_lote',
              //'update'=>'#precio',
          ),  
        );
        
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
                                    'data'      => CHtml::listData(Producto::model()->getProductosStockDisponible(), "id","text"),
					'options' => array(
						'placeholder' =>'Seleccione producto', 
                                                //'tags'=>'de',
                                                //'width' => '40%', 
						'tokenSeparators' => array(',', ' ')
					),
                                        'htmlOptions'=>$htmlOptions,
                                     'events'=>array(
                                            'change'=>'js:function(element){
                                                        var id=element.val;
                                                        
                                                        $.ajax({
                                                        type:"post",
                                                        data:{producto_id:id},
                                                        url:"'.CController::createUrl('detalleVenta/precios').'",
                                                        success: function(data){
                                                        $("#precio").html(data);
                                                        }    
                                                    })
                                                }'
                                            )
				)
			)
		);
        
        //echo $form->textFieldGroup($model,'producto_id',array('class'=>'span5')); ?>
	

	<?php echo $form->DropDownListGroup($model,'lote',
                array(
                    'widgetOptions'=>array(
                        'htmlOptions'=>array(
//                            'ajax'=>array(
//                            'url'=>CController::createUrl('detalleVenta/precios'),
//                            'type'=>'POST',
//                            'update'=>'#precio',
//                            ),
                        ),
//                        'events'=>array(
//                            'change'=>'js:function (element){
//                                //var
//                                $.ajax({
//                                //data:
//                                url:"'.CController::createUrl('detalleVenta/precios').'",
//                                success: function(data){
//                                $("#precio").html(data);
//                                }    
//                                })
//                                }'
//                        )
                    //'data'=>CHtml::listData(TipoComprobante::model()->getTiposComprobante(),'id','comprobante'),
                    )
                )
                //array('class'=>'span5','maxlength'=>50)
                ); 
        ?>
        
        <?php echo $form->textFieldGroup($model,'cantidad',array('class'=>'span5')); ?>
        <div id="precio"></div>
        <?php echo $form->textFieldGroup($model,'precio_unitario',array('class'=>'span5','maxlength'=>10)); ?>  
	<?php 
//        echo $form->datepickerGroup(
//                $model,
//                'fecha_vencimiento',
//                array(
//                    'widgetOptions'=> array(
//                        'options'=>array(
//                            //'language' => yii,
//                            'format'=>'mm/yyyy',
//                            'startView'=> 2,
//                            'minViewMode'=> 1,
//                             'autoclose'=>true,
//                             'todayHighlight'=>true,
//                        ),
//                       //'htmlOptions'=>array('class'=>'span5')
//                        ),
//                        'hint' => 'Ingrese fecha',
//                        'prepend' => '<i class="glyphicon glyphicon-calendar"></i>'
//                    )
//                ) ;
        
        //echo $form->datepickerGroup($model,'fecha_vencimiento',array('options'=>array(),'htmlOptions'=>array('class'=>'span5')),array('prepend'=>'<i class="icon-calendar"></i>','append'=>'Click on Month/Year at top to select a different year or type in (mm/dd/yyyy).')); ?>

	

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'ajaxSubmit',
			'context'=>'primary',
                        'url'=>CController::createUrl('detalleVenta/create',
                                array('pid'=>$model->venta_id)
                                ),
			'label'=> 'Add Item',//$orden_compra->isNewRecord ? 'Create' : 'Save',
                        'id'=>'update',
                        'ajaxOptions'=>array(
                            'dataType'=>'json',
                            'type' => 'POST',
                            'data' => "js:$('#detalle-venta-form').serialize()",
                            'success'=>'function(data){
                            if(data.status=="success")
                            {      
                                    window.location.reload();
                                    //updateGrilla(data);
                                    //hideFormErrors(form="#detalle-venta-form");
                                    //callback(status=data.status);
                                    
                            }else{
                                    formErrors(data,form="#detalle-venta-form");
                            }
                            }',
                            )
		)); ?>
</div>

<?php $this->endWidget(); ?>

<div id="Items"></div>

<?php 
    $this->widget('booster.widgets.TbExtendedGridView',array(
    'id'=>'detalle-venta-grid',
    'type'=>'striped bordered',
    'fixedHeader' => true,
    'dataProvider'=>$model->search(),
    //'filter'=>$model,
    'columns'=>array(
                    //'id',
                    //'venta_id',
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
                                'url' => $this->createUrl('detalleVenta/editCantidad'),
                                //'placement' => 'left',
                                'success'=>'updateGrilla'
                                //'success'=>'function(link,success,data){ if(success) window.location.reload();',
                                
                                
                                )
                            ),
                            'lote',
                            'fecha_vencimiento',
                    array(
                                'name'=>'precio_unitario',
                                'header'=>'P.U.',
                               // 'footer'=>'SUBTOTAL',
                                'htmlOptions'=>array('style'=> 'text-align: right'),
                                'footerHtmlOptions'=>array('style'=> 'text-align: right'),
                                'class' => 'booster.widgets.TbEditableColumn',
                                    'editable' => array(
                                        'type' => 'text',
                                        'url' => $this->createUrl('detalleVenta/editPrecioUnitario'),
                                        'success'=>'updateGrilla'
                                    )
                            ),
                          'subtotal',
                          'impuesto',
                            
                    array(
                                'name'=>'total', 
                                'footer'=> $model->r_venta->importe_total, //DetalleVenta::model()->SumaTotal(),
                                //'header'=>'Subtotal',
                                'htmlOptions'=>array('style'=> 'text-align: right'),
                                'footerHtmlOptions'=>array('style'=> 'text-align: right'),
                                //'class'=>'booster.widgets.TbTotalSumColumnCurrency'
                            ),
                            
                    
                    
                    //'impuesto',
                    //'total',
                    
                    /*'create_time',
                    'create_user_id',
                    'update_time',
                    'update_user_id',
                    */
                    array(
                        'class'=>'booster.widgets.TbButtonColumn',
                        'template'=>'{delete}',
                        'buttons'=>array(
                            'delete'=>array(
                                'url'=>'Yii::app()->createUrl("detalleVenta/delete", array("id"=>$data->id))',
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
            //'url'=>CController::createUrl('detalleVenta/create')
            ));
    ?>
</div>

<?php
    echo CHtml::Button('Confirmar venta',
             array(
                 'submit'=>array('detalleVenta/finalizar',
                     'id'=>$model->venta_id,
                     ),
                     'confirm'=>'Esta seguro de proceder con la venta?',
                 )
             );
?>
<?php
    echo CHtml::Button('Confirmar venta',
             array(
                 'submit'=>array('detalleVenta/finalizar',
                     'id'=>$model->venta_id,
                     ),
                     'confirm'=>'Esta seguro de proceder con la venta?',
                 )
             );
?>