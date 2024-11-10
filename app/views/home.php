<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Home</title>
</head>

<body>
    <br>
    <a href="/logout">Sair</a>
    <br>
    <?php foreach ($users as $user) : ?>
        <p>Nome: <?php echo $user['name']; ?></p>
        <p>Usuário: <?php echo $user['username']; ?></p>
        <p>Senha: <?php echo $user['password']; ?></p>
        <br>
    <?php endforeach; ?>
</body>

</html>