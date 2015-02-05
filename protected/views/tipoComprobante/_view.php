<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comprobante')); ?>:</b>
	<?php echo CHtml::encode($data->comprobante); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo_comprobante')); ?>:</b>
	<?php echo CHtml::encode($data->codigo_comprobante); ?>
	<br />

	


</div>