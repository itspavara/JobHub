<?php

// use LDAP\Result;

require_once("./config/config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Jobs</title>

  <link rel="stylesheet" href="./src/styles/viewjobs.css">
  <link rel="stylesheet" href="./src/styles/home.css">
</head>
<?php require_once("./header.php") ?>

<body>
  <?php

  $id = $_GET['id'];
  $save = $_GET['save'];
  $sql = "SELECT * FROM job_vacancy WHERE job_id = '$id' OR job_id ='$save' ";

  $result = $con->query($sql);

  if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {



  ?>
      <div class="space"></div>
      <div class="disc-container">
        <div class="btn-wrapper-back">
          <!-- <a class="btn btn-back" href="/JobHub/findjob.php"> Back</a> -->
          <button class="btn btn-back" onclick="goBack()"> Back</button>
        </div>
        <div class="disc-head">
          <h2><?php echo $row['job_title']; ?></h2>
          <h3><?php echo $row['company']; ?></h3>
          <h3><?php echo $row['job_location']; ?></h3>
        </div>
        <div class="disc-body">
          <div class="disc">
            <?php echo $row['job_description']; ?>
          </div>
          <div class="btn-wrapper-jobs">

            <form action="viewjobs.php" method="get">
              <div class="btn-wrapper-jobs">
                <button name="save" value="<?= $row['job_id'] ?>" class="btn btn-searchd">Save job</button>
                <button name="apply" value="<?= $row['job_id'] ?>" class="btn btn-searchd">Apply job</button>
                <button name="report" value="<?= $row['job_id'] ?>" class="btn btn-searchd">Report job</button>
              </div>
            </form>
          </div>
          <?php
          if (isset($_GET['save'])) {
          ?>
            <div class="alert">
              <p>Job saved succesfully!</p>
            </div>

      <?php
          }
        }
      }
      ?>
      <script>
        function goBack() {
          window.history.back();
        }
      </script>
</body>

</html>