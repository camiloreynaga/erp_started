<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('remitente')); ?>:</b>
	<?php echo CHtml::encode($data->remitente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('serie')); ?>:</b>
	<?php echo CHtml::encode($data->serie); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero')); ?>:</b>
	<?php echo CHtml::encode($data->numero); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cliente_proveedor_id')); ?>:</b>
	<?php echo CHtml::encode($data->cliente_proveedor_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('motivo_traslado')); ?>:</b>
	<?php echo CHtml::encode($data->motivo_traslado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_inicio_traslado')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_inicio_traslado); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('transportista_id')); ?>:</b>
	<?php echo CHtml::encode($data->transportista_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('punto_partida')); ?>:</b>
	<?php echo CHtml::encode($data->punto_partida); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('punto_llegada')); ?>:</b>
	<?php echo CHtml::encode($data->punto_llegada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('marca_placa')); ?>:</b>
	<?php echo CHtml::encode($data->marca_placa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('licencia_conducir')); ?>:</b>
	<?php echo CHtml::encode($data->licencia_conducir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado_gr')); ?>:</b>
	<?php echo CHtml::encode($data->estado_gr); ?>
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