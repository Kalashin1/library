<?php

function connect() {

  $details = ["hostname" => "localhost", "username" => "root", "password" => "", "database" => "library"];

  $conn = mysqli_connect($details["hostname"], $details["username"], $details["password"], $details["database"]);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  };
  return $conn;
}

?>
