<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php 



//$orden_compra = new DetalleOrdenCompra();
//$this->renderPartial('//detalleOrdenCompra/_form',array('model'=>$orden_compra),false,false);
?>
<?php
$form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'detalle-orden-compra-form',
        //'action'=>'ordenCompra/ajaxAddItem',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block"><?php echo Yii::t('app','Fields with');?> <span class="required">*</span> <?php echo yii::t('app','are required.');?></p>

<?php //detalleOrdenCompra::model();//
echo $form->errorSummary($orden_compra); ?>


	<?php //echo $form->textFieldGroup($orden_compra,'cotizacion_id',array('class'=>'span5')); ?>

	<?php 
        echo $form->select2Group(
			$orden_compra,
			'producto_id',
                      
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
                                    
                                    'asDropDownList' => true,
                                    'data'      => CHtml::listData(Producto::model()->findAll('descontinuado=0' ), "id","nombre"),
					'options' => array(
						'placeholder' =>'Seleccione producto', 
                                                //'tags'=>'de',
                                                'width' => '40%', 
						'tokenSeparators' => array(',', ' ')
					),
				)
			)
		);
		
        //echo CHtml::hiddenField('CargoespecSearch', '', array('class' => 'span5'));
        
//        echo $form->select2Group(
//			$orden_compra,
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
        ?>
       
        

	<?php echo $form->textFieldGroup($orden_compra,'cantidad',array('class'=>'span5')); ?>

	<?php echo $form->textAreaGroup($orden_compra,'observacion',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldGroup($orden_compra,'precio_unitario',array('class'=>'span5','maxlength'=>10, 'width'=>'40px')); ?>


<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'ajaxSubmit',
			'context'=>'primary',
                        'url'=>CController::createUrl('ordenCompra/ajaxAddItem',
                                array('id'=>$orden_compra->id)),
//                        'url'=>CController::createUrl('ordenCompra/agregarDetalle',
//                                array('id'=>$orden_compra->id)),       
			'label'=> 'Add Item',//$orden_compra->isNewRecord ? 'Create' : 'Save',
                        'ajaxOptions'=>array(
                            'success'=>'updateGrilla',
                            //'update'=>'#detalle-orden-compra-grid'
                            //'update'=>'#Items'
                            )
                            
                        
		)); ?>
    <?php
//    echo CHtml::ajaxSubmitButton('AgregarItem',
//                        CController::createUrl('ordenCompra/ajaxAddItem',
//                                array('id'=>$orden_compra->id)),
//                        array(
//                            'replace'=>'#Items')
//                        );
                        ?>
</div>
<?php $this->endWidget(); ?>

<div id='results'> </div>
<script>
        function updateGrilla(data) {
                // display data returned from action
                $("#Items").html(data);
                // refresh your grid
                $.fn.yiiGridView.update('detalle-orden-compra-grid');
        }
</script>


<div id="Items"></div>
<?php 
//$orden_compra=new DetalleOrdenCompra;
//$orden_compra->orden_compra_id=$orden_compra->id;

$this->widget('booster.widgets.TbGridView',array(
            'id'=>'detalle-orden-compra-grid',
            'dataProvider'=>$orden_compra->search(),
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


    <?php 
  //$this->renderPartial('_viewItemOc',array('orden_compra_id'=>$orden_compra->id),false,true);
    //$this->renderPartial('/_viewItemOc',array('model'));
    
    ?>
