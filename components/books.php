<?php
require("./controllers/category.php");
require("./controllers/author.php");
require("./controllers/book.php");
?>
<div class="section-body">
  <div class="d-flex align-items-center">
    <!-- // * FILER BY CATEGORY-->
    <div class="dropdown m-4">
      <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
        Filter By category
      </button>
      <div class="dropdown-menu overflow-scroll">
        <?php foreach ($Category->get_categories() as $category) { ?>
          <a class="dropdown-item" href="?filter_book_by=<?php echo $category["id"] ?>"><?php echo "$category[title] (" . count($Book->get_book_by_category($category["id"])) . ")" ?></a>
        <?php } ?>
      </div>
    </div>
    <!-- //* FILTER BY AUTHOR -->
    <div class="dropdown m-4">
      <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
        Filter By Author
      </button>
      <div class="dropdown-menu">
        <?php foreach ($Author->get_authors() as $author) { ?>
          <a class="dropdown-item" href="?filter_by_author=<?php echo $author["id"] ?>"><?php echo "$author[name] $author[surname]" ?></a>
        <?php } ?>
      </div>
    </div>
    <!-- //* FILTER BY YEAR -->
    <div class="dropdown m-4">
      <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
        Filter By Year
      </button>
      <div class="dropdown-menu">
        <?php foreach ($Book->get_books() as $book) { ?>
          <a class="dropdown-item" href="?filter_by_year=<?php echo $book["year_of_publication"] ?>"><?php echo "$book[year_of_publication]" ?></a>
        <?php } ?>
      </div>
    </div>
  </div>
  <div class="row">
    <?php require_once("./components/book.php"); ?>
  </div>
</div>