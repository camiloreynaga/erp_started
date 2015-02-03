<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h1><?php echo yii::t('app', 'Store purchase') ?></h1>

<?php
    

    $compra= Compra::model();
    $compra->estado=1; // filtra a los compra con estado = Revisado 
    $this->widget('booster.widgets.TbGridView',array(
    'id'=>'compra-grid',
    'dataProvider'=>$compra->search(),
    //'filter'=>$compra,
    'columns'=>array(
                    array(
                        'name'=>'id',
                        'htmlOptions'=>array(
                            'width'=>'50px',
                        )
                    ),
                    'fecha_compra',
                    array(
                        'name'=>'proveedor_id',
                        'value'=>'$data->r_proveedor->nombre_rz'
                    ),

                    array(
                        'name'=>'estado',
                        'value'=>'$data->_estado[$data->estado]'
                    ),
                    'observacion',
                    /*
                    'base_imponible',
                    'impuesto',

                    'importe_total',

                    /*
                    'create_time',
                    'create_user_id',
                    'update_time',
                    'update_user_id',
                    */
                    array(
                    'class'=>'booster.widgets.TbButtonColumn',
                    'template'=>'{select}',
                    'buttons'=>array(
                        'select'=>array(
                            'url'=>'Yii::app()->createUrl("MovimientoAlmacen/ingresarCompra", array("id"=>$data->id))'
                        ),
                    ),    
                    'htmlOptions'=>array(
                                    'width'=>'70px',
                                )   
                    ),
    ),
    )); 
?>


<h3> <?php echo yii::t('app','Details').' '. yii::t('app','Purchase').' '; echo  isset($_GET['id'])? $_GET['id'] : "";
//isset($_GET['id'])? $pk= $_GET['id'] : $pk= "";
//$_compra= $compra->findByPk($pk) ;
//echo ' '.$_compra['id'].' '. $compra->r_proveedor->$_compra['proveedor_id'];
?></h3>
<?php 
    $model= DetalleCompra::model();   
    $model->estado=1;
    $model->compra_id= isset($_GET['id'])? $_GET['id']: 0;
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
                                'compra_id',
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
//                                'class' => 'booster.widgets.TbEditableColumn',
//                                //'headerHtmlOptions' => array('style' => 'width:200px'),
//
//                                'editable' => array(
//                                    'type' => 'text',
//                                    'url' => $this->createUrl('detalleCompra/editCantidad'),
//                                    //'placement' => 'left',
//                                    'success'=>'updateGrilla'
//                                    
//                                    //'success'=>'function(link,success,data){ if(success) window.location.reload();',
//                                    )
                                ),
                                array(
                                'name' => 'lote',
                                'header' => 'Lote',
//                                'class' => 'booster.widgets.TbEditableColumn',
//                                //'headerHtmlOptions' => array('style' => 'width:200px'),
//
//                                'editable' => array(
//                                    'type' => 'text',
//                                    'url' => $this->createUrl('detalleCompra/editItem'),
//                                    //'placement' => 'left',
//                                    //'success'=>'updateGrilla'
//                                    //'success'=>'function(link,success,data){ if(success) window.location.reload();',
//                                    )
                                ),
                                //'lote',
                                array(
                                'name' => 'fecha_vencimiento',
                                'header' => 'F.V.',
//                                'class' => 'booster.widgets.TbEditableColumn',
//                                'editable' => array(
//                                    'type' => 'combodate',
//                                    'url' => $this->createUrl('detalleCompra/editItem'),
//                                    //'format'      => 'YYYY-MM-DD', //in this format date sent to server  
//                                    'viewformat'  => 'MM-YYYY', //in this format date is displayed
//                                    'template'    => 'MM / YYYY', //template for dropdowns
////                                    'options'     => array(
////                                            'datepicker' => array('language' => yii::app()->params['language']) 
////                                        ) 
//                                    'combodate'   => array('minYear' => 2015, 'maxYear' => 2050),
//                                    //'success'=>'updateGrilla'
//                                    //'success'=>'function(link,success,data){ if(success) window.location.reload();',
//                                    )
                                ),
                                array(
                                'name' => 'cantidad_bueno',
                                'header' => 'B',
//                                'class' => 'booster.widgets.TbEditableColumn',
//                                'editable' => array(
//                                    'type' => 'text',
//                                    'url' => $this->createUrl('detalleCompra/editItem'),
//                                   // 'success'=>'updateGrilla'
//                                    //'success'=>'function(link,success,data){ if(success) window.location.reload();',
//                                    )
                                ),
                                array(
                                'name' => 'cantidad_malo',
                                'header' => 'M',
//                                'class' => 'booster.widgets.TbEditableColumn',
//                                'editable' => array(
//                                    'type' => 'text',
//                                    'url' => $this->createUrl('detalleCompra/editItem'),
//                                   // 'success'=>'updateGrilla'
//                                    //'success'=>'function(link,success,data){ if(success) window.location.reload();',
//                                    )
                                ),
                                array(
                                    'name'=>'observacion',
                                    'header'=>'Obs.',
//                                    'class' => 'booster.widgets.TbEditableColumn',
//                                    'editable' => array(
//                                    'type' => 'textarea',
//                                    'url' => $this->createUrl('detalleCompra/editItem'),
                                   // 'success'=>'updateGrilla'
                                    //'success'=>'function(link,success,data){ if(success) window.location.reload();',
//                                    )

                                ),
                                //'estado',
                                array(
                                    'name'=>'precio_unitario',
                                    'header'=>'P.U.',
//                                    'class' => 'booster.widgets.TbEditableColumn',
//                                    'editable' => array(
//                                    'type' => 'text',
//                                    'url' => $this->createUrl('detalleCompra/editPrecioUnitario'),
//                                    'htmlOptions'=>array('style'=> 'text-align: right'),
//                                    'success'=>'updateGrilla'
                                    //)
                                ),
//                                array(
//                                    'name'=>'subtotal',
//                                    'header'=>'Subtotal',
//                                    'htmlOptions'=>array('style'=> 'text-align: right')
//                                ),
//                                array(
//                                    'name'=>'impuesto',
//                                    'header'=>'IGV',
//                                    'htmlOptions'=>array('style'=> 'text-align: right')
//                                ),
//                                array(
//                                    'name'=>'total',
//                                    'header'=>'Total',
//                                    'htmlOptions'=>array('style'=> 'text-align: right')
//                                ),
                                array(
                                    'header'=>'Acción',
                                    'class'=>'booster.widgets.TbButtonColumn',
                                    'template'=>'{er}',
                                    'buttons'=>array(
                                        'er'=>
                                            array(
                                                'label'=>'<i class="glyphicon glyphicon-check"></i>',
                                                'url'=>'Yii::app()->createUrl("movimientoAlmacen/RegistrarCompra", array("id"=>$data->id))',
                                                'click'=>"function(){
                                                            $.fn.yiiGridView.update('detalle-orden-compra-grid', {
                                                                type:'POST',
                                                                url:$(this).attr('href'),
                                                                success:function(data) {
                                                                      $('#AjFlash').html(data).fadeIn().animate({opacity: 1.0}, 3000).fadeOut('slow');

                                                                      $.fn.yiiGridView.update('detalle-orden-compra-grid');
                                                                }
                                                            })
                                                            return false;
                                                      }",
                                                'options'=>array(
                                                    'title'=>'ingresar',
                                                    'confirm'=>'Ingresar ?',
//                                                    'ajax'=>array(
//                                                        'type'=>'POST',
//                                                        'url'=>'Yii::app()->createUrl("movimientoAlmacen/RegistrarCompra", array("id"=>$data->id))',
////                                                        'success'=>'function(data) { $("#viewModal .modal-body p").html(data); $("#viewModal").modal(); }'
//                                                    ),
                                                ),
                                            ),
                                    ),
                                ),

              
                ),
    )); 

   
?>
<div id='AjFlash' class="flash-success" style="display:none"></div>