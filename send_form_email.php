<?php
if(isset($_POST['email'])) {
 
    // 
 
    $email_to = "omegamikeleviathan@gmail.com";
 
    $email_subject = "Contacto desde Web";
 
    function died($error) {
 
        // mensajes de error
 
        echo "Lo sentimos, hubo un error en sus datos y el formulario no puede ser enviado en este momento. ";
 
        echo "Detalle de los errores.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Porfavor corrija estos errores e inténtelo de nuevo.<br /><br />";
        die();
    }
 
    // Se valida que los campos del formulairo estén llenos
 
    if(!isset($_POST['first_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['message'])) {
        die('Lo sentimos pero parece haber un problema con los datos enviados.');
    }
 //En esta parte el valor "name"  sirve para crear las variables que recolectaran la información de cada campo 
    $first_name = $_POST['first_name']; // requerido 
    $email_from = $_POST['email']; // requerido 
    $message = $_POST['message']; // requerido 
    $error_message = "";//Linea numero 52;
 
//En esta parte se verifica que la dirección de correo sea válida 
 
   $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'La dirección de correo proporcionada no es válida.<br />';
 
  }
 
//En esta parte se validan las cadenas de texto
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
 
    $error_message .= 'El formato del nombre no es válido, evite usar caracteres especiales<br />';
 
  }
 
  if(strlen($message) < 2) {
 
    $error_message .= 'El formato del texto no es válido.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    die($error_message);
 
  }
 
//Este es el cuerpo del mensaje tal y como llegará al correo
 
    $email_message = "Contenido del Mensaje.\n\n";
 
 
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }

    $email_message .= "Nombre: ".clean_string($first_name)."\n"; 
    $email_message .= "Email: ".clean_string($email_from)."\n"; 
    $email_message .= "Mensaje: ".clean_string($message)."\n";
 
 
//Se crean los encabezados del correo 
$headers = 'From: '.$email_from."\r\n". 
'Reply-To: '.$email_from."\r\n" . 
'X-Mailer: PHP/' . phpversion(); 
@mail($email_to, $email_subject, $email_message, $headers); 
?>
 
 
 
<!-- Mensaje de que fue enviado-->
 <!DOCTYPE html>
<html>
<title>Mike Leviathan - Mensaje enviado</title>
<meta http-equiv="Refresh" content="6; url=javascript:window.close();" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/montserrat.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<body class="w3-black">

  <header class="w3-container w3-padding-32 w3-center w3-black w3-animate-fading" id="home">
    <h1 class="w3-big"><span class="w3-hide-small"></span>Thanks for your message<span class="w3-hide-small"></span></span></span></h1> 
    <b>I'll contact you soon.</b><br />
    If this window do not close automatically, <a href="javascript:window.close();"> click here to close it</a> 
  </header>

<script>
  setTimeout(function(){ javascript:window.close(); }, 9500);
</script>
</div>
</body>
</html>
 
<!-- -->
<?php
 
}
 
?>
