insert into erp_started2.tbl_cliente(
id,
nombre_rz,
ruc,
contacto,
direccion,
ciudad,
telefono,
linea_credito,
credito_disponible,
activo,
create_time,
create_user_id,
update_time,
update_user_id)
select
id,
nombre,
ruc,
contacto,
direccion,
ciudad,
telefono_contacto,
0,
0,
0,
fecha_registro,
1,
now(),
1
from drogueria2.cliente
