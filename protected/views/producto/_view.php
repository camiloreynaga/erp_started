<?php
/* @var $this ProductoController */
/* @var $data Producto */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->nombre),array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_producto_id')); ?>:</b>
	<?php echo CHtml::encode($data->tipoProducto->tipo_producto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('presentacion_id')); ?>:</b>
	<?php echo CHtml::encode($data->presentacion->presentacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unidad_medida_id')); ?>:</b>
	<?php echo CHtml::encode($data->unidadMedida->unidad_medida); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fabricante_id')); ?>:</b>
	<?php echo CHtml::encode($data->fabricante->fabricante); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('minimo_stock')); ?>:</b>
	<?php echo CHtml::encode($data->minimo_stock); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stock')); ?>:</b>
	<?php echo CHtml::encode($data->stock); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descontinado')); ?>:</b>
	<?php echo CHtml::encode($data->descontinado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precio')); ?>:</b>
	<?php echo CHtml::encode($data->precio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ventaUnd')); ?>:</b>
	<?php echo CHtml::encode($data->ventaUnd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observacion')); ?>:</b>
	<?php echo CHtml::encode($data->observacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->create_user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b>
	<?php echo CHtml::encode($data->update_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->update_user_id); ?>
	<br />

	*/ ?>

</div>