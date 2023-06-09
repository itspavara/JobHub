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
  <link rel="stylesheet" href="./src/styles/findjobs.css" />

  <!--Fontawsomr icons-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>View Jobs</title>
</head>

<header>
  <nav>
    <div class="nav-container">
      <div id="logonav">
        <a href="/JobHub/home.php"><img src="./src/images/logo-no-background.png" alt="Logo" /></a>
      </div>
      <div>
        <ul class="nav">
          <li><a href="/JobHub/findjob.php">Find Jobs</a></li>
          <li><a href="/JobHub/uploadcv.php">Upload cv</a></li>
          <li><a href="">About</a></li>
        </ul>
      </div>
      <div class="icon">
        <a href=""><i class="fa-solid fa-user fa-2xl"></i></a>
      </div>
    </div>
  </nav>
</header>

<body>
  <div class="search-wrapper-viewjobs">
    <div class="search">
      <label>Search What you Want</label>


      <!-- search jobs -->
      <form action="findjob.php" method="get">
        <div class="search-bar">
          <input type="text" placeholder="Search Jobs,Keyword,Company,State..." class="search-input" name="search" value="<?php if (isset($_GET['search'])) {
                                                                                                                            echo $_GET['search'];
                                                                                                                          } ?>" />
          <select name="category">
            <option value="full-time">Full Time</option>
            <option value="part-time">Part Time</option>
          </select>
          <div class="btn-wrapper-search">
            <button class="btn btn-search" type="submit">Search</button>
          </div>
        </div>
      </form>


    </div>
  </div>
  <div class="job-container">
    <!-- search jobs and display -->
    <?php
    if (isset($_GET['search'])) {
      $filter = $_GET['search'];
      $type = $_GET['category'];
      $sql = "SELECT * FROM job_vacancy WHERE CONCAT(company,job_title,job_location) LIKE '%$filter%' AND job_type = '$type' ";

      $result = $con->query($sql);

      if ($result->num_rows > 0 && (!$_GET['search'] == NULL)) {

        while ($row = $result->fetch_assoc()) {
    ?>
          <form action="viewjobs.php" action='get'>
            <div class="job-card">
              <div>
                <h2><?php echo $row['job_title']; ?></h2>
                <h3><?php echo $row['company']; ?></h3>
                <h3><?php echo $row['job_location']; ?></h3>
              </div>
              <div class="btn-wrapper-jobs">
                <a class="btn btn-search" href="viewjobs.php?id=<?= $row['job_id'] ?>">View Jobs</a>
              </div>
            </div>
          </form>
        <?php

        }
      } else {
        ?>
        <h3 style="text-align: center;">No Job found</h3>
    <?php
      }
    }
    ?>

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