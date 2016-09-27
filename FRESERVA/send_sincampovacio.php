<?php
 
  //variable de validacion
 
  $valida = true;
 
    
    if (empty($_POST['name'])) {
 
    echo "<b>  The name field is not specified</b><br/>";
 
    $valida = false;
    echo "<b> </b><br/><a href=\"javascript:history.go(-1)\">RETURN</a>";
  }
  
    if (empty($_POST['surname'])) {
 
    echo "<b>  The name Last name is not specified</b><br/>";
 
    $valida = false;
    echo "<b> </b><br/><a href=\"javascript:history.go(-1)\">RETURN</a>";
  }
  
  if (empty($_POST['id'])) {
 
    echo "<b>  The ID field is not specified</b><br/>";
 
    $valida = false;
    echo "<b> </b><br/><a href=\"javascript:history.go(-1)\">RETURN</a>";
  }
  
  if (empty($_POST['address'])) {
 
    echo "<b>  The address field is not specified</b><br/>";
 
    $valida = false;
    echo "<b> </b><br/><a href=\"javascript:history.go(-1)\">RETURN</a>";
  }
  
  if (empty($_POST['population'])) {
 
    echo "<b>  The population field is not specified</b><br/>";
 
    $valida = false;
    echo "<b> </b><br/><a href=\"javascript:history.go(-1)\">RETURN</a>";
  }
  
  if (empty($_POST['province'])) {
 
    echo "<b>  The province field is not specified</b><br/>";
 
    $valida = false;
    echo "<b> </b><br/><a href=\"javascript:history.go(-1)\">RETURN</a>";
  }
  
    
   if (empty($_POST['country'])) {
 
    echo "<b>  The country field is not specified</b><br/>";
 
    $valida = false;
    echo "<b> </b><br/><a href=\"javascript:history.go(-1)\">RETURN</a>";
  }
  
       
	 if (empty($_POST['phone'])) {
 
    echo "<b>  The phone field is not specified</b><br/>";
 
    $valida = false;
    echo "<b> </b><br/><a href=\"javascript:history.go(-1)\">RETURN</a>";
  }
  
  
  if (empty($_POST['email'])) {
 
    echo "<b>  The email field is not specified</b><br/>";
 
    $valida = false;
    echo "<b> </b><br/><a href=\"javascript:history.go(-1)\">RETURN</a>";
  }
  
   
    if (empty($_POST['message'])) {
 
   echo "<b>  The message field is not specified</b><br/>";
 
   $valida = false;
   echo "<b> </b><br/><a href=\"javascript:history.go(-1)\">RETURN</a>";
  }
 
  
  // Validamos la direccion de correo electronico
 
  if (!strchr($_POST['email'],"@") || !strchr($_POST['email'],"."))
   {
 
    echo "<b>  ¡¡ NOT A VALID MESSAGE !! </b><br/>";
 
    $valida = false;
    echo "<b> </b><br/><a href=\"javascript:history.go(-1)\">RETURN</a>";
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
	$cabecera.= "NOMBRE:   ".$_POST['name']. '<br>';
    $cabecera.= "APELLIDOS:  ".$_POST['surname']. '<br>';
	$cabecera.= "DNI:  ".$_POST['id']. '<br>';	
	$cabecera.= "DOMICILIO:  ".$_POST['address']. '<br>';
	$cabecera.= "POBLACI&Oacute;N:  ".$_POST['population']. '<br>';
	$cabecera.= "PROVINCIA:  ".$_POST['province']. '<br>';
	$cabecera.= "PA&Iacute;IS:  ".$_POST['country']. '<br>';
	$cabecera.= "TEL&Eacute;FONO:  ".$_POST['phone']. '<br>';
	$cabecera.= "EMAIL:  ".$_POST['email']. '<br>';
	$cabecera.= "MENSAJE :   ".$_POST['message']. '<br>';
 
    $message = $_POST['message'];
	
	
	$subject =  $nombre . "Motorhomes Tenerife has received your data ";
	$message2 = "Thank you very much for contacting us, we will contact you via email or phone with you as soon as possible.<br /><br />
If the reservation is urging any data or clarification please contact us at 619 548 592<br /><br />
Thank you very much <br /><br />
Motorhomes Tenerife.";
		
	$to1 = "info@autocaravanastenerife.es";
	$subject1 = "Datas of  "  .$_POST['name'];
	
 
    if(mail($to, $subject, $message2,$headers))
     {
      echo "<b>Message sent, Thanks for the suggestions.</b><br/><a href=\"javascript:history.go(-1)\">RETURN</a>";
	  mail($to1, $subject1, $cabecera,$headers);
      // echo <a href="http://acrosseurope.org/test/test.html" target="_blank">Placement test</a>
	  }
    
   }
 
?>