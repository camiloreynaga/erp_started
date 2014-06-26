<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
echo "<h1>Productos seleccionados</h1>";
?>

<?php 
$model=new DetalleOrdenCompra;
$model->orden_compra_id=$orden_compra_id;

$this->widget('booster.widgets.TbGridView',array(
'id'=>'detalle-orden-compra-grid',
'dataProvider'=>$model->search(),
//'filter'=>$model,
'columns'=>array(
		'id',
		'orden_compra_id',
		'cotizacion_id',
		'producto_id',
		'cantidad',
		'observacion',
		/*
		'precio_unitario',
		'subtotal',
		'impuesto',
		'total',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>