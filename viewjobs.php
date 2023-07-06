<?php


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

  $sql = "SELECT * FROM job_vacancy WHERE job_id = '$id'";

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
          <h3><?php echo $row['job_location']; ?></h3><br>
          <h3><?php echo $row['job_type']; ?></h3><br>

        </div>
        <div class="disc-body">
          <div class="disc">
            <?php echo $row['job_description']; ?>
          </div>
          <div class="btn-wrapper-jobs">

            <form action="viewjobs.php" method="get">
              <div class="btn-wrapper-jobs">
                <button name="save" value="<?= $row['job_id'] ?>" class="btn btn-search">Save job</button>
                <button name="apply" value="<?= $row['job_id'] ?>" class="btn btn-search">Apply job</button>
              </div>
            </form>
          </div>

      <?php

    }
  }
      ?>

      <!-- save jobs -->
      <?php
      if (isset($_GET['save'])) {


        $job_id = $_GET['save'];
        $user_id = $_SESSION['User_ID'];

        $sql_save = "INSERT INTO save_job (job_id,user_id,saved_date) VALUES ('$job_id','$user_id',NOW())";
        $result = $con->query($sql_save);

        if ($result) {
          $message = "Save job successfully";
          goBack();
          echo "<script>
              alert('$message');
            </script>";
        } else {
          echo mysqli_error($con);
        }
      }

      ?>

      <!-- apply jobs -->
      <?php
      if (isset($_GET['apply'])) {

        $job_id = $_GET['apply'];
        $user_id = $_SESSION['User_ID'];

        $sql_apply = "INSERT INTO applied_job (job_id,user_id,app_date) VALUES ('$job_id','$user_id',NOW())";
        $result = $con->query($sql_apply);

        if ($result) {
          $message = "Apply job successfully";
          goBack();
          echo "<script>
              alert('$message');
            </script>";
        }
      }

      ?>

      <?php
      function goBack()
      {
        echo "<script>
            window.history.back();
          </script>";
      }
      ?>

      <script>
        function goBack() {
          window.history.back();
        }
      </script>

</body>

</html>