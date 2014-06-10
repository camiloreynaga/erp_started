<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_rz')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_rz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ruc')); ?>:</b>
	<?php echo CHtml::encode($data->ruc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contacto')); ?>:</b>
	<?php echo CHtml::encode($data->contacto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion')); ?>:</b>
	<?php echo CHtml::encode($data->direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ciudad')); ?>:</b>
	<?php echo CHtml::encode($data->ciudad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono')); ?>:</b>
	<?php echo CHtml::encode($data->telefono); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('linea_credito')); ?>:</b>
	<?php echo CHtml::encode($data->linea_credito); ?>
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