<?php
# Parametros para conexão com o banco de dados 
$usuario = 'root';
$senha = '';
$database = 'Dev_Home';
$host = 'localhost';

# O mysqli é uma extenção do mysql que permite a integração com o banco de dados

# Efetuando a conexão com o banco de dados
$mysqli = new mysqli($host, $usuario, $senha, $database);

# Verificar se ha erro na conexão
if($mysqli->error) {

    $status = "Falha ao conectar ao banco de dados: " . $mysqli->error;
    echo "<script>alert('$status');</script>";

}else {
    # Parametros de verificação do bamco
    #$status = "Conexão com banco de dados bem sucedida !";
    #echo "<script>alert('$status');</script>";
}

?>




