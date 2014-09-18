insert into erp_started2.tbl_presentacion(
id,
presentacion,
abreviatura,
activo,
create_time,
create_user_id,
update_time,
update_user_id
)
select
id_presentacion,
presentacion,
nomeclatura,
0,
now(),
1,
now(),
1
from drogueria2.presentacion;