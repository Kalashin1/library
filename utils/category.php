<?php
class Category {

  private $connection;

  function __construct($conn)
  {
    $this->connection = $conn;
  }

  function get_categories(){
    $sql = "SELECT title, created_at, id FROM categories WHERE is_deleted='0' ORDER BY title";

    $query = mysqli_query($this->connection, $sql);
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
    return $result;
  }

  function create_category($title){
    $title = mysqli_real_escape_string($this->connection, $title);
    $id = uniqid (rand (),true);
    $sql = "INSERT INTO categories(`id`, `title`) VALUES('$id', '$title')";
    $query = mysqli_query($this->connection, $sql);
    if (mysqli_error($this->connection)) {
      echo "error something happened ".mysqli_error($this->connection);
    } else {
      return [ "id" => $id, "title" => $title ];
    }
  }

  function get_category($id) {
    $id = mysqli_real_escape_string($this->connection, $id);
    $sql = "SELECT id, title, created_at FROM categories WHERE id='$id'";
    $query = mysqli_query($this->connection, $sql);
    if (mysqli_error($this->connection)){
      echo "error something happened ".mysqli_error($this->connection);
    } else {
      return mysqli_fetch_assoc($query);
    }
  }

  function update_category($title, $id) {
    $title = mysqli_real_escape_string($this->connection, $title);
    $id = mysqli_real_escape_string($this->connection, $id);
    $time_stamp = date("Y-m-d h:i:s");
    $sql = "UPDATE categories SET `title`='$title', `updated_at`='$time_stamp' WHERE id='$id'";
    mysqli_query($this->connection, $sql);
    if (mysqli_error($this->connection)) {
      echo "error something happened ".mysqli_error($this->connection);
    } else {
      return [ "id" => $id, "title" => $title ];
    }
  }

  function delete_category($id) {
    $id = mysqli_real_escape_string($this->connection, $id);
    $time_stamp = date("Y-m-d h:i:s");
    $sql = "UPDATE categories SET categories.is_deleted='1', categories.deleted_at='$time_stamp' WHERE categories.id='$id';";
    mysqli_query($this->connection, $sql);
    if (mysqli_error($this->connection)) {
      echo "error something happened ".mysqli_error($this->connection);
    } else {
      return [ "id" => $id, "title"];
    }
  }

  function get_deleted_categories() {
    $sql = "SELECT * from categories WHERE is_deleted='true'";
    $query = mysqli_query($this->connection, $sql);
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
    return $result;
  }

  function undo_delete($id) {
    $id = mysqli_real_escape_string($this->connection, $id);
    $sql = "UPDATE categories SET `is_deleted`='0', `deleted_at`=NULL WHERE `id`='$id'";
    mysqli_query($this->connection, $sql);
    if (mysqli_error($this->connection)) {
      echo "error something happened ".mysqli_error($this->connection);
    } else {
      return [ "id" => $id, "title"];
    }
  }
}
?>
