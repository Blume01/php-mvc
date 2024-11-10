<?php

namespace App\Controllers;

use Core\Router;
use App\Models\User;

class AuthController extends Router
{
  private $user;

  public function __construct()
  {
    $this->user = new User();
  }

  public function index()
  {
    $this->render('login');
  }

  public function login()
  {
    $user = $this->user->getUser($_POST['username'], $_POST['password']);

    if ($user) {
      session_start();
      $_SESSION['user_data'] = $user;
      echo "<script>alert('Login realizado com sucesso!'); window.location.href = '/home';</script>";
    } else {
      echo "<script>alert('Usuário ou senha incorretos!'); window.location.href = '/';</script>";
    }
  }

  public function logout()
  {
    session_start();
    session_destroy();
    header("Location: /");
  }
}
