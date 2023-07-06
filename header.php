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
          if (isset($_SESSION['User_ID'])) {
          ?>
            <li><a href="/JobHub/findjob.php">Find Jobs</a></li>
            <li><a href="/JobHub/uploadcv.php">Upload cv</a></li>
            <li><a href="/JobHub/about_us.php">About</a></li>
            <li><a href="/JobHub/dashboard.php">Dashboard</a></li>
            <li><a href="sign_out.php">Logout</a></li>
          <?php
          } else {
          ?>
            <li><a href="/JobHub/findjob.php">Find Jobs</a></li>
            <li><a href="/JobHub/uploadcv.php">Upload cv</a></li>
            <li><a href="/JobHub/about_us.php">About</a></li>
            <li><a href="/JobHub/sign_up.php">Sign up</a></li>
            <li><a href="/JobHub/sign_up.php">Login</a></li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
</header>