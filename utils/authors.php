<?php
class Author {
  private $connection;

  function __construct($conn)
  {
    $this->connection = $conn;
  }

  function create_author($name, $surname, $bio) {
    $var = ["name" => "", "surname" => "", "bio" => ""];
    $var["name"] = mysqli_real_escape_string($this->connection, $name);
    $var["surname"] = mysqli_real_escape_string($this->connection, $surname);
    $var["bio"] = mysqli_real_escape_string($this->connection, $bio);
    $id = uniqid(rand(), true);
    // * SQL QUERY
    $sql = "INSERT INTO authors(`id`, `name`, `surname`, `bio`) VALUES('$id', '$var[name]', '$var[surname]', '$var[bio]')";
    mysqli_query($this->connection, $sql);
    if (mysqli_error($this->connection)) {
      echo "error something happened ".mysqli_error($this->connection);
    } else {
      $var["id"] = $id;
      return $var;
    }
  }

  function get_author($id) {
    $id = mysqli_real_escape_string($this->connection, $id);
    $sql = "SELECT `id`, `name`, `surname`, `bio` FROM authors";
    $query = mysqli_query($this->connection, $sql);
    $result = mysqli_fetch_assoc($query);
    return $result;
  }

  function get_authors() {
    $sql = "SELECT * FROM authors WHERE `is_deleted`='0'";
    $query = mysqli_query($this->connection, $sql);
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
    return $result;
  }

  function update_author($name, $surname, $bio, $id) {
    $var = ["name" => "", "surname" => "", "bio" => "", "id" => ""];
    $time_stamp = date("Y-m-d h:i:s");
    $var["name"] = mysqli_real_escape_string($this->connection, $name);
    $var["surname"] = mysqli_real_escape_string($this->connection, $surname);
    $var["bio"] = mysqli_real_escape_string($this->connection, $bio);
    $var["id"] = mysqli_real_escape_string($this->connection, $id);
    $sql = "UPDATE authors SET `name`='$var[name]', `surname`='$var[surname]', `bio`='$var[bio]', `updated_at`='$time_stamp' WHERE `id`='$id'";
    mysqli_query($this->connection, $sql);
    if (mysqli_error($this->connection)) {
      echo "error something happened ".mysqli_error($this->connection);
    } else {
      $var["id"] = $id;
      return $var;
    }
  }

  function delete_author($id) {
    $id = mysqli_real_escape_string($this->connection, $id);
    $time_stamp = date("Y-m-d h:i:s");
    $sql = "UPDATE authors SET `is_deleted`='1', `deleted_at`='$time_stamp' WHERE `id`='$id'";
    mysqli_query($this->connection, $sql);
    if (mysqli_error($this->connection)) {
      echo "error something happened ".mysqli_error($this->connection);
    } else {
      return [ "id" => $id, "title"];
    }
  }

  function undo_delete($id) {
    $id = mysqli_real_escape_string($this->connection, $id);
    $sql = "UPDATE authors SET `is_deleted`='0', `deleted_at`=NULL WHERE `id`='$id'";
    mysqli_query($this->connection, $sql);
    if (mysqli_error($this->connection)) {
      echo "error something happened ".mysqli_error($this->connection);
    } else {
      return [ "id" => $id, "title"];
    }
  }
}
?>