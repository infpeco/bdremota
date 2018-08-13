<?PHP
$host_name_localhost="localhost";
$databse_localhost="db_usuarios";
$username_locahost="root";
$password_locahost="";

$json=array();

if(isset($_GET["documento"]) && isset($_GET["nombre"]) && isset($_GET["profesion"])){
    $documento=$_GET['documento'];
    $nombre=$_GET['nombre'];
    $profesion=$_GET['profesion'];

    $conexion=mysqli_connect($host_name_localhost,$username_locahost,$password_locahost,$databse_localhost);

$insert="INSERT INTO usuario(documento, nombre, profesion) VALUES ('{$documento}','{$nombre}','{$profesion}')";
$resultado_insert=mysqli_query($conexion,$insert);

if($resultado_insert){
$consulta="SELECT * FROM usuario WHERE documento = '{$documento}'";
$resultado=mysqli_query($conexion,$consulta);

if ($registro=mysqli_fetch_array($resultado)){
    $json['usuario'][]=$registro;
}
mysqli_close($conexion);
echo json_encode($json);
}
else{
    $resulta["documento"]=0;
    $resulta["nombre"]='No Registra';
    $resulta["profesion"]='No Registra';
    $json["usuario"][]=$resulta;
    echo json_encode($json);
}
}
else{
    $resulta["documento"]=0;
    $resulta["nombre"]='WS No Retorna';
    $resulta["profesion"]='WS No Retorna';
    $json["usuario"][]=$resulta;
    echo json_encode($json);
}


?>