<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php 
$model->venta_id=$pid;

$this->widget('zii.widgets.grid.CGridView',array(
'id'=>'detalle-venta-grid',
'dataProvider'=>$model->search(),
//'filter'=>$model,
'columns'=>array(
		//'id',
		//'venta_id',
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
                'lote',
                array(
                    'name'=>'fecha_vencimiento',
                    'header'=>'F.V.'
                ),    
		array(
                        'name'=>'precio_unitario',
                        'header'=>'P.U.',
                        'htmlOptions'=>array('style'=> 'text-align: right')
                        ),
                array(
                    'name'=>'subtotal',
                   // 'header'=>'Subtotal',
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
		/*
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
		*/

),
)); ?>