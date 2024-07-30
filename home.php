<?php
session_start();
include 'conexao.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['id'])) {
    header('Location: index.php');
    exit;
}

# $_SESSION é um dado referente ao usuário que é adicionado temporariamente à base de dados para evitar a
# nescesidade do usuário fazer login novamente caso saia do arquivo home.php

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Página Home</title>
    <style>
        .banner {
            height: 350px;
            width: 100%;
        }
    </style>

</head>
<body>
    <div class="bg-secondary banner">
        <div class="text-center fs-2">Bem vindo</div>
    </div>

    <div class="container mt-5 text-center"><button type="button" class="btn btn-primary fs-3" onclick="redirectToNewPage()">Logout</button></div>


<div class="modal fade" id="bemVindo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Página inicíal</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Olá, <?php echo htmlspecialchars($username); ?>. Bem-vindo à página home!
      </div>
    </div>
  </div>
</div>


<script>
    var usuario = "<?php echo htmlspecialchars($username); ?>";
    
    // Espera que a janela seja carregada antes de exibir o modal
    window.onload = function() {
        var modal = new bootstrap.Modal(document.getElementById('bemVindo'), {
            // Previne que o modal feche quando clicar na tela
            backdrop: 'static',
            keyboard: false
        });
        modal.show();
    };

    function redirectToNewPage() {

  window.location.href = "logout.php";
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>


