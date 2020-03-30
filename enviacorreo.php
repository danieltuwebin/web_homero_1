<?php

$Nombre=$_POST['Nombre'];
$Correo=$_POST['Email'];
$Whatsapp=$_POST['WhatsApp'];
$Mensaje=$_POST['Mensaje'];


$to = "informes@tortasdrossi.com.pe";
$asunto = "Consulta desde la Web";
//$message = "Este es mi primer envío de email con PHP";
//$headers = "From: mi@cuentadeemail.com" . "\r\n" . "CC: destinatarioencopia@email.com";

//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
//dirección del remitente 
$headers .= "From: Contacto Web <TortasDrossi>\r\n"; 

$Mensaje ="
<html>
<head>
<title>HTML</title>
</head>
<body>
<h2>Mensaje Enviado desde la Web</h2>
<p><h3>".$Mensaje."</h3></p>
<br>
<p><b> Remitente </b></p>
<p> Nombre : ".$Nombre."</p>
<p> Correo : ".$Correo."</p>
<p> Numero de Whatsapp : ".$Whatsapp."</p>
</body>
</html>";

/*
//dirección del remitente 
$headers .= "From: Miguel Angel Alvarez <pepito@desarrolloweb.com>\r\n"; 
//dirección de respuesta, si queremos que sea distinta que la del remitente 
$headers .= "Reply-To: mariano@desarrolloweb.com\r\n"; 
//ruta del mensaje desde origen a destino 
$headers .= "Return-path: holahola@desarrolloweb.com\r\n"; 
//direcciones que recibián copia 
$headers .= "Cc: maria@desarrolloweb.com\r\n"; 
//direcciones que recibirán copia oculta 
$headers .= "Bcc: pepe@pepe.com,juan@juan.com\r\n"; 
*/

//mail($to,$asunto,$Mensaje,$headers);
//mail($destinatario,$asunto,$Mensaje,$headers) 

//$string = '{"nombre": "Angelina", "apellido": "Jolie"}';

$bool = mail($to,$asunto,$Mensaje,$headers);

if($bool){
    echo '1';
}else{
    echo '2';
}
/*
if($bool){
    $string = '{"Estado": "enviado"}';
}else{
    $string = '{"Estado": "no enviado"}';
}
*/


//echo $string;
//echo "d : ".$Nombre;

?>

