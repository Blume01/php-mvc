<?php

namespace App\Controllers;

use Core\Router;
use App\Models\User;

class HomeController extends Router
{
  private $user;

  public function __construct()
  {
    $this->user = new User();
  }

  public function index()
  {
    session_start();
    if (!isset($_SESSION['user_data'])) {
      header("Location: /");
      exit();
    }

    $users = $this->user->getUsers();
    $this->render('home', ['users' => $users]);
  }
}

