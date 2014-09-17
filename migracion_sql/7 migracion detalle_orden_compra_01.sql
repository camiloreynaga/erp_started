insert into erp_started2.tbl_detalle_orden_compra(
id,
orden_compra_id,
producto_id,
cantidad,
observacion,
precio_unitario,
subtotal,
impuesto,
total
)
select
id_detalle_compra,
id_compra,
producto,
cantidad,
null,
precio_unitario,
subtotal,
impuesto,
total
from drogueria2.detalle_compra
