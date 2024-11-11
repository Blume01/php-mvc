<?php

namespace App\Models;

use PDO;
use Exception;
use PDOException;

class Database
{
  private string $hostname = "localhost";
  private string $username = "root";
  private string $password = "";
  private string $database = "php-mvc";

  protected PDO $connection;

  public function __construct()
  {
    try {
      $this->connection = new PDO(
        dsn: "mysql:host={$this->hostname};dbname={$this->database}",
        username: $this->username,
        password: $this->password,
        options: [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
      );
    } catch (PDOException $e) {
      throw new Exception("Connection error: " . $e->getMessage());
    }
  }
}
