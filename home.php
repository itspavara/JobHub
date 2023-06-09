<?php
//Linking the configuration file
require_once("./config/config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./src/styles/home.css" />

  <!--Fontawsomr icons-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>JobHub</title>
</head>

<nav class="nav-container">
  <div id="logonav">
    <a href="/home.html"><img src="./src/images/logo-no-background.png" alt="Logo" /></a>
  </div>
  <div>
    <ul class="nav">
      <li><a href="/JobHub/findjob.php">Find Jobs</a></li>
      <li><a href="/JobHub/uploadcv.php">Upload cv</a></li>
      <li><a href="">About us</a></li>
    </ul>
  </div>
  <div class="btn-wrapper">
    <button class="btn">Log In</button>
    <button class="btn">Sign Up</button>
  </div>
</nav>
<header>
  <div class="hero">
    <h1 class="header-title">
      FIND YOUR <br> <span>PERFECT JOB</span><br>EASILY
    </h1>
  </div>
</header>

<body>
  <!-- search bar -->
  <form action="findjob.php" method="get">
    <div class="search-wrapper">
      <div class="search">
        <label>Search What you Want</label>
        <div class="search-bar">
          <input type="text" placeholder="Search Jobs,Keyword,Company,State..." class="search-input" name="search" />
          <select name="category">
            <option value="full-time">Full Time</option>
            <option value="part-time">Part Time</option>
          </select>
          <div class="btn-wrapper-search">
            <button class="btn btn-search" type="submit">Search</button>
          </div>
        </div>
      </div>
    </div>
  </form>

  <div class="body">
    <div class="recent-job">
      <h1>Most Recent Jobs</h1>

      <?php

      $sql = "SELECT company,job_title FROM  job_vacancy LIMIT 4";
      $result = $con->query($sql);

      if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

      ?>
          <div class="job-tag">
            <h3 class="company"><?php echo $row['company'] ?></h3>
            <h3 class="job"><?php echo $row['job_title'] ?></h3>
            <a class="viewjob" href="/JobHub/viewjob.php"><i class="fa-solid fa-circle-chevron-right fa-lg"></i></a>
          </div>
      <?php
        }
      } else {
        echo "Job post not Found";
      }
      ?>



      <a href="/viewjob.html" class="btn btn-seemore">see More</a>
    </div>
  </div>

  <div class="dis">
    <h2>Why us</h2>
    <p>
      If you're looking for a job, our online job portal is the perfect place
      to start your search. We have a wide variety of jobs to choose from, our
      job search tools are easy to use, and we offer a variety of features to
      help you stand out from the competition. We are also committed to
      helping you find a job, so don't hesitate to contact our team of career
      coaches if you need help with your job search.
    </p>
  </div>
</body>

<footer class="foot-container">
  <div class="foot-dis">
    <div id="logofoot">
      <img src="./src/images/logo-no-background.png" alt="Logo" />
    </div>

    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis
      doloribus adipisci ullam blanditiis
    </p>
    <div>
      <i class="fa-brands fa-facebook-f fa-xl"></i>
      <i class="fa-brands fa-instagram fa-xl"></i>
      <i class="fa-brands fa-twitter fa-xl"></i>
      <i class="fa-brands fa-linkedin fa-xl"></i>
      <i class="fa-brands fa-youtube fa-xl"></i>
    </div>
  </div>
  <div class="foot-nav">
    <ul>
      <li><a href="">About Us</a></li>
      <li><a href="">Contact us</a></li>
      <li><a href="">Terms and Cond</a></li>
      <li><a href="">Privacy Policy</a></li>
      <li><a href="">Blog</a></li>
    </ul>
  </div>
  <div class="foot-nav">
    <ul>
      <li><a href="">For Employes</a></li>
      <li><a href="">Find Jobs</a></li>
      <li><a href="">Account</a></li>
      <li><a href="">Upload Resume</a></li>
      <li><a href="">Help</a></li>
    </ul>
  </div>
  <div class="foot-nav">
    <ul>
      <li><a href="">For Companis</a></li>
      <li><a href="">Post Jobs</a></li>
      <li><a href="">Account</a></li>
      <li><a href="">Pricing</a></li>
      <li><a href="">Help</a></li>
    </ul>
  </div>
</footer>

</html>