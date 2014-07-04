<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h2>Detalle Orden Compras <?php echo $pid;//$_GET['pid']; ?></h2>
<?php 
$model->orden_compra_id=$pid;

$this->widget('zii.widgets.grid.CGridView',array(
'id'=>'detalle-orden-compra-grid',
//'fixedHeader' => true,
'dataProvider'=>$model->search(),
//'filter'=>$model,
'columns'=>array(
		//'id',
                    array(
                        'name'=>'producto_id',
                        'header'=>'Producto',
                        'value'=>'$data->r_producto->nombre', 
                        ),
                    array(
                        'name' => 'cantidad',
                        'header' => 'Cantidad',
                        'htmlOptions'=>array('style'=> 'text-align: right')
//                            'class' => 'booster.widgets.TbEditableColumn',
//                            'headerHtmlOptions' => array('style' => 'width:200px'),
//                            'editable' => array(
//                                'type' => 'text',
//                                'url' => $this->createUrl('DetalleOrdenCompra/editCantidad')
//                            )
                        ),
                    array(
                        'name'=>'observacion',
                        'header'=>'Obs.',

                        ),

                    array(
                        'name'=>'precio_unitario',
                        'header'=>'P.U.',
                        'htmlOptions'=>array('style'=> 'text-align: right')
                        ),
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
//array(
//'class'=>'booster.widgets.TbButtonColumn',
//),
),
)); ?>