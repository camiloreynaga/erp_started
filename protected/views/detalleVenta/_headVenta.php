<?php

$_labels=Venta::model()->attributeLabels();

$this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
                //'fecha_venta',
                array(
                    'name'=> $_labels['cliente_id'],
                    'value'=>$model->r_venta->r_cliente->nombre_rz
                ),
		array(
                    'name'=>$_labels['vendedor_id'],
                    'value'=>$model->r_venta->r_empleado->nombre.' '.$model->r_venta->r_empleado->ap_paterno
                ),
		array(
                    'name'=>$_labels['forma_pago_id'],
                    'value'=>$model->r_venta->r_forma_pago->forma_pago,
                    //'class'=>

                ),
    
//		'importe_total',
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
<?php 
      $_cred_disp= $model->r_venta->forma_pago_id==1 ? ' <span class="required" >Monto disponible: '.$model->r_venta->r_cliente->credito_disponible.'</span>' : ""; 
      echo $_cred_disp;
      ?> 