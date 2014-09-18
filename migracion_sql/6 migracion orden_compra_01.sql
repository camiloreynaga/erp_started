insert into erp_started2.tbl_orden_compra(
id,
fecha_orden,
proveedor_id,
cotizacion_id,
observaciones,
estado,
create_time,
create_user_id,
update_time,
update_user_id)
select
id,
fecha_compra,
id_proveedor,
null,
observaciones,
0,
now(),
1,
now(),
1
from drogueria2.compra
