<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comprobante_venta_id')); ?>:</b>
	<?php echo CHtml::encode($data->comprobante_venta_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_emision')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_emision); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('serie')); ?>:</b>
	<?php echo CHtml::encode($data->serie); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero')); ?>:</b>
	<?php echo CHtml::encode($data->numero); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('motivo_emision')); ?>:</b>
	<?php echo CHtml::encode($data->motivo_emision); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('base_imponible')); ?>:</b>
	<?php echo CHtml::encode($data->base_imponible); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('impuesto')); ?>:</b>
	<?php echo CHtml::encode($data->impuesto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('importe_total')); ?>:</b>
	<?php echo CHtml::encode($data->importe_total); ?>
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