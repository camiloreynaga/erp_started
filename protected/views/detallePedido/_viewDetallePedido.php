<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php 
$model->pedido_id=$pid;
$this->widget('zii.widgets.grid.CGridView',array(
'id'=>'detalle-pedido-grid',
'dataProvider'=>$model->search(),
//'filter'=>$model,
'columns'=>array(
		//'id',
		//'pedido_id',
		array(
                        'name'=>'producto_id',
                        'header'=>'Producto',
                        'value'=>'$data->r_producto->nombre', 
                        ),
                array(
                    'name' => 'cantidad',
                    'header' => 'Cant.',
                    'htmlOptions'=>array('style'=> 'text-align: right')
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

    ),
)); ?>