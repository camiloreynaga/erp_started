<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('orden_compra_id')); ?>:</b>
	<?php echo CHtml::encode($data->orden_compra_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cotizacion_id')); ?>:</b>
	<?php echo CHtml::encode($data->cotizacion_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('producto_id')); ?>:</b>
	<?php echo CHtml::encode($data->producto_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observacion')); ?>:</b>
	<?php echo CHtml::encode($data->observacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precio_unitario')); ?>:</b>
	<?php echo CHtml::encode($data->precio_unitario); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('subtotal')); ?>:</b>
	<?php echo CHtml::encode($data->subtotal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('impuesto')); ?>:</b>
	<?php echo CHtml::encode($data->impuesto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total')); ?>:</b>
	<?php echo CHtml::encode($data->total); ?>
	<br />

	*/ ?>

</div>