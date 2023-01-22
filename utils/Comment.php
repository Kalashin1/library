<?php
class Comment {

  private $connection;

  function __construct($conn)
  {
    $this->connection = $conn;
  }

  function get_comment($id) {
    $id = mysqli_real_escape_string($this->connection, $id);
    $sql = "SELECT comments.id, comments.content, comments.created_at, comments.is_approved, books.title, books.id AS book_id, users.id AS user_id, users.name AS user_name, users.surname AS user_surname FROM comments INNER JOIN books ON comments.book=books.id INNER JOIN users ON comments.user=users.id WHERE comments.is_deleted='0' AND comments.id='$id' AND books.is_deleted='0' AND users.is_deleted='0'";
    $query = mysqli_query($this->connection, $sql);
    $result = mysqli_fetch_assoc($query);
    return $result;
  }
  function get_user_comment($user, $book){
    $user = mysqli_real_escape_string($this->connection, $user);
    $sql = "SELECT * FROM comments WHERE comments.is_deleted='0' AND comments.user='$user' AND comments.book='$book' AND comments.is_deleted='0'";
    $query = mysqli_query($this->connection, $sql);
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
    return $result;
  }

  function get_comments($book) {
    $sql = "SELECT comments.id, comments.content, comments.created_at, comments.is_approved, users.id AS user_id, users.name AS user_name, users.surname AS user_surname, books.id as book_id FROM comments INNER JOIN users ON comments.user=users.id INNER JOIN books ON books.id=comments.book WHERE comments.is_deleted='0' AND comments.book='$book' AND users.is_deleted='0' AND books.is_deleted='0'";
    $query = mysqli_query($this->connection, $sql);
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
    return $result;
  }

  function get_approved_comments($book){
    $sql = "SELECT comments.id, comments.content, comments.created_at, comments.is_approved, books.title, books.id AS book_id, users.id AS user_id, users.name AS user_name, users.surname AS user_surname FROM comments INNER JOIN books ON comments.book=books.id INNER JOIN users ON comments.user=users.id WHERE comments.is_deleted='0' AND comments.is_approved='1' AND comments.book='$book' AND users.is_deleted='0' AND books.is_deleted='0'";
    $query = mysqli_query($this->connection, $sql);
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
    return $result;
  }

  function get_unapproved_comments($book) {
    $sql = "SELECT comments.id, comments.content, comments.created_at, comments.is_approved, books.title, books.id AS book_id, users.id AS user_id, users.name AS user_name, users.surname AS user_surname FROM comments INNER JOIN books ON comments.book=book.id INNER JOIN users ON comments.user=users.id WHERE comments.is_deleted='0' AND comments.is_approved='0'  AND comments.book='$book'";
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
    $time_stamp = date("Y-m-d h:i:s");
    $sql = "UPDATE comments SET is_approved='1', approved_at='$time_stamp' WHERE id='$id' AND is_deleted='0'";
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
    $comment = $this->get_user_comment($var["user"], $var["book"]);
    if (count($comment) > 0) {
      echo "user has already commented";
      return ["error" => "user has already commented"];
    } else {
      $sql = "INSERT INTO comments(id, content, user, book) VALUES('$var[id]', '$var[content]', '$var[user]', '$var[book]')";
      mysqli_query($this->connection, $sql);
      if (mysqli_error($this->connection)) {
        echo "error something happened ".mysqli_error($this->connection);
      } else {
        return $var;
      }
    }
  }
}
