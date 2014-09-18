insert into erp_started2.tbl_movimiento_almacen(
-- id,
fecha_movimiento,
producto_id,
cantidad,
motivo_movimiento_id,
detalle_venta_id,
observacion,
almacen_id,
-- saldo_stock,
operacion,
create_time,
create_user_id,
update_time,
update_user_id)

select
-- id,
create_time,
producto_id,
cantidad,
2,
id,
'MIGRACION ERP',
1,
1,
now(),
1,
now(),
1
from erp_started2.tbl_detalle_venta;





