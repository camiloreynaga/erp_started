<script>
	

</script>


<?php 

$form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'compra-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block"><?php echo yii::t('app','Fields with');?> <span class="required">*</span><?php echo ' '.yii::t('app','are required.');?> </p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->datepickerGroup(
                $model,
                'fecha_compra',
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
                        'hint' => yii::t('app','Put date'),
                        'prepend' => '<i class="glyphicon glyphicon-calendar"></i>'
                    )
                ) ;
        
        ?>

	<?php //echo $form->textFieldGroup($model,'proveedor_id',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldGroup($model,'base_imponible',array('class'=>'span5','maxlength'=>10)); ?>

	<?php 
        echo $form->select2Group(
                $model,
                'orden_compra_id',
                array(
                    'wrapperHtmlOptions'=>array(
                        'class'=>'col-sm-5'
                    ),
                    'widgetOptions'=>array(
                        'asDropDownList'=>true,
                        'data'=>  CHtml::listData(OrdenCompra::model()->getOrdenCompra(),'id','text'),
                        //
                        'val'=>isset($_GET['id'])? $_GET['id']: null,
                        'options'=>array(
                              //
                            'placeholder'=>yii::t('app','Select an purchase order'),
                            'htmlOptions'=>array(
                                'id'=>'combo_oc',
                                
                                //'update'=>'#detalle-oc'
                            ),
                            
//                            'ajax'=>array(
//                                'url'=>CController::createUrl('ordenCompra/admin',
//                                        array('pid'=>'1')
//                                        ),
//                                'success'=>'function(data){
//                                    $("#Items").html(data);
//                                }',
                                //'update'=>'#detalle-oc'
//                            )
                        ),
                       // 'id'=>'oc',
                        'events'=>array(
                            'change'=>'js:function (element) {
                                var id=element.val;
                                $.ajax({
                                    data:{ids:id},
                                    //dataType:"html",
                                    url:"'.CController::createUrl('DetalleOrdenCompra/DetalleOC').'",
                                        
                                    success: function(data){
                                      $("#detalle-oc").html(data);
                                      //$.fn.yiiGridView.update("detalle-oc");
                                        //$("#detalle-oc").show(html);
                                    },              
                                 });
                                
                            }',
//                       
                     ),
                    )
                )
                );
//        $this->widget('booster.widgets.TbButton',
//                    array(
//                        'buttonType'=>'ajaxSubmit',
//                        'context'=>'info',
//                        'url'=>CController::createUrl('DetalleOrdenCompra/DetalleOC'),
//                        'label' => 'mostrar detalle',
//                        'ajaxOptions'=>array(
//                            'dataType'=>'json',
//                            //'type'=>'POST',
//                            //'data'=>'id:
//                            'update'=>'#detalle-oc'
//                        ),
//                        'htmlOptions' => array(
//                            'onclick' => 'js:$.ajax({
//                                url: "/",
//                                type: "POST",
//                                data: $("#oc").serialize()
//                            });'
//                        )
//                    )
//                );
         
        
        //echo $form->textFieldGroup($model,'orden_compra_id',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldGroup($model,'impuesto',array('class'=>'span5','maxlength'=>10)); ?>

	<?php //echo $form->textFieldGroup($model,'importe_total',array('class'=>'span5','maxlength'=>10)); ?>

	<?php 
            echo $form->textAreaGroup($model,'observacion');
        //echo $form->textAreaGroup($model,'observacion',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php //echo $form->textFieldGroup($model,'estado',array('class'=>'span5')); ?>
        
	

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? yii::t('app','Create') : yii::t('app','Save'),
                        'htmlOptions'=>array(
                            'confirm'=>yii::t('app','Are you sure to process?'),
                        )
		)); ?>
</div>

<?php $this->endWidget(); ?>

<?php

//$oc=new DetalleOrdenCompra('search');
//$oc->orden_compra_id= $form->;
//$this->renderPartial('//detalleOrdenCompra/admin',array(
//                     'model'=>$oc,
//                     ));

?>
<div id="detalle-oc">
    
</div>
<?php
//isset($_GET['id'])? $oc->orden_compra_id=$_GET['id']: $oc->orden_compra_id=0  ;
//
//$this->widget('booster.widgets.TbGridView',array(
//    'id'=>'detalle-orden-compra-grid',
//    'dataProvider'=>$oc->search(),
//    'columns'=>array(
//                    array(
//                        'name'=>'producto_id',
//                        'header'=>'Producto',
//                        'value'=>'$data->r_producto->nombre',
//                    ),
//                    array(
//                    'name'=>'cantidad',
//                    'header'=>'Cantidad',
//                    ),
//    ),
//)); 
?>


