<?php

namespace App\Models;

use App\Models\Database;

class User extends Database
{
  public function getUser($username, $password)
  {
    $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
    $stmt = $this->connection->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    return $stmt->fetch();
  }
  public function getUserById($id)
  {
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

  public function genId()
  {
    $parts = [];
    foreach ([8, 4, 4, 4, 12] as $length) {
      $parts[] = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvxyzw0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, $length);
    }
    return implode('-', $parts);
  }

  public function createUser($name, $username, $password)
  {
    $user_id = $this->genId();
    $sql = "INSERT INTO users (user_id, name, username, password) VALUES (:user_id, :name, :username, :password)";
    $stmt = $this->connection->prepare($sql);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
  }
}
