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

 if(consulta("INSERT INTO erp_started2.tbl_proveedor"
         . "(id," //1
         . "nombre_rz," //2
         . " ruc," //3
         . " contacto," //4 
         . " direccion," //5
         . " ciudad," //6
         . " telefono, " //7
         . "linea_credito, " //8
         . "credito_disponible," //9
         . "activo," //10
         . "create_time," //11
         . "create_user_id," //12
         . "update_time," //13
         . "update_user_id)" //14
            . "SELECT " 
         . "id," //1
         . "nombre_proveedor," //2
         . " ruc," //3
         . "contacto," //4
         . "direccion," //5
         . "ciudad," //6
         . "telefono," //7
         . "0," //8
         . "0," //9
         . "0,"
         . "fecha," //10
         . "1," //11
         . "fecha," //12
         . "1 " //13
            . " FROM drogueria2.proveedor;")){
            printf("PROVEEDORES MIGRADOS CON EXITO\n");
    }
