<?php
  function CreateConnection() {
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = GetPassword();
    $database = "mariokart";

    $connection = new mysqli($dbhost, $dbuser, $dbpass, $database)
      or die("Connect failed: %s\n". $conn -> error);

    return $connection;
  }

  function GetPassword() {
    $passwordFile = "C:\DatabasePasswords\KartBuilderPassword.txt";
    $handle = fopen($passwordFile, "r");
    $contents = fread($handle, filesize($passwordFile));
    fclose($handle);
    return $contents;
  }

  function CloseConnection($connection) {
    $connection->close();
  }

  function GetSumOfValues($column, $name, $connection) {
    $connection->query("SELECT " . $column);
  }
?>
