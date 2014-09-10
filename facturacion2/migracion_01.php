<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
header('Content-type: text/plain');

$conexion = mysql_connect('localhost', 'root', 'adonde');

// De que base de datos vamos a tomar las tablas
$db_from = 'drogueria2';
// A que base de datos vamos a migrar las tablas
$db_to = 'erp_started2';
// Con los datos o no
$data = true;

 function consulta($sql)
    { 
        $res = mysql_query($sql) or die ("No se pudieron obtener datos en la consulta por: ".mysql_error());
        return $res; 
        
    } 

 if(consulta("INSERT INTO tbl_proveedor(id,nombre_rz, ruc, contacto, direccion, ciudad, telefono, linea_credito, credito_disponible,activo,create_time,create_user_id,update_time,update_user_id)"
            . "SELECT id, nombre_proveedor, ruc,contacto,direccion,ciudad,telefono,0,0,fecha,1,fecha,1), "
            . " FROM producto;")){
            printf("PROVEEDORES MIGRADOS CON EXITO\n");
    }
