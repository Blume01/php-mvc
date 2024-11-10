<?php

spl_autoload_register(function($class) {
  $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
  $file = __DIR__ . '/../' . $class . '.php';
  
  if (file_exists($file)) {
      require_once $file;
  }
});

set_error_handler(function ($errno, $errstr, $errfile, $errline) {
  $error = [
      'code' => $errno,
      'message' => $errstr,
      'file' => $errfile,
      'line' => $errline,
      'date' => date('Y-m-d H:i:s')
  ];

  $logFile = 'app/logs/error_log.json';
  
  if (file_exists($logFile)) {
      $currentData = json_decode(file_get_contents($logFile), true);

      if (is_array($currentData)) {
          $currentData[] = $error;
      } else {
          $currentData = [$error];
      }
      
  } else {
      $currentData = [$error];
  }

  file_put_contents($logFile, json_encode($currentData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
});