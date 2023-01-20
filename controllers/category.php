<?php
require_once("./utils/conn.php");
require_once("./utils/category.php");

$conn = connect();
$Category = new Category($conn);

$id = htmlspecialchars("64455433763c81f6950e381.58362358");

if (isset($_POST["create-category"])){
  $title = $_POST["title"];
  $title = htmlspecialchars($title);
  $category = $Category->create_category($title);
  $_SESSION["catgeory"] = $category["id"];
  print_r($category);
}


// print_r(count($Category->get_categories()));
// print_r($Category->undo_delete($id));
// echo date("Y-m-d h:i:s");


?>
