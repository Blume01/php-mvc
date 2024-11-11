<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastrar-se</title>
  <?php include 'public/includes/header.php'; ?>
</head>

<body class="bg-register">
  <div class="register-container">
    <h2 class="text-center">Cadastrar-se</h2>
    <form action="/create" method="post">
      <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" class="form-control" name="name" placeholder="Digite um nome">
      </div>
      <div class="form-group">
        <label for="username">Usuário</label>
        <input type="text" class="form-control" name="username" placeholder="Digite um usuário">
      </div>
      <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" class="form-control" name="password" placeholder="Digite uma senha">
      </div>
      <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
    </form>
  </div>

  <?php include 'public/includes/footer.php'; ?>
</body>

</html>