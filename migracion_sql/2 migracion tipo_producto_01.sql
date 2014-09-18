insert into erp_started2.tbl_tipo_producto (
id,
tipo_producto,
activo,
create_time,
create_user_id,
update_time,
update_user_id
)
select 
id,
tipo_producto,
0,
now(),
1,
now(),
1
from drogueria2.tipo_producto;