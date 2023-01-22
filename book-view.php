<?php
session_start();
  require_once("./components/header.php");

?>
<!-- <div class="loader"></div> -->
<div id="app">
  <div class="main-wrapper main-wrapper-1">
    <?php require_once("./components/navbar.php"); ?>
    <?php require_once("./components/sidebar.php"); ?>
    <div class="main-content">
      <section class="section">
        <?php require_once("./components/book-view.php"); ?>
      </section>
    </div>
  </div>
</div>
<?php require_once("./components/footer.php"); ?>