<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
    
    $venta->estado=4; // filtra a los venta con estado = despachado 
    $venta->estado_pago=0; //filtra las ventas con estado pago= pendiente
    $venta->estado_comprobante=1; // filtra las ventas con comprobante emitidos; estado comprobante =1
    //$this->widget('booster.widgets.TbGridView',array(
    $this->widget('zii.widgets.grid.CGridView',array(    
    'id'=>'venta-grid',
    'dataProvider'=>$venta->search(),
    'ajaxUrl'=>array('Venta/search&id='.$venta->id),
    'filter'=>$venta,
    'columns'=>array(
//                    array(
//                        'name'=>'id',
//                        'htmlOptions'=>array(
//                            'width'=>'50px',
//                        )
//                    ),
                    'fecha_venta',
                    array(
                        'name'=>'cliente_id',
                        'value'=>'$data->r_cliente->nombre_rz'
                    ),

//                    array(
//                        'name'=>'estado',
//                        'value'=>'$data->_estado[$data->estado]'
//                    ),
                    'observacion',
                    'importe_total',
                    /*
                    'base_imponible',
                    'impuesto',

                    

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
                            'url'=>'Yii::app()->createUrl("CuentaCobrar/Create", array("pid"=>$data->id))'
                        ),
                    ),    
                    'htmlOptions'=>array(
                                    'width'=>'70px',
                                )   
                    ),
    ),
    )); 
?>