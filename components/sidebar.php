<?php
  require_once("./controllers/user.php");
 if (isset($_SESSION["user"])){
   $user = $_SESSION["user"];
 }
?>

<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.php">Library</span>
      </a>
    </div>
    <ul class="sidebar-menu">
      <?php if (!isset($user["id"]) || $user["type"] === "USER") { ?>
        <li class="dropdown active">
          <a href="index.html" class="nav-link"><i data-feather="monitor"></i><span>Books</span></a>
        </li>
      <?php } ?>
      <?php if (isset($user["id"]) && ($user["type"] === "ADMIN")) { ?>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="briefcase"></i><span>Categories</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="category.php">View All</a></li>
            <li><a class="nav-link" href="create-category.php">Add Category</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="briefcase"></i><span>Books</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="book.php">View All</a></li>
            <li><a class="nav-link" href="create-book.php">Add Book</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="briefcase"></i><span>Authors</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="author.php">View All</a></li>
            <li><a class="nav-link" href="create-author.php">Add Authors</a></li>
          </ul>
        </li>
      <?php } ?>
    </ul>
  </aside>
</div>