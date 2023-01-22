<?php
require_once("./controllers/category.php");
?>
<div class="row">
  <div class="col-12 col-md-10 col-lg-8">
    <form class="card" method="POST">
      <div class="card-header">
        <h4>Create A categorey</h4>
      </div>
      <div class="card-body">
        <div class="form-group row">
          <label for="title" class="col-sm-3 col-form-label">Title</label>
          <div class="col-sm-9">
            <?php if (isset($_GET["category"])) { ?>
              <input name="title" value="<?php echo $_GET["title"]; ?>" class="form-control" id="title" required placeholder="Title">
            <?php } else { ?>
              <input name="title" value="" class="form-control" id="title" required placeholder="Title">
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <?php if (isset($_GET["category"])) { ?>
          <button name="update-category" type="submit" class="btn btn-warning">Update Category <span class="fas fa-exclamation"></span></button>
        <?php } else { ?>
          <button name="create-category" type="submit" class="btn btn-primary">Create Category</button>
        <?php } ?>
      </div>
    </form>
  </div>
</div>