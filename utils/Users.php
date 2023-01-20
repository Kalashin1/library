<?php
class User {

  private $connection;

  function __construct($conn)
  {
    $this->connection = $conn;
  }

  function create_user($name, $surname, $username, $password){
    $name = mysqli_real_escape_string($this->connection, $name);
    $surname = mysqli_real_escape_string($this->connection, $surname);
    $username = mysqli_real_escape_string($this->connection, $username);
    $password = password_hash(mysqli_real_escape_string($this->connection, $password), PASSWORD_BCRYPT);

    // * CHECK IF USER ALREADY EXISTS

    $existing_user = $this->get_user_by_username($username);
    if(isset($existing_user["id"])) {
      return ["error" => "that username is already taken"];
    }

    $id = uniqid(rand(), true);
    $sql = "INSERT INTO users(id, name, surname, username, password) VALUES('$id', '$name', '$surname', '$username', '$password')";
    mysqli_query($this->connection, $sql);
    if (mysqli_error($this->connection)) {
      echo "error something happened ".mysqli_error($this->connection);
    }
    return ["id" => $id, "name" => $name, "surname" => $surname, "username" => $username];
  }

  function get_user_by_id($id) {
    $id = mysqli_real_escape_string($this->connection, $id);
    $sql = "SELECT id, name, surname, type, username FROM users WHERE id='$id' AND is_deleted='0'";
    $query = mysqli_query($this->connection, $sql);
    $result = mysqli_fetch_assoc($query);
    return $result;
  }

  function login($username, $password) {
    $username = mysqli_real_escape_string($this->connection, $username);
    $password = mysqli_real_escape_string($this->connection, $password);
    // * GET USER BY username
    $sql = "SELECT id, username, name, surname, type, password FROM users WHERE username='$username' WHERE is_deleted='0'";
    $query = mysqli_query($this->connection, $sql);
    $res = mysqli_fetch_assoc($query);
    if(!isset($res["id"])) {
      return ["error" => "no user with that username"];
    }
    // * compare password
    if (password_verify($password, $res["password"])) {
      return $res;
  } else {
      return ["error" => "incorrect Password"];
  }
  }

  function get_user_by_username($username) {
    $username = mysqli_real_escape_string($this->connection, $username);
    $sql = "SELECT id, name, surname FROM users WHERE username='$username' AND is_deleted='0'";
    $query = mysqli_query($this->connection, $sql);
    $result = mysqli_fetch_assoc($query);
    return $result;
  }

  function get_users() {
    $sql = "SELECT id, name, surname, type, username FROM users WHERE is_deleted='0'";
    $query = mysqli_query($this->connection, $sql);
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
    return $result;
  }

  function update_user_profile($id, $name, $surname){
    $name = mysqli_real_escape_string($this->connection, $name);
    $surname = mysqli_real_escape_string($this->connection, $surname);
    $id = mysqli_real_escape_string($this->connection, $id);
    $sql = "UPDATE users SET name='$name', surname='$surname' WHERE id='$id' AND is_deleted='0'";
    mysqli_query($this->connection, $sql);
    if (mysqli_error($this->connection)){
      echo "Opps something happened ".mysqli_error($this->connection);
    }
  }
}
