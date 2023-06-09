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
</head>

<body>
  <?php

  $id = $_GET['id'];
  $sql = "SELECT * FROM job_vacancy WHERE job_id = '$id'";

  $result = $con->query($sql);

  if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {



  ?>

      <div class="disc-container">
        <div class="btn-wrapper-back">
          <a class="btn btn-back" href="/JobHub/findjob.php"> Back</a>
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
            <button class="btn btn-save">Save Job</button>
            <button class="btn btn-report">report job</button>
          </div>
        </div>
    <?php
    }
  }
    ?>




      </div>
</body>

</html>