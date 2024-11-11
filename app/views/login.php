<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <?php include 'public/includes/header.php'; ?>
</head>

<body class="bg-login">
  <div class="login-container">
    <h2 class="text-center">Login</h2>
    <form action="/login" method="post">
      <div class="form-group">
        <label for="username">Usuário</label>
        <input type="text" class="form-control" name="username" placeholder="Digite seu usuário">
      </div>
      <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" class="form-control" name="password" placeholder="Digite sua senha">
      </div>
      <button type="submit" class="btn btn-primary btn-block">Entrar</button>
      <div class="text-center mt-3">
        <a href="/register">Novo por aqui? Cadastre-se</a>
      </div>
    </form>
  </div>

  <?php include 'public/includes/footer.php'; ?>
</body>

</html>