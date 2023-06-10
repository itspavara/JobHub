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

  <title>find Jobs</title>
</head>

<?php require_once("./header.php") ?>

<body>
  <div class="space"></div>
  <div class="search-wrapper-viewjobs">
    <div class="search-viewjobs">
      <h2>Search What you Want</h2>
      <!-- search jobs -->
      <form action="findjob.php" method="get">
        <div class="searchbar-viewjobs">
          <input type="text" placeholder="   Search Jobs,Keyword,Company,State..." class="search-input" name="search" value="<?php if (isset($_GET['search'])) {
                                                                                                                                echo $_GET['search'];
                                                                                                                              } ?>" />
          <select class="category" name="category">
            <option value="full-time">Full Time</option>
            <option value="part-time">Part Time</option>
            <option value="internship">Internship</option>
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

<?php require_once("./footer.php") ?>

</html>