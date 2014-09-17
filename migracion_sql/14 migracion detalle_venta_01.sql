insert into erp_started2.tbl_detalle_venta(
id,
venta_id,
producto_id,
cantidad,
precio_unitario,
subtotal,
impuesto,
total,
lote,
fecha_vencimiento,
estado,
-- create_time,
create_user_id,
update_time,
update_user_id
)
select
id_detalle_venta,
id_venta,
id_producto,
cantidad,
precio_unitario,
subtotal,
impuesto,
total,
lote,
fecha_vencimiento,
1,
-- fecha_venta,
1,
now(),
1
from drogueria2.detalle_venta