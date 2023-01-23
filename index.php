<?php
session_start();
require_once("./components/header.php");

?>
<div class="loader"></div>
<div id="app">
  <div class="main-wrapper">
    <?php require_once("./components/navbar.php"); ?>
    <?php require_once("./components/sidebar.php"); ?>
    <div class="main-content">
      <section class="section">
        <?php require_once("./components/books.php"); ?>
      </section>
      <button type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#exampleModalCenter">
        Launch demo modal
      </button>
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" sh>
        <div class=" modal-dialog-centered col-6 offset-md-3" role="document">
          <div class="modal-content" style="z-index: 1000;">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Quote Of the Day</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body jokes"></div>
            <div class="modal-footer">
                <h6 class="jokes-author">Quote Of the Day</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Button trigger modal -->


<?php require_once("./components/footer.php"); ?>