<?php

# Integração do script php para teste de conexão

include('conexao.php');

# Verificar se email e/ou senha estão vazios
if(isset($_POST['username']) && isset($_POST['password'])) {

    if(strlen($_POST['username']) == 0) {
        echo "<script>alert('Preencha seu nome de usuário!');</script>";
    } else if (strlen($_POST['password']) == 0) {
        echo "<script>alert('Preencha sua senha!');</script>";
    } else {
        # Sanitização de consulta para evitar sql injection
        $username = $mysqli->real_escape_string($_POST['username']);
        $password = $mysqli->real_escape_string($_POST['password']);

        # Preparando o código SQL para a consulta
        $sql_code = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        
        # Efetuando consulta SQL
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        # Receber quantidade de colunas que atendem à condição '$email' e '$senha' que deve ser igual a 1
        $quantidade = $sql_query->num_rows;

        # Verificar se quantidade de linhas é igual a 1
        if($quantidade == 1) {
            # Fazer login com os dados
            $usuario = $sql_query->fetch_assoc();

            # Iniciar a sessão
            session_start();

            # Salvar dados do usuário na sessão
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['username'] = $usuario['username'];

            # Redirecionar usuário para a página home do site
            header("Location: home.php");
            exit();
        } else {

            echo "<script>alert('Falha ao logar. Usuário e/ou senha incorretos!');</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Login - Dev_Home</title>
    <style>
        .login-form {
          max-width: 400px;
          margin: 0 auto;
          padding: 20px;
          border: 1px solid #ccc;
          border-radius: 5px;
          margin-top: 100px;
      }
    </style>
</head>
<body>
    <div class="container fs-2 text-center" style="margin-top: 100px;">Acesse sua conta</div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 ">
                <div class="login-form">
                    <h2 class="text-center">Login</h2>
                    <form id="loginForm" action="" method="POST">
                        <div class="mb-3 p-2">
                            <label for="username" class="form-label">Usuário:</label>
                            <input type="text" class="form-control" id="username" name="username" require>
                        </div>
                        <div class="mb-3 p-2">
                            <label for="password" class="form-label">Senha:</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>  
</body>
</html>
