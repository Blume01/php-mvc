<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f8f9fa;
    }

    .login-container {
      width: 100%;
      max-width: 400px;
      padding: 20px;
      background-color: #ffffff;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>

<body>
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
        <a href="#">Esqueceu sua senha?</a>
      </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>