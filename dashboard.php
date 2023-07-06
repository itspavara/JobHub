<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./src/styles/dashboard.css">
    <link rel="stylesheet" href="./src/styles/header.css">
    <link rel="stylesheet" href="./src/styles/footer.css">
</head>
<?php require_once("./header.php") ?>

<body>
    <div style="height:70px;"></div>
    <?php
    if (isset($_SESSION['User_ID'])) {
        echo '<div class="containerr">
                            <div class="sidebar">
                                <div class="navigation">
                                    <label id="leb">Dashboard</label>
                                    <a href="profile.php" class="nav-link">Profile</a>
                                    <a href="upload_cv.php" class="nav-link">Upload CV</a>
                                    <a href="applied_jobs.php" class="nav-link">Applied Jobs</a>
                                    <a href="saved_jobs.php" class="nav-link">Save Jobs</a>
                                    <a href="post_job.php" class="nav-link">Post Job</a>
                                    <a href="manage_jobs.php" class="nav-link">Manage Posted Jobs</a>
                                </div>
                            </div>
                                <div class="main-content" id="content">
                                    <h1 class="h1"> Welcome to the Job Hub </h1>
                                    <div class="dash"></div>
                                    
                                </div>
                            </div>';
        require_once("./footer.php");
    } else {
        header("Location: sign_up.php");
    } ?>



    <script src="./src/js/dashboard.js"></script>
</body>
<?php require_once("./footer.php") ?>

</html>