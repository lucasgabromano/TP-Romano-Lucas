<?php

$conectar=mysqli_connect('localhost','root','','formulario_contacto_faq');


$nombre=$_POST["Nombre"];
$apellido=$_POST["Apellido"];
$email=$_POST["Mail"];
$telefono=$_POST["Telefono"];
$taller=$_POST["Taller"];
$consulta=$_POST["Consulta"];

$sql="insert into formulario_contacto (Nombre, Apellido, email, Telefono, Taller, Consulta) values ('$nombre', '$apellido', '$email', '$telefono', '$taller', '$consulta')";

$rta = mysqli_query($conectar, $sql);
if ($rta==false) {
	echo mysqli_error($conectar);
	die("No se pudo insertar el registro");
}
echo "Se agrego el registro!";

//Enviar mail

$destinatario = "fineartquilmes@fineartquilmes.com";
$asunto = "$nombre,$taller"; 
$cuerpo = 
' <html> 
<head>
<title>Consulta por taller</title>
</head>
<body>
<ul>
<li>Nombre: $nombre </li>
<li>Apellido: $apellido </li>
<li>Email: $email </li>
<li>Telefono: $telefono </li>
<li>Taller: $taller </li>
<li>Consulta: $consulta </li>

</ul>

</body>
</html>';

$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
mail($destinatario,$asunto,$cuerpo,$headers)

?>
