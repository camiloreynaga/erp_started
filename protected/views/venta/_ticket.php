

<?php
$empresa = Empresa::model()->findByPk(1);

$_header="\x1B\x40 \x1B\x21\x08";

$rz=$empresa->razon_social; //"PLASTIPLAS S.R.L.";
$ruc='RUC: '.$empresa->ruc;//"RUC: 20491097176";
$direccion= $empresa->direccion;  //"DIREC: AV. MARISCAL CASTILLA NRO. 100 CUSCO - URUBAMBA - URUBAMBA";
$_asterik=" *************************************** \r\n";
$_line=" ---------------------------------------\r\n ";
$footer=" \r\n \r\n \x1D\x56\x41 \x1B\x40";


$pid=$_GET['id'];
$lista = DetalleVenta::model()->findAll('venta_id=:venta_id',array(':venta_id'=>$pid));
$venta = Venta::model()->findByPk($pid);
$_comprobante= ComprobanteVenta::model()->getUltimo_comprobante($pid);
$_tipo_comprobante=$_comprobante->r_tipo_comprobante->comprobante;//"FActura";//$venta->r_comprobante_venta->r_tipo_comprobante->comprobante;

//obtener datos de cliente
   $_cliente="";
   $_cliente_ruc="";
   $_cliente_direccion="";
    if ($_comprobante->tipo_Comprobante==1)
    {
        $_cliente=$venta->r_cliente->nombre_rz;
        $_cliente_ruc=$venta->r_cliente->ruc;
        $_cliente_direccion=$venta->r_cliente->direccion;
    }
//else
//{
//   
//}



$_serie= $_comprobante->serie;//'001';//
$_numero=$_comprobante->numero; //$venta->r_comprobante_venta->numero;
$detalle=array();
foreach($lista as $list){
    $detalle[]= $list->r_producto->nombre.'\r\n'.$list->cantidad.'               '.$list->precio_unitario.'     '.$list->total // producto_id,
    ;
}
print_r($detalle);

echo count($detalle);
//echo $detalle[0]['cant'];
$_cant=null;
$_descrip=null;
$_pu=null;

?>

<!-- License:  LGPL 2.1 or QZ INDUSTRIES SOURCE CODE LICENSE -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/deployJava.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/html2canvas.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.plugin.html2canvas.js"></script>
<script type="text/javascript">
	/**
	* Optionally used to deploy multiple versions of the applet for mixed
	* environments.  Oracle uses document.write(), which puts the applet at the
	* top of the page, bumping all HTML content down.
	*/
	deployQZ();
	/**
	* Deploys different versions of the applet depending on Java version.
	* Useful for removing warning dialogs for Java 6.  This function is optional
	* however, if used, should replace the <applet> method.  Needed to address 
	* MANIFEST.MF TrustedLibrary=true discrepency between JRE6 and JRE7.
	*/
	function deployQZ() {
		var attributes = {id: "qz", code:'qz.PrintApplet.class', 
			archive:'<?php echo Yii::app()->request->baseUrl; ?>/jar/qz-print.jar', width:1, height:1};
		var parameters = {jnlp_href: '<?php echo Yii::app()->request->baseUrl; ?>/jar/qz-print_jnlp.jnlp', 
			cache_option:'plugin', disable_logging:'false', 
			initial_focus:'false'};
		if (deployJava.versionCheck("1.7+") == true) {}
		else if (deployJava.versionCheck("1.6+") == true) {
			delete parameters['jnlp_href'];
		}
		deployJava.runApplet(attributes, parameters, '1.5');
	}
	
	/**
	* Automatically gets called when applet has loaded.
	*/
	function qzReady() {
		// Setup our global qz object
		window["qz"] = document.getElementById('qz');
		var title = document.getElementById("title");
		if (qz) {
			try {
				title.innerHTML = title.innerHTML + " " + qz.getVersion();
				document.getElementById("content").style.background = "#F0F0F0";
			} catch(err) { // LiveConnect error, display a detailed meesage
				document.getElementById("content").style.background = "#F5A9A9";
				alert("ERROR:  \nThe applet did not load correctly.  Communication to the " + 
					"applet has failed, likely caused by Java Security Settings.  \n\n" + 
					"CAUSE:  \nJava 7 update 25 and higher block LiveConnect calls " + 
					"once Oracle has marked that version as outdated, which " + 
					"is likely the cause.  \n\nSOLUTION:  \n  1. Update Java to the latest " + 
					"Java version \n          (or)\n  2. Lower the security " + 
					"settings from the Java Control Panel.");
		  }
	  }
	}
	
	/**
	* Returns whether or not the applet is not ready to print.
	* Displays an alert if not ready.
	*/
	function notReady() {
		// If applet is not loaded, display an error
		if (!isLoaded()) {
			return true;
		}
		// If a printer hasn't been selected, display a message.
		else if (!qz.getPrinter()) {
			alert('Please select a printer first by using the "Detect Printer" button.');
			return true;
		}
		return false;
	}
	
	/**
	* Returns is the applet is not loaded properly
	*/
	function isLoaded() {
		if (!qz) {
			alert('Error:\n\n\tPrint plugin is NOT loaded!');
			return false;
		} else {
			try {
				if (!qz.isActive()) {
					alert('Error:\n\n\tPrint plugin is loaded but NOT active!');
					return false;
				}
			} catch (err) {
				alert('Error:\n\n\tPrint plugin is NOT loaded properly!');
				return false;
			}
		}
		return true;
	}
	
	/**
	* Automatically gets called when "qz.print()" is finished.
	*/
	function qzDonePrinting() {
		// Alert error, if any
		if (qz.getException()) {
			alert('Error printing:\n\n\t' + qz.getException().getLocalizedMessage());
			qz.clearException();
			return; 
		}
		
		// Alert success message
		alert('Impresion exitosa en impresora "' + qz.getPrinter() + '".');
	}
	
	/***************************************************************************
	* Prototype function for finding the "default printer" on the system
	* Usage:
	*    qz.findPrinter();
	*    window['qzDoneFinding'] = function() { alert(qz.getPrinter()); };
	***************************************************************************/
	function useDefaultPrinter() {
		if (isLoaded()) {
			// Searches for default printer
			qz.findPrinter();
			
			// Automatically gets called when "qz.findPrinter()" is finished.
			window['qzDoneFinding'] = function() {
				// Alert the printer name to user
				var printer = qz.getPrinter();
				alert(printer !== null ? 'Default printer found: "' + printer + '"':
					'Default printer ' + 'not found');
				
				// Remove reference to this function
				window['qzDoneFinding'] = null;
			};
		}
	}
	
	/***************************************************************************
	* Prototype function for printing raw commands directly to the filesystem
	* Usage:
	*    qz.append("\n\nHello world!\n\n");
	*    qz.printToFile("C:\\Users\\Jdoe\\Desktop\\test.txt");
	***************************************************************************/
	function printToFile() {
		if (isLoaded()) {
			// Any printer is ok since we are writing to the filesystem instead
			qz.findPrinter();
			
			// Automatically gets called when "qz.findPrinter()" is finished.
			window['qzDoneFinding'] = function() {
				// Send characters/raw commands to qz using "append"
				// Hint:  Carriage Return = \r, New Line = \n, Escape Double Quotes= \"
				qz.append("A590,1600,2,3,1,1,N,\"QZ Print Plugin " + qz.getVersion() + " sample.html\"\n");
				qz.append("A590,1570,2,3,1,1,N,\"Testing qz.printToFile() function\"\n");
				qz.append("P1\n");
				
				// Send characters/raw commands to file
				// i.e.  qz.printToFile("\\\\server\\printer");
				//       qz.printToFile("/home/user/test.txt");
				qz.printToFile("C:\\qz-print_test-print.txt");
				
				// Remove reference to this function
				window['qzDoneFinding'] = null;
			};
		}
	}
	
	/***************************************************************************
	* Prototype function for printing raw commands directly to a hostname or IP
	* Usage:
	*    qz.append("\n\nHello world!\n\n");
	*    qz.printToHost("192.168.1.254", 9100);
	***************************************************************************/
	function printToHost() {
		if (isLoaded()) {
			// Any printer is ok since we are writing to a host address instead
			qz.findPrinter();
			
			// Automatically gets called when "qz.findPrinter()" is finished.
			window['qzDoneFinding'] = function() {
				// Send characters/raw commands to qz using "append"
				// Hint:  Carriage Return = \r, New Line = \n, Escape Double Quotes= \"
				qz.append("A590,1600,2,3,1,1,N,\"QZ Print Plugin " + qz.getVersion() + " sample.html\"\n");
				qz.append("A590,1570,2,3,1,1,N,\"Testing qz.printToHost() function\"\n");
				qz.append("P1\n");
				
				// qz.printToHost(String hostName, int portNumber);
				// qz.printToHost("192.168.254.254");   // Defaults to 9100
				qz.printToHost("192.168.1.254", 9100);
				
				// Remove reference to this function
				window['qzDoneFinding'] = null;
			};
		}
	}
	
	
	/***************************************************************************
	* Prototype function for finding the closest match to a printer name.
	* Usage:
	*    qz.findPrinter('zebra');
	*    window['qzDoneFinding'] = function() { alert(qz.getPrinter()); };
	***************************************************************************/
	function findPrinter(name) {
		// Get printer name from input box
		var p = document.getElementById('printer');
		if (name) {
			p.value = name;
		}
		
		if (isLoaded()) {
			// Searches for locally installed printer with specified name
			qz.findPrinter(p.value);
			
			// Automatically gets called when "qz.findPrinter()" is finished.
			window['qzDoneFinding'] = function() {
				var p = document.getElementById('printer');
				var printer = qz.getPrinter();
				
				// Alert the printer name to user
				alert(printer !== null ? 'Printer found: "' + printer + 
					'" after searching for "' + p.value + '"' : 'Printer "' + 
					p.value + '" not found.');
				
				// Remove reference to this function
				window['qzDoneFinding'] = null;
			};
		}
	}
	
	/***************************************************************************
	* Prototype function for listing all printers attached to the system
	* Usage:
	*    qz.findPrinter('\\{dummy_text\\}');
	*    window['qzDoneFinding'] = function() { alert(qz.getPrinters()); };
	***************************************************************************/
	function findPrinters() {
		if (isLoaded()) {
			// Searches for a locally installed printer with a bogus name
			qz.findPrinter('\\{bogus_printer\\}');
			
			// Automatically gets called when "qz.findPrinter()" is finished.
			window['qzDoneFinding'] = function() {
				// Get the CSV listing of attached printers
				var printers = qz.getPrinters().split(',');
				for (i in printers) {
					alert(printers[i] ? printers[i] : 'Unknown');      
				}
				
				// Remove reference to this function
				window['qzDoneFinding'] = null;
			};
		}
	}
	
	/***************************************************************************
	* Prototype function for printing raw EPL commands
	* Usage:
	*    qz.append('\nN\nA50,50,0,5,1,1,N,"Hello World!"\n');
	*    qz.print();
	***************************************************************************/
	function printEPL() {
		if (notReady()) { return; }
		 
		// Send characters/raw commands to qz using "append"
		// This example is for EPL.  Please adapt to your printer language
		// Hint:  Carriage Return = \r, New Line = \n, Escape Double Quotes= \"
		qz.append('\nN\n');            
		qz.append('q609\n');
		qz.append('Q203,26\n');
		qz.append('B5,26,0,1A,3,7,152,B,"1234"\n');
		qz.append('A310,26,0,3,1,1,N,"SKU 00000 MFG 0000"\n');
		qz.append('A310,56,0,3,1,1,N,"QZ PRINT APPLET"\n');
		qz.append('A310,86,0,3,1,1,N,"TEST PRINT SUCCESSFUL"\n');
		qz.append('A310,116,0,3,1,1,N,"FROM SAMPLE.HTML"\n');
		qz.append('A310,146,0,3,1,1,N,"QZINDUSTRIES.COM"\n');
		qz.appendImage(getPath() + 'img/image_sample_bw.png', 'EPL', 150, 300);
				
		// Automatically gets called when "qz.appendImage()" is finished.
		window['qzDoneAppending'] = function() {
			// Append the rest of our commands
			qz.append('\nP1,1\n');
			
			// Tell the applet to print.
			qz.print();
			
			// Remove reference to this function
			window['qzDoneAppending'] = null;
		};
	 }
	 
	/***************************************************************************
	* Prototype function for printing raw ESC/POS commands
	* Usage:
	*    qz.append('\n\n\nHello world!\n');
	*    qz.print();
	***************************************************************************/
	function printESCP() {
		if (notReady()) { return; }
		
		// Append a png in ESCP format with single pixel density
		qz.appendImage(getPath() + "img/image_sample_bw.png", "ESCP", "single");
				
		// Automatically gets called when "qz.appendImage()" is finished.
		window["qzDoneAppending"] = function() {
			// Append the rest of our commands
            qz.append('\nPrinted using qz-print plugin.\n\n\n\n\n\n');
			
			// Tell the apple to print.
			qz.print();
			
			// Remove any reference to this function
			window['qzDoneAppending'] = null;
		};
	}
	
	
	/***************************************************************************
	* Prototype function for printing raw ZPL commands
	* Usage:
	*    qz.append('^XA\n^FO50,50^ADN,36,20^FDHello World!\n^FS\n^XZ\n');
	*    qz.print();
	***************************************************************************/     
	function printZPL() {
		if (notReady()) { return; }
		 
		// Send characters/raw commands to qz using "append"
		// This example is for ZPL.  Please adapt to your printer language
		// Hint:  Carriage Return = \r, New Line = \n, Escape Double Quotes= \"
		qz.append('^XA\n');
        qz.append('^FO50,50^ADN,36,20^FDPRINTED USING QZ PRINT PLUGIN ' + qz.getVersion() + '\n');
		qz.appendImage(getPath() + 'img/image_sample_bw.png', 'ZPLII');
				
		// Automatically gets called when "qz.appendImage()" is finished.
		window['qzDoneAppending'] = function() {
			// Append the rest of our commands
			qz.append('^FS\n');
			qz.append('^XZ\n');  
			
			// Tell the apple to print.
			qz.print();
			
			// Remove any reference to this function
			window['qzDoneAppending'] = null;
		};
	}
	
	/***************************************************************************
	* Prototype function for printing plain HTML 1.0 to a PostScript capable 
	* printer.  Not to be used in combination with raw printers.
	* Usage:
	*    qz.appendHTML('<h1>Hello world!</h1>');
	*    qz.printPS();
	***************************************************************************/ 
	function printHTML() {
		if (notReady()) { return; }
		
		// Preserve formatting for white spaces, etc.
		var colA = fixHTML('<h2>*  QZ Print Plugin HTML Printing  *</h2>');
		colA = colA + '<color=red>Version:</color> ' + qz.getVersion() + '<br />';
		colA = colA + '<color=red>Visit:</color> http://code.google.com/p/jzebra';
		
		// HTML image
		var colB = '<img src="' + getPath() + 'img/image_sample.png">';
		
                //qz.setCopies(3);
		qz.setCopies(parseInt(document.getElementById("copies").value));
                
		// Append our image (only one image can be appended per print)
		qz.appendHTML('<html><table face="monospace" border="1px"><tr height="6cm">' + 
		'<td valign="top">' + colA + '</td>' + 
		'<td valign="top">' + colB + '</td>' + 
		'</tr></table></html>');
                
		qz.printHTML();
	}
	
	
	/***************************************************************************
	****************************************************************************
	* *                          HELPER FUNCTIONS                             **
	****************************************************************************
	***************************************************************************/
	
	
	/***************************************************************************
	* Gets the current url's path, such as http://site.com/example/dist/
	***************************************************************************/
	function getPath() {
		var path = window.location.href;
		return path.substring(0, path.lastIndexOf("/")) + "/";
	}
	
	/**
	* Fixes some html formatting for printing. Only use on text, not on tags!
	* Very important!
	*   1.  HTML ignores white spaces, this fixes that
	*   2.  The right quotation mark breaks PostScript print formatting
	*   3.  The hyphen/dash autoflows and breaks formatting  
	*/
	function fixHTML(html) {
		return html.replace(/ /g, "&nbsp;").replace(/’/g, "'").replace(/-/g,"&#8209;"); 
	}
	
	/**
	* Equivelant of VisualBasic CHR() function
	*/
	function chr(i) {
		return String.fromCharCode(i);
	}
	
	/***************************************************************************
	* Prototype function for allowing the applet to run multiple instances.
	* IE and Firefox may benefit from this setting if using heavy AJAX to
	* rewrite the page.  Use with care;
	* Usage:
	*    qz.allowMultipleInstances(true);
	***************************************************************************/ 
	function allowMultiple() {
	  if (isLoaded()) {
		var multiple = qz.getAllowMultipleInstances();
		qz.allowMultipleInstances(!multiple);
		alert('Allowing of multiple applet instances set to "' + !multiple + '"');
	  }
	}
        
        /*
         * 
         * @returns {undefined}
         */
        function cutPaper() {
              qz.append(chr(27) + chr(105));       // cut paper
        }
        
        function selectPrinter(name) {
		// Get printer name from input box
		var p = document.getElementById('printer');
		if (name) {
			p.value = name;
		}
		
		if (isLoaded()) {
			// Searches for locally installed printer with specified name
			qz.findPrinter(p.value);
			
			// Automatically gets called when "qz.findPrinter()" is finished.
			window['qzDoneFinding'] = function() {
				var p = document.getElementById('printer');
				var printer = qz.getPrinter();
				
				// Alert the printer name to user
                                if(printer === null)
                                    {
                                        alert('Printer "' + 
					p.value + '" not found.');
                                        
                                    }
				// Remove reference to this function
				window['qzDoneFinding'] = null;
			};
		}
	}
        
        /*
         * Test function to print to POS
         */
         
       
        
        function print() {
        
        //
        var _tipo_comprobante="<?php echo $_tipo_comprobante;?>";
        var _serie="<?php echo 'Serie: '. $_serie;?>";
        var _numero="<?php echo 'Nro: '. $_numero;?>";
        var _header= "<?php echo $_header;?>";
        var _rz="<?php echo $rz;?>";
        var _direccion = "<?php echo $direccion;?>";
        var _ruc="<?php echo $ruc;?>";
        var _cliente="<?php echo $_cliente;?>";
        var _cliente_ruc="<?php echo $_cliente_ruc;?>";
        var _cliente_direccion="<?php echo $_cliente_direccion;?>";
        var _salto=" \r\n";
        var _date="<?php echo date('d/m/Y').' '.date('H:i:s');?>"
        
        var _length="<?php echo count($detalle);?>" 
        
        var _cant = [];
       <?php for($i=0;$i<count($detalle);$i++){ ?>
        _cant.push("<?php echo $detalle[$i]; ?>");
        <?php }?>
        var _descrip="<?php echo $_descrip;?>";
        var _pu="<?php echo $_pu;?>";
        
        var _igv="<?php echo $venta->impuesto; ?>";
        var _total="<?php echo $venta->importe_total; ?>";
        
        selectPrinter('factura');
         // Send characters/raw commands to applet using "append"
         // Hint:  Carriage Return = \r, New Line = \n, Escape Double Quotes= \"
            qz.append("\x1B\x40"); // 1
            qz.append("\x1B\x21\x08"); // 2
            qz.append(_tipo_comprobante);
            qz.append(_salto); // salto linea
            qz.append(_serie);
            qz.append(" - "); // salto linea
            qz.append(_numero);
            qz.append(_salto);
            qz.append(_rz); //razon social
            qz.append(_salto); // salto linea
            qz.append(_ruc); // ruc
            qz.append(_salto); // salto linea
            qz.append(_direccion); // direccion
            qz.append(_salto); // saldo linea
            qz.append(" --------------------------------\r\n ");
            qz.append(_cliente);//cliente
            qz.append(_salto); 
            qz.append(_cliente_ruc);//Ruc cliente
            qz.append(_salto); 
            qz.append(_cliente_direccion)//Direccion cliente
            qz.append(_salto); 
            qz.append(" --------------------------------\r\n ");
            qz.append(_salto); 
            qz.append("\x1B\x50");
            qz.append("Cant.  Descripcion  P.U.  Importe");
            qz.append("---------------------------------\r\n ");
            for(var i=0;i<_length;i++)
            {   
                
                qz.append(_salto);
                qz.append(_cant[i]);
                
            }
            qz.append("\x1B\x54");
            qz.append(_salto);
            qz.append("\x1B\x21\x08");
            qz.append("=================================\r\n");
            qz.append("IGV: ");
            qz.append(_igv);
            qz.append(_salto);
            qz.append("TOTAL: ");
            qz.append(_total);
            qz.append(_salto);
            qz.append(_salto);
            qz.append("Muchas Gracias por su compra.");
            qz.append("Regrese pronto!");
            qz.append(_salto);
            qz.append("\x1B\x21\x01"); // 3
            //qz.append(_cant);
            //qz.append(_descrip);
            //qz.append(_line); 
            qz.append("fecha/hora: "+_date);
            qz.append(" \r\n");
            qz.append(" \r\n");
            
            qz.append("\x1D\x56\x41"); // 4
            qz.append("\x1B\x40"); // 5
            
            //chr();

         // Send characters/raw commands to printer
         qz.print();
        //cutPaper();
      }
      
</script>
	

	

<!--setenado el nombre de la impresora-->
        <input id="printer" type="hidden" value="factura" size="15"><br />
        
        <input type=button onClick="print()" value="IMPRIMIR COMPROBANTE"><br><br>

        
