<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$this->widget('zii.widgets.grid.CGridView',array(    
    'id'=>'venta-grid',
    'dataProvider'=>$venta->search(),
    'filter'=>$venta,
    'ajaxUrl'=>Yii::app()->createUrl('Venta/search'),
    //'ajaxUrl'=>Yii::app()->createUrl( 'Something/search' ),
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
