<?php
require_once("./controllers/author.php");
require_once("./controllers/book.php");
require_once("./controllers/category.php");

?>
<div class="row">
  <div class="col-12 col-md-10 col-lg-10">
    <form method="POST" class="card">
      <div class="card-header">
        <h4>Create Book</h4>
      </div>
      <div class="card-body">
        <div class="form-group row">
          <label for="title" class="col-sm-3 col-form-label">Title</label>
          <div class="col-sm-9">
            <?php if (isset($_GET["book"])) { ?>
              <input name="title" value="<?php echo $_GET["title"]; ?>" class="form-control" id="title" placeholder="Title">
            <?php } else { ?>
              <input name="title" class="form-control" id="title" placeholder="Title">
            <?php } ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="page" class="col-sm-3 col-form-label">Page</label>
          <div class="col-sm-9">
            <?php if (isset($_GET["book"])) { ?>
              <input name="page" value="<?php echo $_GET["page"]; ?>" type="number" class="form-control" id="Page" placeholder="Page">
            <?php } else { ?>
              <input name="page" type="number" class="form-control" id="Page" placeholder="Page">
            <?php } ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="Image" class="col-sm-3 col-form-label">Image URL</label>
          <div class="col-sm-9">
            <?php if (isset($_GET["book"])) { ?>
              <input name="image" value="<?php echo $_GET["image"] ?>" class="form-control" id="Image" placeholder="Image">
            <?php } else { ?>
              <input name="image" class="form-control" id="Image" placeholder="Image">
            <?php } ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="year_of_publication" class="col-sm-3 col-form-label">Published Year</label>
          <div class="col-sm-9">

            <?php if (isset($_GET["book"])) { ?>
              <input name="year_of_publication" value="<?php echo $_GET["year_of_publication"]; ?>" number class="form-control" id="year_of_publication" placeholder="year_of_publication" />
            <?php } else { ?>
              <input name="year_of_publication" number class="form-control" id="year_of_publication" placeholder="year_of_publication" />
            <?php } ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="category" class="col-sm-3 col-form-label">Category</label>
          <div class="col-sm-9">
            <select id="category" name="category" class="form-control select2">
              <?php if (isset($_GET["book"])) { ?>
                <option selected value="<?php echo $_GET['category'] ?>"><?php echo $_GET['category_title'] ?></option>
              <?php } else { ?>
                <option selected disabled value="<?php echo $Category->get_categories()[0]['id'] ?>"><?php echo $Category->get_categories()[0]['title'] ?></option>
                <?php foreach ($Category->get_categories() as $category) { ?>
                  <option value="<?php echo $category['id'] ?>"><?php echo $category["title"] ?></option>
                <?php } ?>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="author" class="col-sm-3 col-form-label">Author</label>
          <div class="col-sm-9">
            <select id="author" name="author" class="form-control select2">
              <?php if (isset($_GET["book"])) { ?>
                <option selected disabled value="<?php echo $_GET['author'] ?>"><?php echo "$_GET[author_name] $_GET[author_surname]" ?></option>
              <?php } else { ?>
                <?php foreach ($Author->get_authors() as $author) { ?>
                  <option value="<?php echo $author['id'] ?>"><?php echo "$author[name] $author[surname]" ?></option>
              <?php }
              } ?>
            </select>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <?php if (isset($_GET["book"])) { ?>
          <button type="submit" name="update-book" class="btn btn-warning">Update Book <span class="fas fa-exclamation"></span></button>
        <?php } else { ?>
          <button type="submit" name="create-book" class="btn btn-success">Add Book</button>
        <?php } ?>
      </div>
    </form>
  </div>
</div>