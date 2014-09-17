insert into erp_started2.tbl_venta(
id,
fecha_venta,
cliente_id,
vendedor_id,
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
2,
(select case forma_pago 
when 'CREDDITO' then 1
when 'CREDIDTO' then 1
when 'CR' then 1
when 'CREDITO' then 1
when 'CONTADO' then 2
when 'letra' then 3
else 1 end),
subtotal,
impuesto,
total,
4,
0,
0,
fecha_venta,
1,
now(),
1
from drogueria2.venta