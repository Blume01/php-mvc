<?php

namespace App\Controllers;

use App\Models\User;
use App\Utils\Dump;

class UserController extends Dump
{
  private $user;

  public function __construct()
  {
    $this->user = new User();
  }

  public function show($id)
  {
    $user_data = $this->user->getUserById($id);

    if (!$user_data) {
      echo "Usuário não encontrado.";
      return; 
    }

    $this->dd($user_data);
  }
}