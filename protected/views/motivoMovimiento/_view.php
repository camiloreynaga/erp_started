<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('movimiento')); ?>:</b>
	<?php echo CHtml::encode($data->movimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_movimiento')); ?>:</b>
	<?php echo CHtml::encode($data->_operacion[$data->tipo_movimiento]); ?>
	<br />

	


</div>