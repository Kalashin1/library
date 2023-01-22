<?php
require_once("./utils/conn.php");
require_once("./utils/category.php");

$conn = connect();
$Category = new Category($conn);

if (isset($_POST["create-category"])){
  $title = $_POST["title"];
  $title = htmlspecialchars($title);
  $category = $Category->create_category($title);
  echo '<script>(() => {window.location.assign("category.php")})()</script>';
}


if(isset($_POST["update-category"])){
  $id = $_GET["category"];
  $title = $_POST["title"];
  $id = htmlspecialchars($id);
  $title = htmlspecialchars($title);
  $Category->update_category($title, $id);
  echo '<script>(() => {window.location.assign("category.php")})()</script>';
}

if (isset($_GET["delete_category"])){
  $id = htmlspecialchars($_GET["delete_category"]);
  $Category->delete_category($id);
  echo '<script>(() => {window.location.assign("category.php")})()</script>';
}

?>
