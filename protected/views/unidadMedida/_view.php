<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unidad_medida')); ?>:</b>
	<?php echo CHtml::encode($data->unidad_medida); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nonmenclatura')); ?>:</b>
	<?php echo CHtml::encode($data->nonmenclatura); ?>
	<br />

	


</div>