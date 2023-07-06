<?php
//To Handle Session Variables on This Page
session_start();
//Including Database Connection From config.php file to avoid rewriting in all files
require_once("./config/config.php");
?>
<?php


$jobid = $_GET['id'];

if (isset($_POST['update'])) {

  //Declaring varibales and assign empty values
  $title = "";
  $company = "";
  $description = "";
  $jobtype = "";
  $location = "";

  $title = input_varify($_POST['title']);
  $company = input_varify($_POST['company']);
  $description = input_varify($_POST['description']);
  $jobtype = input_varify($_POST['category']);
  $location = input_varify($_POST['location']);

  $query1 = "SELECT * FROM job_vacancy WHERE job_id = '$jobid'";

  $ShowResult = mysqli_query($con, $query1);

  if ($ShowResult) {    //check query runs correctly

    if (mysqli_num_rows($ShowResult) == 1) {

      $query = "UPDATE job_vacancy
                      SET job_title = '$title',company = '$company',job_description = '$description',job_type = '$jobtype', job_location = '$location'
                      WHERE job_id = '$jobid'";

      $result = $con->query($query);
      echo $result;
      if ($result) {
        // echo '<script type="text/javascript">
        //       window.onload = function () {alert("Successfully Updated"); }
        // </script>';
        $successMessage = "Successfully Updated";
      } else {
        echo mysqli_error($con);
      }
    } else {
      echo '<script type="text/javascript">
                       window.onload = function () {alert("Update Error Cannot Updated... Try Again"); }
                </script>';
    }
  }
}

function input_varify($data)
{
  //Remove empty space from user input
  $data = trim($data);
  //Remove back slash from user input
  $data = stripslashes($data);
  //conver special chars to html entities
  $data = htmlspecialchars($data);

  return $data;
}
?>
<?php if (isset($successMessage)) : ?>
  <script type="text/javascript">
    window.onload = function() {
      alert("<?php echo $successMessage; ?>");
      // Redirect to dashboard.php after showing the message
      window.location.href = "dashboard.php";
    }
  </script>
<?php endif; ?>