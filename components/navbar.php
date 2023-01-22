<?php
$user;
if (isset($_SESSION["user"])) {
  $user = $_SESSION["user"];
}
if (isset($_GET["logout"])) {
  session_destroy();
  echo "<script>(() => {window.location.assign('login.php')})()</script>";
}
?>

<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar sticky">
  <div class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn"> <i data-feather="align-justify"></i></a></li>
      <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
          <i data-feather="maximize"></i>
        </a></li>
      <li>
        <form class="form-inline mr-auto">
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
            <button class="btn" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </form>
      </li>
    </ul>
  </div>
  <ul class="navbar-nav navbar-right">
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <?php if (isset($_SESSION["user"])) { ?>
          <span class="text-dark display-4"><?php echo $user["name"][0]; ?></span><span class="d-sm-none d-lg-inline-block"></span></a>
      <div class="dropdown-menu dropdown-menu-right pullDown">
        <div class="dropdown-title">Hello <?php echo $user["name"] . " " . $user["surname"]; ?></div>
        <a href="profile.php" class="dropdown-item has-icon"> <i class="far fa-user"></i> Profile
        </a>
        <div class="dropdown-divider"></div>
        <a href="?logout=true" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
          Logout
        </a>
      </div>
    <?php } else { ?>
      <span class="text-dark display-6">No user</span><span class="d-sm-none d-lg-inline-block"></span></a>
      <div class="dropdown-menu dropdown-menu-right pullDown">
        <div class="dropdown-title">Hello</div>
        <a href="login.php" class="dropdown-item has-icon"> <i class="far fa-user"></i> Login
        </a>
      </div>
    <?php } ?>
    </li>
  </ul>
</nav>