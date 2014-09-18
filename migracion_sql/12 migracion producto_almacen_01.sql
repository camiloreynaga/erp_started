insert into erp_started2.tbl_producto_almacen(
-- id,
almacen_id,
producto_id,
lote,
fecha_vencimiento,
cantidad_disponible,
cantidad_real,
-- create_time,
create_user_id,
update_time,
update_user_id
)
select
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
group by drogueria2.detalle_compra.lote, drogueria2.detalle_compra.producto;