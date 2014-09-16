insert into erp_started2.tbl_compra(
id,
fecha_compra,
proveedor_id,
base_imponible,
orden_compra_id,
impuesto,
importe_total,
observacion,
estado,
estado_comprobante,
estado_pago,
create_time,
create_user_id,
update_time,
update_user_id)
select
id,
fecha_compra,
id_proveedor,
subtotal,
id,
impuesto,
total,
(select case observaciones when '' then 'MIGRACION ERP' else observaciones end),
1, -- revisado
0,
0,
fecha_compra,
1,
now(),
1
from drogueria2.compra
