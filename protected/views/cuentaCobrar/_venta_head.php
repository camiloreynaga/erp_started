<?php

//$_labels=Venta::model()->attributeLabels();

$this->widget('booster.widgets.TbDetailView',array(
'data'=>$venta,
'attributes'=>array(
                //'fecha_venta',
                array(
                    'name'=> 'cliente_id',//$_labels['cliente_id'],
                    'value'=>$venta->r_cliente->nombre_rz
                ),
//		array(
//                    'name'=>'vendedor_id',//$_labels['vendedor_id'],
//                    'value'=>$model->r_empleado->nombre.' '.$model->r_venta->r_empleado->ap_paterno
//                ),
//		array(
//                    'name'=>$_labels['forma_pago_id'],
//                    'value'=>$model->r_venta->r_forma_pago->forma_pago,
//                    //'class'=>
//
//                ),
                
                array(
                    'name'=>'importe_total', //$_labels[],
                    'value'=>$venta->importe_total
                )
//		'observacion',
//                array(
//                    'name'=>'estado',
//                    'value'=>$model->r_venta->_estado[$model->r_venta->estado]
//                ),
		//'create_time',
		//'create_user_id',
		//'update_time',
		//'update_user_id',
),
));

?>
