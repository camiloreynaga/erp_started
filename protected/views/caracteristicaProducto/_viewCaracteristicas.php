<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

//if(empty($data))
//    echo "Vacio";
//else
//{
//    $this->widget('')
    echo "arreglo";
    foreach ($_SESSION['arrayCaracteristica'] as $x => $x_value )
    {
        echo 'id ' .$x. ", caracteristica=". $x_value['caracteristica_id']. ", valor=". $x_value['valor'];
        echo '<br>';
    }
   
//    
//}
    
?>
