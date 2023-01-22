<?php
require("./controllers/author.php");
?>
<div class="row">
  <div class="col-12 col-md-10 col-lg-8">
    <form class="card" method="POST">
      <div class="card-header">
        <h4>Create Author Form</h4>
      </div>
      <div class="card-body">
        <div class="form-group row">
          <label for="Name" class="col-sm-3 col-form-label">Name</label>
          <div class="col-sm-9">
            <?php if (isset($_GET["author"])) { ?>
              <input name="name" value="<?php echo $_GET["name"] ?>" required class="form-control" id="Name" placeholder="Name">
            <?php } else { ?>
              <input name="name" value="" required class="form-control" id="Name" placeholder="Name">
            <?php } ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="Surname" class="col-sm-3 col-form-label">Surname</label>
          <div class="col-sm-9">
            <?php if (isset($_GET["author"])) { ?>
              <input name="surname" required value="<?php echo $_GET["surname"] ?>" class="form-control" id="Surname" placeholder="Surname">
            <?php } else { ?>
              <input name="surname" required class="form-control" id="Surname" placeholder="Surname">
            <?php } ?>

          </div>
        </div>
        <div class="form-group row">
          <label for="Bio" class="col-sm-3 col-form-label">Bio</label>
          <div class="col-sm-9">
            <?php if (isset($_GET["author"])) { ?>
              <textarea name="bio" required class="form-control" id="Bio" placeholder="Bio">
                <?php echo $_GET["bio"] ?>
              </textarea>
            <?php } else { ?>
              <textarea name="bio" required class="form-control" id="Bio" placeholder="Bio"></textarea>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <?php if (isset($_GET["author"])) { ?>
          <button type="submit" name="update-author" class="btn btn-warning">Update Author <span class="fas fa-exclamation"></span></button>
        <?php } else { ?>
          <button type="submit" name="create-author" class="btn btn-success">Create Author</button>
        <?php } ?>
      </div>
    </form>
  </div>
</div>