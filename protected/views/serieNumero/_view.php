<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('serie')); ?>:</b>
	<?php echo CHtml::encode($data->serie); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero')); ?>:</b>
	<?php echo CHtml::encode($data->numero); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comprobante_id')); ?>:</b>
	<?php echo CHtml::encode($data->comprobante_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('punto_venta_id')); ?>:</b>
	<?php echo CHtml::encode($data->punto_venta_id); ?>
	<br />


</div>