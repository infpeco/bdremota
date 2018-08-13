<?PHP
$host_name_localhost="localhost";
$databse_localhost="db_usuarios";
$username_locahost="root";
$password_locahost="";

$json=array();

if(isset($_GET["documento"])){
    $documento=$_GET['documento'];

    $conexion=mysqli_connect($host_name_localhost,$username_locahost,$password_locahost,$databse_localhost);

    $consulta="select documento, nombre, profesion from usuario where documento= '{$documento}'";    
    $resultado=mysqli_query($conexion,$consulta);

    if($registro=mysqli_fetch_array($resultado)){
        $json['usuario'][]=$registro;

    }else{
        $resultar["documento"]=0;
        $resultar["nombre"]='No Registra';
        $resultar["profesion"]='No Registra';
        $json["usuario"][]=$resulta;
    }

    mysqli_close($conexion);
    echo json_encode($json);
}
    else{
        $resultar["success"]=0;
        $resultar["message"]='WS No Retorna';
        $json["usuario"][]=$resultar;
        echo json_encode($json);
}
?>