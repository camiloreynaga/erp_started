insert into erp_started2.tbl_venta(
id,
fecha_venta,
cliente_id,
-- vendedor_id,
forma_pago_id,
base_imponible,
impuesto,
importe_total,
-- observacion,
estado,
estado_comprobante,
estado_pago,
create_time,
create_user_id,
update_time,
update_user_id
)
select
id,
fecha_venta,
id_cliente,
-- id_empleado,
forma_pago,
subtotal,
impuesto,
total,

1,
producto,
lote,
fecha_vencimiento,
sum(cantidad),
sum(cantidad),
1,
now(),
1
from drogueria2.detalle_compra