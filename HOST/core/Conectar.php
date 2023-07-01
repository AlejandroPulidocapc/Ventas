<?php

Class Conectar{

public function con()

{
$username= "aplicacion";
$password = "pulidocerinza2004";
$host ="localhost";

$basededatos="db_miprimera";

try{
    $conexion = new PDO("mysql:host=$host;dbname=$basededatos", $username, $password);      
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //  echo "Conexión realizada Satisfactoriamente";
return $conexion;
}catch(Exception $e)

{
echo $e->getMessage();
}

}



}


?>