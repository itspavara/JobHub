<?php
//To Handle Session Variables on This Page
session_start();
//Including Database Connection From config.php file to avoid rewriting in all files
require_once("./config/config.php");
?>
<?php
$userid = $_SESSION['User_ID'];

if (isset($_POST['post'])) {



    //verify variables using function and assign checked values to variables
    $company = $_POST['company'];
    $title = $_POST['title'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $location = $_POST['location'];

    $query = "INSERT INTO job_vacancy (user_id, company, job_title, job_description, job_type, job_location, post_date) 
    VALUES ('$userid', '$company', '$title', '$description', '$category', '$location', 'NOW()')";

    $result = $con->query($query);

    if ($result) {
        echo '<script type="text/javascript">
                window.onload = function () {alert("Posted Successfully"); 
                    window.history.back();
                }
            </script>';
    } else {
        echo mysqli_error($con);
    }
}



?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>navbar</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./src/styles/header.css">
    <link rel="stylesheet" href="./src/styles/footer.css">
    <link rel="stylesheet" href="./src/styles/post_job.css">
</head>

<body>
    <h1 class="h2"> Post New Job</h1>
    <form id="login" class="form-box" action="post_job.php" method="POST">
        <div class="hero">
            <label for="">Title</label>
            <input type="text" name="title" id="title" class="text_title" placeholder="">
        </div>
        <div class="hero">
            <label for="">Company</label>
            <input type="text" name="company" id="company" class="text_title" placeholder="">
        </div>
        <label for="jobtype">Job type</label>
        <select class="hero" name="category">
            <option value="full-time">Full time</option>
            <option value="part-time">Part time</option>
            <option value="internship">Internship</option>
        </select>
        <div class="hero">
            <label for="">Location</label>
            <input type="text" name="location" id="location" class="text_title" placeholder="">
        </div>
        <div class="hero">
            <label for="">Description</label>
            <textarea name="description" id="description" class="text_area" rows="15"></textarea>
        </div>
        <input type="submit" class=" " name="post" value="Post">
    </form>
</body>

</html>