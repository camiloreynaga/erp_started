<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$model->venta_id=$pid;

?>

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'comprobante-venta-grid',
'dataProvider'=>$model->search(),
//'filter'=>$model,
'columns'=>array(
		//'id',
		//'venta_id',
                array(
                    'name'=>'tipo_comprobante_id',
                    'value'=>'$data->r_tipo_comprobante->comprobante'
                ),
//                array(
//                    'name'=>'tipo_comprobante_id',
//                    'value'=>'$data->r_tipo_comprobante->comprobante',
//                    'class'=>'booster.widgets.TbEditableColumn',
//                        'editable'=>array(
//                            'type'=>'select',
//                            //'inputClass'=>'inline',
//                            'url' => $this->createUrl('ComprobanteVenta/editItem'),
//                            'source'=>$this->createUrl('ComprobanteVenta/getTipoComprobante'),
//                            
//                        )
//                ),    
    
		'fecha_emision',
		'fecha_cancelacion',
		//'serie',
                array(
                    'name'=>'serie',
                    'value'=>'$data->serie',
                    'class'=>'booster.widgets.TbEditableColumn',
                        'editable'=>array(
                            'type'=>'text',
                            //'inputClass'=>'inline',
                            'url' => $this->createUrl('ComprobanteVenta/editItem'),
                        )
                ),
    
                array(
                    'name'=>'numero',
                    'value'=>'$data->numero',
                    'class'=>'booster.widgets.TbEditableColumn',
                        'editable'=>array(
                            'type'=>'text',
                            //'inputClass'=>'inline',
                            'url' => $this->createUrl('ComprobanteVenta/editItem'),
                        )
                ),
                
                
                array(
                    'name'=>'estado',
                    'value'=>'$data->_estado[$data->estado]'
                ),
		
		/*
		
		'guia_remision_remitente',
		'guia_remision_transportista',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
		*/
                array(
                    'header'=>'Acción',
                    'class'=>'booster.widgets.TbButtonColumn',
                    'template'=>'{anular}',
                    'buttons'=>array(
                        'anular'=>array(
                            //'label'=>'<i class="glyphicon glyphicon-exclamation-sign"></i>',
                            'label'=>'anular',
                            'url'=>'Yii::app()->createUrl("comprobanteVenta/AnularFactura", array("id"=>$data->id))',
                            'visible'=>'$data->estado==0', //estado = pendiente de pago
                            'options'=>array(
                                'title'=>'Anular',
                                'confirm'=>'Esta seguro de anular este comprobante?',
                            )
                        )
                    ),
                    ),
),
)); ?>