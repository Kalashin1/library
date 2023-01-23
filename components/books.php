<?php
require("./controllers/category.php");
?>
<div class="section-body">
  <div class="dropdown m-4">
    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
      Filter By category
    </button>
    <div class="dropdown-menu">
      <?php foreach ($Category->get_categories() as $category) { ?>
        <a class="dropdown-item" href="?filter_book_by=<?php echo $category["id"] ?>"><?php echo $category["title"] ?></a>
      <?php } ?>
    </div>
  </div>
  <div class="row">
    <?php require_once("./components/book.php"); ?>
  </div>
</div>