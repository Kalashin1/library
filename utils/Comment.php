<?php
class Comment {

  private $connection;

  function __construct($conn)
  {
    $this->connection = $conn;
  }

  function get_comment($id) {
    $id = mysqli_real_escape_string($this->connection, $id);
    $sql = "SELECT comments.id, comments.content, comments.created_at, comments.is_approved, books.title, books.id AS book_id, users.id AS user_id, users.name AS user_name, users.surname AS user_surname FROM comments INNER JOIN books ON comments.book=book.id INNER JOIN users ON comments.user=users.id WHERE is_deleted='0' AND id='$id'";
    $query = mysqli_query($this->connection, $sql);
    $result = mysqli_fetch_assoc($query);
    return $result;
  }

  // function get_user_comment(){}

  function get_comments() {
    $sql = "SELECT comments.id, comments.content, comments.created_at, comments.is_approved, books.title, books.id AS book_id, users.id AS user_id, users.name AS user_name, users.surname AS user_surname FROM comments INNER JOIN books ON comments.book=book.id INNER JOIN users ON comments.user=users.id WHERE is_deleted='0'";
    $query = mysqli_query($this->connection, $sql);
    $result = mysqli_fetch_assoc($query);
    return $result;
  }

  function get_approved_comments(){
    $sql = "SELECT comments.id, comments.content, comments.created_at, comments.is_approved, books.title, books.id AS book_id, users.id AS user_id, users.name AS user_name, users.surname AS user_surname FROM comments INNER JOIN books ON comments.book=book.id INNER JOIN users ON comments.user=users.id WHERE is_deleted='0' AND is_approved='1'";
    $query = mysqli_query($this->connection, $sql);
    $result = mysqli_fetch_assoc($query);
    return $result;
  }

  function get_unapproved_comments() {
    $sql = "SELECT comments.id, comments.content, comments.created_at, comments.is_approved, books.title, books.id AS book_id, users.id AS user_id, users.name AS user_name, users.surname AS user_surname FROM comments INNER JOIN books ON comments.book=book.id INNER JOIN users ON comments.user=users.id WHERE is_deleted='0' AND is_approved='0'";
    $query = mysqli_query($this->connection, $sql);
    $result = mysqli_fetch_assoc($query);
    return $result;
  }

  function approve_multiple_comments($ids) {
    $time_stamp = date("Y-m-d h:i:s");
    $sql = "UPDATE comments SET is_approved='1', approved_at='$time_stamp' WHERE id IN '$ids' AND is_deleted='0'";
    mysqli_query($this->connection, $sql);
    if (mysqli_error($this->connection)) {
      echo "error something happened ".mysqli_error($this->connection);
    }
  }

  function get_book_comments($book_id) {
    $book_id = mysqli_real_escape_string($this->connection, $book_id);
    $sql = "SELECT comments.id, comments.content, comments.created_at, comments.is_approved, books.title, books.id AS book_id, users.id AS user_id, users.name AS user_name, users.surname AS user_surname FROM comments INNER JOIN books ON comments.book=book.id INNER JOIN users ON comments.user=users.id WHERE is_deleted='0' AND is_approved='1' AND comments.book='$book_id'";
    $query = mysqli_query($this->connection, $sql);
    $result = mysqli_fetch_assoc($query);
    return $result;
  }

  function approve_comment($id) {
    $id = mysqli_real_escape_string($this->connection, $id);
    $sql = "UPDATE comments SET is_approved='1' WHERE id='$id' AND is_deleted='0'";
    mysqli_query($this->connection, $sql);
    if (mysqli_error($this->connection)) {
      echo "error something happened ".mysqli_error($this->connection);
    }
  }

  function delete_comment($id, $user) {
    $id = mysqli_real_escape_string($this->connection, $id);
    $user = mysqli_real_escape_string($this->connection, $user);
    $time_stamp = date("Y-m-d h:i:s");
    $sql = "UPDATE comments SET is_deleted='1', deleted_at='$time_stamp' WHERE id='$id' AND user='$user'";
    mysqli_query($this->connection, $sql);
    if (mysqli_error($this->connection)) {
      echo "error something happened ".mysqli_error($this->connection);
    }
  }

  function insert_comment($content, $user, $book) {
    $var = ["content" => "", "user" => "", "book" => ""];
    $var["content"] = mysqli_real_escape_string($this->connection, $content);
    $var["book"] = mysqli_real_escape_string($this->connection, $book);
    $var["user"] = mysqli_real_escape_string($this->connection, $user);
    $var["id"] = uniqid(rand(), true);
    $sql = "INSERT INTO comments(id, content, user, book) VALUES('$var[id]', '$var[content]', '$var[user]', '$var[book]')";
    mysqli_query($this->connection, $sql);
    if (mysqli_error($this->connection)) {
      echo "error something happened ".mysqli_error($this->connection);
    } else {
      return $var;
    }
  }
}
?>