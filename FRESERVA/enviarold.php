<?php
 
  //variable de validacion
 
  $valida = true;
 
    
    if (empty($_POST['nombre'])) {
 
    echo "<b>  El campo nombre no ha sido especificado</b><br/>";
 
    $valida = false;
    echo "<b> </b><br/><a href=\"javascript:history.go(-1)\">RETORNA</a>";
  }
  
    if (empty($_POST['apellido'])) {
 
    echo "<b>  El campo apellido no ha sido especificado</b><br/>";
 
    $valida = false;
    echo "<b> </b><br/><a href=\"javascript:history.go(-1)\">RETORNA</a>";
  }
  
  if (empty($_POST['dni'])) {
 
    echo "<b>  El campo DNI o Pasaporte no ha sido especificado</b><br/>";
 
    $valida = false;
    echo "<b> </b><br/><a href=\"javascript:history.go(-1)\">RETORNA</a>";
  }
  
  if (empty($_POST['direccion'])) {
 
    echo "<b>  El campo direccion no ha sido especificado</b><br/>";
 
    $valida = false;
    echo "<b> </b><br/><a href=\"javascript:history.go(-1)\">RETORNA</a>";
  }
  
  if (empty($_POST['poblacion'])) {
 
    echo "<b>  El campo población no ha sido especificado</b><br/>";
 
    $valida = false;
    echo "<b> </b><br/><a href=\"javascript:history.go(-1)\">RETORNA</a>";
  }
  
  if (empty($_POST['provincia'])) {
 
    echo "<b>  El campo Provincia no ha sido especificado</b><br/>";
 
    $valida = false;
    echo "<b> </b><br/><a href=\"javascript:history.go(-1)\">RETORNA</a>";
  }
  
    
   if (empty($_POST['pais'])) {
 
    echo "<b>  El campo pais no ha sido especificado</b><br/>";
 
    $valida = false;
    echo "<b> </b><br/><a href=\"javascript:history.go(-1)\">RETORNA</a>";
  }
  
       
	 if (empty($_POST['telefono'])) {
 
    echo "<b>  El campo telefono no ha sido especificado</b><br/>";
 
    $valida = false;
    echo "<b> </b><br/><a href=\"javascript:history.go(-1)\">RETORNA</a>";
  }
  
  
  if (empty($_POST['email'])) {
 
    echo "<b>  El campo email no ha sido especificado</b><br/>";
 
    $valida = false;
    echo "<b> </b><br/><a href=\"javascript:history.go(-1)\">RETORNA</a>";
  }
  
   
    if (empty($_POST['message'])) {
 
   echo "<b>  El campo mensaje no ha sido especificado</b><br/>";
 
   $valida = false;
   echo "<b> </b><br/><a href=\"javascript:history.go(-1)\">RETORNA</a>";
  }
 
  
  // Validamos la direccion de correo electronico
 
  if (!strchr($_POST['email'],"@") || !strchr($_POST['email'],"."))
   {
 
    echo "<b>  ¡¡ NO ES UN MENSAJE VÁLIDO !! </b><br/>";
 
    $valida = false;
    echo "<b> </b><br/><a href=\"javascript:history.go(-1)\">RETORNA</a>";
   }
 
  // Si las comprobaciones son correctas
 
  if ($valida == true)
 
   {
 
    // Creamos el header para el mensaje
 
    // para:
 
    $to = $_POST['email'];
 
    // Asunto
 
    $subject = $_POST['matter'];
 
    // Cabeceras del mail (Content-Type y demas info)
 
    $headers = "MIME-Version: 1.0\r\n";
 
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
 
    // El From: en la forma Nombre <email@sitio.com>, esto garantiza que
 
    // el receptor vea solo el nombre de quien envia
 
    $headers .= "From: ".$_POST['firstname']." <".$_POST['email'].">\r\n";
 
    // Opcional: Resopnder a:
 
    $headers .= "Reply-To: " . $_POST['email']."\r\n";
 
    //Opcional X-Mailer
 
    $headers .= "X-Mailer: PHP/" . phpversion();
 
// Cuerpo del email
	
	 // Cuerpo del mensaje
    $cabecera = "---------------------------------- \n";
    $cabecera.= "     Datos del cliente           \n";
    $cabecera.= "----------------------------------" . '<br>';
	$cabecera.= "NOMBRE:   ".$_POST['nombre']. '<br>';
    $cabecera.= "APELLIDOS:  ".$_POST['apellido']. '<br>';
	$cabecera.= "DNI:  ".$_POST['dni']. '<br>';	
	$cabecera.= "DOMICILIO:  ".$_POST['direccion']. '<br>';
	$cabecera.= "POBLACI&Oacute;N:  ".$_POST['poblacion']. '<br>';
	$cabecera.= "PROVINCIA:  ".$_POST['provincia']. '<br>';
	$cabecera.= "PAIS:  ".$_POST['pais']. '<br>';
	$cabecera.= "TEL&Eacute;FONO:  ".$_POST['telefono']. '<br>';
	$cabecera.= "EMAIL:  ".$_POST['email']. '<br>';
	$cabecera.= "MENSAJE :   ".$_POST['message']. '<br>';
        $cabecera.= "VACIO:  ".$_POST['vacio']. '<br>';
	
	$message3 = $cabecera;
 
    // $message = $_POST['message'];
	// $cabecera = "Nombre | Apellido | DNI | Dirección | Población |Provincia | Pais |  Teléfono | email |";
	// $datos1 = "| " . $_POST['nombre'] . "| " .  $_POST['apellido'] .  "| " .  $_POST['dni'] . "| " .  $_POST['direccion'] . "| " .  $_POST['poblacion'] . "| " .  $_POST['provincia'] . "| " . $_POST['pais'] ;
	// $datos2 = "| " . $_POST['teléfono'] . "| " . $_POST['email'];
	// $message3 = $cabecera . "   " .  $datos1 . $datos2 . $datos3  . "| MENSAJE " . $message ;
	
	$subject =  $nombre . "Autocaravanas Tenerife ha recibido sus datos ";
	$message2 = "Mucas gracias por contactar con nosotros, nos pondremos en contacto via email o telefónicamente con usted en la mayor brevedad    posible.<br /><br />
Si le urge la reserva o algún dato aclaratorio no dude en contactar con nosotros en el 619 548 592<br /><br />
Muchas gracias <br /><br />
Autocaravanas  Tenerife.";
		
	$to1 = "info@autocaravanastenerife.es";
	$subject1 = "Datos de  " . $_POST['nombre'];
	
 
    if(mail($to, $subject, $message2,$headers))
     {
      echo "<b>Mensaje enviado, Gracias por las sugerencias.</b><br/><a href=\"javascript:history.go(-1)\">RETORNA</a>";
	  mail($to1, $subject1, $message3,$headers);
      // echo <a href="http://acrosseurope.org/test/test.html" target="_blank">Placement test</a>
	  }
    
   }
   
 
?>