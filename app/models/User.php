<?php

namespace App\Models;

use App\Models\Database;

class User extends Database
{
  public function getUser($username, $password){
    $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
    $stmt = $this->connection->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    return $stmt->fetch();
  }
  public function getUserById($id){
    $sql = "SELECT * FROM users WHERE user_id = :user_id";
    $stmt = $this->connection->prepare($sql);
    $stmt->bindParam(':user_id', $id);
    $stmt->execute();
    return $stmt->fetch();
  }

  public function getUsers()
  {
    $sql = "SELECT * FROM users";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }
}