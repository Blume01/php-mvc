<?php

namespace App\Controllers;

use Core\Router;
use App\Models\User;

class RegisterController extends Router
{
  private $user;

  public function __construct()
  {
    $this->user = new User();
  }

  public function index()
  {
    $this->render('register');
  }

  public function register()
  {
    if (empty($_POST['name']) || empty($_POST['username']) || empty($_POST['password'])) {
      echo "<script>alert('Por favor, preencha todos os campos.'); window.location.href = '/register';</script>";
      return;
    }

    if ($this->user->getUser($_POST['username'], $_POST['password'])) {
      echo "<script>alert('Usuário ja cadastrado.'); window.location.href = '/register';</script>";
      return;
    }

    $this->user->createUser($_POST['name'], $_POST['username'], $_POST['password']);
    echo "<script>alert('Usuário cadastrado com sucesso!'); window.location.href = '/';</script>";
  }
}
