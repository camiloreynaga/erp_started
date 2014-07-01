<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_movimiento')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_movimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('producto_id')); ?>:</b>
	<?php echo CHtml::encode($data->producto_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('motivo_movimiento_id')); ?>:</b>
	<?php echo CHtml::encode($data->motivo_movimiento_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detalle_compra_id')); ?>:</b>
	<?php echo CHtml::encode($data->detalle_compra_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detalle_venta_id')); ?>:</b>
	<?php echo CHtml::encode($data->detalle_venta_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('observacion')); ?>:</b>
	<?php echo CHtml::encode($data->observacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('almacen_id')); ?>:</b>
	<?php echo CHtml::encode($data->almacen_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('saldo_stock')); ?>:</b>
	<?php echo CHtml::encode($data->saldo_stock); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('operacion')); ?>:</b>
	<?php echo CHtml::encode($data->operacion); ?>
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