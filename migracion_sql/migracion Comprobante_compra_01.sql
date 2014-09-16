insert into erp_started2.tbl_comprobante_compra(
-- id,
compra_id,
tipo_comprobante_id,
-- fecha_emision,
-- fecha_cancelacion,
serie,
numero,
estado,
-- guia_remision_remitente,
-- guia_remision_transportista,
create_time,
create_user_id,
update_time,
update_user_id)
select
id,
1,
left(nro_factura,4),
nro_factura,
0,
fecha_compra,
1,
now(),
1
from drogueria2.compra
