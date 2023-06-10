<?php
//To Handle Session Variables on This Page
session_start();
//Including Database Connection From config.php file to avoid rewriting in all files
require_once("./config/config.php");
?>

<header>
  <nav class="navbar">
    <h1 class="navbar-logo"><a href="/JobHub/home.php">JobHub</a></h1>
    <div>
      <div class="nav">
        <ul>

          <?php
          //Show user dashboard link once logged in.
          if (isset($_SESSION['id_user']) && empty($_SESSION['companyLogged'])) {
          ?>
            <li><a href="/JobHub/findjob.php">Find Jobs</a></li>
            <li><a href="/JobHub/uploadcv.php">Upload cv</a></li>
            <li><a href="#">About</a></li>
            <li><a href="user/dashboard.php">Dashboard</a></li>
            <li><a href="logout.php">Logout</a></li>
          <?php
          } else if (isset($_SESSION['id_user']) && isset($_SESSION['companyLogged'])) {
          ?>
            <li><a href="/JobHub/findjob.php">Find Jobs</a></li>
            <li><a href="/JobHub/uploadcv.php">Upload cv</a></li>
            <li><a href="#">About</a></li>
            <li><a href="company/dashboard.php">Dashboard</a></li>
            <li><a href="logout.php">Logout</a></li>
          <?php } else {
            //Show Login Links if no one is logged in.
          ?>
            <li><a href="/JobHub/findjob.php">Find Jobs</a></li>
            <li><a href="/JobHub/uploadcv.php">Upload cv</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Sign up</a></li>
            <li><a href="login.php">Login</a></li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
</header>