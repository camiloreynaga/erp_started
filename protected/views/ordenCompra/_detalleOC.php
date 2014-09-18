<div>
    <h1> Productos <?php  ?></h1>
    
</div>

<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//$producto = new Producto('search');// Producto();//
//$producto->descontinuado=0;

$producto=Producto::model();//new Producto(); //
$producto->descontinuado=0;
        

//$this->widget('zii.widgets.grid.CGridView',array(
$this->widget('booster.widgets.TbGridView',array(    
        'id'=>'producto-grid',
        'dataProvider'=>  $producto->search(),
        'filter'=>$producto,
        'ajaxUrl'=>array('Producto/search&id='.$orden_compra->id.'&type=compra'),
        'columns'=>array(
                
            
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
                ),
		'descripcion',
		
                array(
                    'name'=>'presentacion_id',
                    'header'=>'Presentación',
                    'value'=>'$data->r_presentacion->presentacion',
                    'htmlOptions'=>array('style'=>'width: 115px;')
                ),
                array(
                    'name'=>'presentacion_id',
                    'header'=>'Presentación',
                    'value'=>'$data->r_presentacion->presentacion'
                ),
                array(
                    'name'=>'unidad_medida_id',
                    'header'=>'Medida',
                    'value'=>'$data->r_unidadMedida->unidad_medida'
                ),
                array(
                    'name'=>'fabricante_id',
                    'header'=>'Laboratorio',
                    'value'=>'$data->r_fabricante->fabricante'
                ),
            
            
               array(         // display a column with "view", "update" and "delete" buttons
                'class'=>'CButtonColumn',
                'template'=>'{add}',
                'buttons'=>array(
                    'add'=>array(
                        'label'=>'Agregar',
                        'url'=> '$this->grid->controller->createUrl("ordenCompra/addItem", array("idItem"=>$data->id,"idOrdenCompra"=>'.$orden_compra->id.'))',
                        'click'=>'function(){addItem($(this).attr("href")); $("#cru-dialog").dialog("open");  return false;}',
                        //'click'=>'$("#cru-dialog").dialog("open");  return false;}',
                        //'click'=>'addItem()'
                        
                        )
                    )
                ),
            )
        ));
?>

<?php
echo "<h1>Productos seleccionados</h1>";
$model=new DetalleOrdenCompra;
$model->orden_compra_id=$orden_compra->id;
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'detalle-compra-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		array(
                    'name'=>'producto',
                    'value'=>'$data->r_producto->nombre'
                ),
		array(
                    'name'=>'cantidad',
                    'value'=>'$data->cantidad." (und)"'
                ),
		array(
                    'name'=>'precio_unitario',
                    'value'=>'"S./ ".$data->precio_unitario'
                ),
		'lote',
                array(
                  'name'=>'subtotal',
                  'value'=>'"S./ ".$data->subtotal'
                ),
		
		array(
                    'class'=>'CButtonColumn',
                    'template'=>'{delete}',
                    'buttons'=>array(
                        'delete'=>array(
                            'url'=>'Yii::app()->createUrl("ordenCompra/deleteItem", array("id"=>$data->id))',
                        )
                    ),
                    'deleteConfirmation'=>'Esta seguro de eliminar este item?',
                    'afterDelete'=>'function(link,success,data){ if(success) window.location.reload(); }',
		),
	),
)); 

?>
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'cru-dialog',
    'options'=>array(
        'title'=>'Agregar Producto',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>550,
        'height'=>470,
    ),
));?>
<div class="divForForm"></div>

<?php $this->endWidget();
$jsDialog="
function addItem(url)
{
    ".CHtml::ajax(array(
            'url'=>'js:url',
            'data'=> "js:$('.divForForm').find('form').serialize()",
            'type'=>'post',
            'dataType'=>'json',
            'success'=>"function(data)
            {
                if (data.status == 'failure')
                {
                    $('#cru-dialog div.divForForm').html(data.div);
                          // Here is the trick: on submit-> once again this function!
                    //$('#cru-dialog div.divForForm form').submit(addItem);
                }
                if(data.status == 'success')
                {
                    $('#cru-dialog div.divForForm').html(data.div);
                    setTimeout(\"$('#cru-dialog').dialog('close') \",3000);
                    window.location.reload();
                }
                if(data.status == 'exist')
                {
                    $('#cru-dialog div.divForForm').html(data.div);
                    setTimeout(\"$('#cru-dialog').dialog('close') \",3500);
                }
 
            } ",
            ))."
    return false;
}
$('#cru-dialog').bind('dialogclose', function() {
    $('.form').html('');
});
$(document).ready(function(){
   $('#yt0').click(function(){
       if($('#detalle-compra-grid .items >tbody >tr .empty').length==1)
       {
           alert('Debe seleccionar almenos un producto..');
           return false;
       }
  });
 });
";
Yii::app()->clientScript->registerScript('dialog', $jsDialog, CClientScript::POS_END);
?> 