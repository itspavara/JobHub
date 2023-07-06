<?php
//To Handle Session Variables on This Page
session_start();
//Including Database Connection From config.php file to avoid rewriting in all files
require_once("./config/config.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Fontawsomr icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="./src/styles/header.css">
    <link rel="stylesheet" href="./src/styles/footer.css">
    <link rel="stylesheet" href="./src/styles/applied_jobs.css">
</head>


<body>
    <h1 class="h2">Applied job</h1>
    <?php
    $userid = $_SESSION['User_ID'];


    $sql = "SELECT * FROM applied_job a, job_vacancy j WHERE a.job_id = j.Job_id AND  a.user_id = $userid";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

    ?>
            <div class="job-tag">
                <h3><?php echo $row['company'] ?></h3>
                <h3><?php echo $row['job_title'] ?></h3>
                <h4><?php echo $row['job_type'] ?></h4>

                <a class="btn btn-delete" href="applied_jobs.php?id=<?= $row['job_id'] ?>">Delete</a>
            </div>
    <?php
        }
    } else {
        echo "<h3 style='text-align: center; padding: 20px'>No Job found</h3>";
    }
    ?>
    <?php
    if (isset($_GET['id'])) {

        $job_id = $_GET['id'];
        $user_id = $_SESSION['User_ID'];

        $sql_save = "DELETE FROM applied_job WHERE job_id = '$job_id' AND user_id = '$user_id'";
        $result = $con->query($sql_save);

        if ($result) {
            $message = "Delete applied job successfully";
            goBack();
            echo "<script>
              alert('$message');
            </script>";
        } else {
            echo mysqli_error($con);
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




</body>


</html>