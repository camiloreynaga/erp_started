<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php
$model->compra_id=$pid;

$this->widget('booster.widgets.TbGridView',array(
'id'=>'comprobante-compra-grid',
'dataProvider'=>$model->search(),
//'filter'=>$model,
'columns'=>array(
		//'id',
		//'compra_id',
                array(
                    'name'=>'tipo_comprobante_id',
                    'header'=>'Comprobante',
                    'value'=>'$data->r_tipoComprobante->comprobante',
                ),
		array(
                    'name'=>'fecha_emision',
                    'header'=>'F. Emision',
                    
                ),
		array(
                    'name'=>'fecha_cancelacion',
                    'header'=>'F. Cancelación'
                ),
		
		'serie',
		'numero',
		//'estado',
                array(
                    'name'=>'guia_remision_remitente',
                    'header'=>'GR. Remitente'
                ),
                array(
                    'name'=>'guia_remision_transportista',
                    'header'=>'GR Transportista'
                )
		
		
		/*'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
		*/

),
)); ?>