<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastrar-se</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f8f9fa;
    }

    .register-container {
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

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>