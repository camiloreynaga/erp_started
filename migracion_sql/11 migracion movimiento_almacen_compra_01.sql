insert into erp_started2.tbl_movimiento_almacen(
-- id,
-- fecha_movimiento,
producto_id,
cantidad,
motivo_movimiento_id,
detalle_compra_id,
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
-- now(),
producto,
cantidad,
1,
id_detalle_compra,
'MIGRACION ERP',
1,
0,
now(),
1,
now(),
1
from drogueria2.detalle_compra;





