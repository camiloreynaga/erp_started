


<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if($_GET['type']=='compra')
{
    $id="idOrdenCompra";
    $url='ordenCompra/addItem';
}
else
{
    $url='venta/addItem';
    $id="idventa";
}

$producto->descontinuado=0;

$this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'producto-grid',
            'dataProvider'=>$producto->search(),//$producto->search('venta'),
            'filter'=>$producto,
            'ajaxUrl'=>array('Producto/search&id='.$_GET['id']), //'id'=$_GET['id']
            'columns'=>array(
                    //'tipo_producto',
                     array(
                    'name'=>'tipo_producto_id',
                    'header'=>'Tipo Producto',
                    'value'=>'$data->r_tipoProducto->tipo_producto',
                   // 'filter'=>CHtml::dropDownList('Producto[tipo_producto_id]',array(),CHtml::listData($producto->,'id','laboratorio'),array('prompt'=>'-- Seleccione --')),
                    'htmlOptions'=>array('style'=>'width: 115px;')
                ),
                array(
                    'name'=>'nombre',
                    'header'=>'Producto',
                    //'value'=>'$data->r_Producto'
                ),
		'descripcion',
		
                array(
                    'name'=>'presentacion_id',
                    'header'=>'Presentación',
                    'value'=>'$data->r_presentacion->presentacion',
                    'htmlOptions'=>array('style'=>'width: 115px;')
                ),
                array(
                    'name'=>'unidad_medida_id',
                    'header'=>'Medida',
                    'value'=>'$data->r_unidadMedida->unidad_medida',
                    'htmlOptions'=>array('style'=>'width: 115px;')
                ),
                array(
                    'name'=>'fabricante_id',
                    'header'=>'Laboratorio',
                    'value'=>'$data->r_fabricante->fabricante',
                    'htmlOptions'=>array('style'=>'width: 115px;')
                ),
                   array(         // display a column with "view", "update" and "delete" buttons
                    'class'=>'CButtonColumn',
                    'template'=>'{add}',
                    'buttons'=>array(
                        'add'=>array(
                            'label'=>'Agregar',
                            'url'=>'$this->grid->controller->createUrl("'.$url.'", array("idItem"=>$data->id,"'.$id.'"=>'.$_GET['id'].'))',
                            'click'=>'function(){addItem($(this).attr("href")); $("#cru-dialog").dialog("open");  return false;}',

                            //'click'=>'addItem()'

                        )
                    )
               ),
            ),
    ));
 
?>
