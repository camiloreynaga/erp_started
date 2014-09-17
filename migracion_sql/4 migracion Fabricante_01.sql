insert into erp_started2.tbl_fabricante (
id,
fabricante,
activo,
create_time,
create_user_id,
update_time,
update_user_id
)
select 
id,
laboratorio,
0,
now(),
1,
now(),
1
from drogueria2.laboratorio;