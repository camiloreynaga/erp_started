<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */



?>

<div class="view">
    <div class="left-column" style="padding-right: 75px;height: 70px;">
        <b><?php echo CHtml::encode($compra->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::encode($compra->id); ?>
	<br />

	<b><?php echo CHtml::encode($compra->getAttributeLabel('fecha_compra')); ?>:</b>
	<?php echo CHtml::encode($compra->fecha_compra); ?>
	<br />
        
        <b><?php echo CHtml::encode($compra->getAttributeLabel('orden_compra_id')); ?>:</b>
	<?php echo CHtml::encode($compra->orden_compra_id); ?>
	<br />
	
        <b><?php echo CHtml::encode($compra->getAttributeLabel('proveedor_id')); ?>:</b>
	<?php  echo CHtml::encode($compra->r_proveedor->nombre_rz); ?>
	<br />
        
    </div>
        <b><?php echo CHtml::encode($compra->getAttributeLabel('base_imponible')); ?>:</b>
	<?php echo CHtml::encode($compra->base_imponible); ?>
	<br />

	

	<b><?php echo CHtml::encode($compra->getAttributeLabel('impuesto')); ?>:</b>
	<?php echo CHtml::encode($compra->impuesto); ?>
	<br />

	<b><?php echo CHtml::encode($compra->getAttributeLabel('importe_total')); ?>:</b>
	<?php echo CHtml::encode($compra->importe_total); ?>
	<br />
    <div>
    <div style="clear: both"></div>
        
    </div>
	

	

	<?php /*
	<b><?php echo CHtml::encode($compra->getAttributeLabel('observacion')); ?>:</b>
	<?php echo CHtml::encode($compra->observacion); ?>
	<br />

	<b><?php echo CHtml::encode($compra->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($compra->estado); ?>
	<br />

	<b><?php echo CHtml::encode($compra->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($compra->create_time); ?>
	<br />

	<b><?php echo CHtml::encode($compra->getAttributeLabel('create_user_id')); ?>:</b>
	<?php echo CHtml::encode($compra->create_user_id); ?>
	<br />

	<b><?php echo CHtml::encode($compra->getAttributeLabel('update_time')); ?>:</b>
	<?php echo CHtml::encode($compra->update_time); ?>
	<br />

	<b><?php echo CHtml::encode($compra->getAttributeLabel('update_user_id')); ?>:</b>
	<?php echo CHtml::encode($compra->update_user_id); ?>
	<br />

	*/ ?>

</div>