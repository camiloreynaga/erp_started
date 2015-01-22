<?php 
//----------conexion---------//
include("texto.php");
include("conexion.php");
$link = Conectarse();
//----------conexion---------//

$idVenta= $_GET['id_venta'];//2;//prueba local
//-----------------consulta tabla cliente------------------------------//

$consultaVenta = mysql_query("SELECT cliente_id, fecha_venta,forma_pago_id FROM tbl_venta WHERE id ='$idVenta' ",$link);
$consultaComprobante=mysql_query("SELECT fecha_emision FROM tbl_comprobante_venta WHERE estado!=2 AND venta_id ='$idVenta' ",$link);
$venta= mysql_fetch_array($consultaVenta);

$comprobante= mysql_fetch_array($consultaComprobante);

//-----------------consulta tabla cliente------------------------------//
$consultaCliente = mysql_query("SELECT id, nombre_rz, ruc, direccion FROM tbl_cliente WHERE id ='$venta[0]' ",$link);
$cliente= mysql_fetch_array($consultaCliente);


//$idCuentaCobrar=$_GET[['idcl'];// parametro pasado por la URL
//$idCuentaCobrar=1;//prueba local
//-----------------consulta tabla cuenta_cobrar------------------------------//
//$consultaCuentaCobrar = mysql_query("SELECT fecha_venta FROM cuenta_cobrar WHERE idcuenta_cobrar ='$idCuentaCobrar' ",$link);
//$cuenta= mysql_fetch_array($consultaCuentaCobrar);


//$idVenta=$_GET['id_venta'];//parametro pasado por la URL
//-----------------consulta tabla detalle_venta------------------------------//
$consultaDetallle ="SELECT venta_id, producto_id,lote, cantidad, precio_unitario,fecha_vencimiento FROM  tbl_detalle_venta WHERE venta_id='$idVenta'"; 


$detalle= mysql_query($consultaDetallle,$link);

// variables
	$id_venta=array();
	$id_producto=array();
	$lote=array();
	$cantidad=array();
	$precio=array();
        $fecha_venc=array();
 
//$consultaFechaVenc= "SELECT fecha_vencimiento FROM detalle_compra WHERE producto='$id_producto' and lote='$lote'";   

//$fecha_venc_Detalle_compra= mysql_query($consultaFechaVenc,$link);

//while($row3=  mysql_fetch_array($consultaFechaVenc))
//{
    
//}


        
while($row2=  mysql_fetch_array($detalle))
		{
		array_push($id_venta,$row2[0]);
		array_push($id_producto,$row2[1]);
		array_push($lote,$row2[2]);
		array_push($cantidad,$row2[3]);
		array_push($precio,$row2[4]);
                //Consultamoas la tabla detalle de compra para obtener la fecha de vencimiento
                $consultaFechaVenc= "SELECT fecha_vencimiento FROM tbl_producto_almacen WHERE producto_id='$row2[1]' and lote='$row2[2]'";  
                $Res_fecha_venc= mysql_query($consultaFechaVenc,$link);
                $fecha_vencimiento= mysql_fetch_array($Res_fecha_venc);
                
                array_push($fecha_venc,$fecha_vencimiento[0]);
//                array_push($fecha_venc,$row2[5]);// toma la fecha del detalle de venta.
		}

                
?>
<?php
include('pdf/class.ezpdf.php'); //uso de la clase PDF
$pdf =  new Cezpdf('B4','upright');// detalles de tipos de pagina y orientacion
$pdf->selectFont('pdf/fonts/Courier.afm');
$datacreator = array ( //datos ocutos de creacion
					'Title'=>'COMPROBANTE DE PAGO',
					'Author'=>'FARDISUR',
					'Subject'=>'FARDISUR',
					'Creator'=>'info@kiwisoluciones.com',
					'Producer'=>'KIWI SOLUCIONES SAC'
					);
$pdf->addInfo($datacreator);
//-------declaracion de la variable TOTAL-----------------///
$total=0;
	
$lineas=34;	
for($j=0;$j<$lineas;$j++)
{
    if(isset($id_producto[$j]))
    {
    //------consulta para obtener producto---------------//
    $consultaProducto= mysql_query("SELECT nombre FROM tbl_producto WHERE id='$id_producto[$j]'",$link);
    $producto=  mysql_fetch_array($consultaProducto);
    //-------------------fin -----------------------//
    //-----calculo del valor de producto-------------//
    $valorVenta=$cantidad[$j]*$precio[$j];//-($descuento1+$descuento2);

    //--------------------------------------------------------------
    //---------calculo del total a facturar------------------------
    $total=$total +$valorVenta;
    //--------------------------------------------------------------
        if($valorVenta!="")
        {
            $valorVenta=number_format($valorVenta,2);
        }
        else
        {
            $valorVenta="";
        }
        //capturamos la fecha de vencimiento para transformarla al formato de la factura
        if($fecha_venc[$j]!="")
        {
            $anno=strftime('%y', strtotime($fecha_venc[$j]));
            
            $mes=strftime('%m', strtotime($fecha_venc[$j]));
           
            $venc=$mes.'/'.$anno;
        }
        else
        {
            $venc="";
        }


//if(isset($cantidad[$j])  | isset($lote[$j]) | isset($precio[$j]))
    //if(isset($producto[0]))
//    $data[] = array('cod'=>$id_producto[$j], 'cantidad'=>$cantidad[$j],'unidad'=>$unidad,'descripcion'=>$producto[0],'lote'=>$lote[$j],'vencimiento'=>$venc,'precio'=>$precio[$j],'valor'=>$valorVenta,'dis'=>"");// areglo que almacena Datos 

$data[] = array('cod'=>$id_producto[$j], 'cantidad'=>$cantidad[$j],'unidad'=>" ",'descripcion'=>$producto[0],'lote'=>$lote[$j],'vencimiento'=>$venc,'precio'=>$precio[$j],'valor'=>$valorVenta,'dis'=>"");// areglo que almacena Datos 




   
	
	
        //--------------------------para contar los caracteres para el salto de linea--------- //
        $cadena=saltoLinea($producto[0]);
        if(1<$cadena)
        {
                $lineas=$lineas-($cadena-1);		
        }
    }
        else
      $data[] = array('cod'=>" ", 'cantidad'=>" ",'unidad'=>" ",'descripcion'=>" ",'lote'=>" ",'vencimiento'=>" ",'precio'=>" ",'valor'=>" ",'dis'=>" ");
//    	
///--------------------
 }



$titles = array('cod'=>'<b></b>','cantidad'=>'<b></b>','unidad'=>'<b></b>','descripcion'=>'<b>  </b>','lote'=>'<b></b>','vencimiento'=>'<b></b>', 'precio'=>'<b></b>', 'valor'=>'<b></b>', 'dis'=>'<b></b>');// asignacion de titulos para cada dato o columna

//-----------------datos almacenado en un arreglo de la parte superior de la factura------------------------------//
//$dataT = array( array('texto'=>"Urb. Entel Peru B-19-Wanchaq", 'factura'=>"R.U.C. 20490478869"), array('texto'=>"Cusco - Cusco",'factura'=>"$comprobante[0]"),array('texto'=>"Telefonos: 950 313562, 962 736115",'factura'=>"101 Nï¿½ $comprobante[1]"));


//fecha de venta de los productos
//$fecha=strftime('%d/%m/%y', strtotime($venta[1])); 
$fecha=strftime('%d/%m/%y', strtotime($comprobante[0])); 

//sumando 25 dÃ­as a la fecha de venta
$datearray= explode("/",$fecha);
$date_finish = date( "Y-m-d ", mktime(0,0,0,$datearray[1],$datearray[0]+25,$datearray[2]));

// fecha 25 dias despues para el pago del la factura

if(strtolower($venta[2])=="2" | strtolower($venta[2])=="contado")
{
    $fecha1=$fecha;
    $condiciones_pago="CONTADO";
}
else
{
    if(strtolower($venta[2])=="1" |strtolower($venta[2])=="credito"  )
         $condiciones_pago="CREDITO";
    if(strtolower($venta[2])=="3" | strtolower($venta[2])=="letra" )
         $condiciones_pago="LETRA";
    $fecha1= strftime('%d/%m/%y', strtotime($date_finish)); 
    

}






//-----------------datos almacenados en un arreglo de los datos de la parte media de la factura------------------------------//

$dataG = array( array('datos'=>"<b>            </b>$fecha", 'datos2'=>""),array('datos'=>"<b>         </b> $cliente[1]", 'datos2'=>""),array('datos'=>"<b>  </b> $cliente[2]", 'datos2'=>"<b>  </b> $guia"), array('datos'=>"<b>        </b> $cliente[3]",'datos2'=>"<b>     </b> $condiciones_pago"),array('datos'=>"<b>          </b> $cliente[0]",'datos2'=>"<b>    </b> $fecha1"));

//-----------------codigo que inserta la imagen o logo ------------------------------//
//$pdf->addJpegFromFile('imagenes/logo.jpg',20,320,150,'70');
//$pdf->addJpegFromFile('imagenes/logo.jpg',250,190,220,'100');

//-----------------recuadro que muestra la parte superior de la factura------------------------------//
//$pdf->ezTable($dataT,"texto",'',array('showHeadings'=>0,'width'=>350,'xPos'=>'right', 'leading' =>0,'xOrientation'=>'left','shaded'=>0,'showLines'=>0,'cols'=>array('texto'=>array('justification'=>'center'),'factura'=>array('justification'=>'center'))));
///-------------------------


$pdf->ezText("\n\n\n\n\n\n\n\n\n\n",8);

//-----------------recuadro que muestra los contenidos de la parte media de la factura ------------------------------//
$pdf->ezTable($dataG,'texto','',array('rowGap'=>1,'fontSize'=>10, 'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'right','xOrientation'=>'left','leading' =>0,'width'=>610,
    'cols'=>array('datos'=>array('justification'=>'left','width'=>440),
'precio'=>array('datos2'=>'right','width'=>120))));



//-----------------recuadro que muestra los detalles de venta de la factura------------------------------//

$pdf->ezTable($data,$titles,'',
        array('showHeadings'=>1,'showLines'=>0,'shaded'=>0,'xPos'=>'right','xOrientation'=>'left','width'=>670,'fontSize'=>10,
            'rowGap'=>2,'colGap'=>2,
            'cols'=>array('unidad'=>array('justification'=>'left','width'=>1),
                          'descripcion'=>array('justification'=>'left','width'=>277),
                          'precio'=>array('justification'=>'right','width'=>47),
                          'valor'=>array('justification'=>'right','width'=>65),
                          'vencimiento'=>array('justification'=>'right','width'=>40),
                          'lote'=>array('justification'=>'right','width'=>64),
                          'dis'=>array('justification'=>'right','width'=>32),
                          'cod'=>array('justification'=>'left','width'=>30),
                          'cantidad'=>array('justification'=>'left','width'=>50))));

//-----------------calculos de IGV y SUBTOTAL------------------------------//
$subTotal=$total/1.18;
$igv=$subTotal*0.18;


//--------------almacenamiento de un array de los datos TEXTO TOTAL, SUBTOTAL, IGV, TOTAL, (resumen de la factura)------------------------//
$dataTotales = array( array('dato'=>"<b>      </b> ".strtoupper(numerotexto(number_format($total,2))), 'dato2'=>"       ", 'dato3'=>number_format($subTotal,2),'dist'=>""),array('dato'=>"", 'dato2'=>" ",'dato3'=>"",'dist'=>""),array('dato'=>"", 'dato2'=>" ",'dato3'=>number_format($igv,2),'dist'=>""),array('dato'=>"", 'dato2'=>" ",'dato3'=>"",'dist'=>""),array('dato'=>"", 'dato2'=>"<b>   </b>",'dato3'=>number_format($total,2),'dist'=>""));
///------------------------------------------------


//-----------------recuadro que muestra datos de (resumen de facturacion)------------------------------//
$pdf->ezTable($dataTotales,'texto','',array('rowGap'=>1,'colGap'=>3,'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'right','xOrientation'=>'left','leading' =>0,'width'=>630,'cols'=>array(
'dato2'=>array('justification'=>'right'),'dato3'=>array('justification'=>'right'),'dist'=>array('justification'=>'right','width'=>30))));


//-----------------texto inferior de la factura------------------------------//
$pdf->ezStream();
?>
