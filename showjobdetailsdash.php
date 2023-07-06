<?php
//To Handle Session Variables on This Page
session_start();
//Including Database Connection From config.php file to avoid rewriting in all files
require_once("./config/config.php");
?>
<?php

if (isset($_GET['id'])) {

  $id = $_GET['id'];

  $sql = "SELECT * FROM job_vacancy WHERE job_id = '$id'";
  $result = $con->query($sql);
  $row = $result->fetch_assoc();

  $title = $row['job_title'];
  $company = $row['company'];
  $jobtype = $row['job_type'];
  $location = $row['job_location'];
  $description = $row['job_description'];
}
?>

<!DOCTYPE html>
<html>

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
  <h1 class="h2">Update Job</h1>

  <form id="login" class="form-box" action="update_jobnew.php?id=<?php echo $id; ?>" method="POST">
    <div class="hero">
      <label for="title">Title</label>
      <input type="text" name="title" id="title" class="text_title" value="<?php echo $title; ?>">
    </div>

    <div class="hero">
      <label for="company">Company</label>
      <input type="text" name="company" id="company" class="text_title" value="<?php echo $company; ?>">
    </div>

    <label for="category">Job type</label>
    <select class="hero" name="category">
      <option value="full-time" <?php if ($jobtype == 'full-time') echo 'selected'; ?>>Full time</option>
      <option value="part-time" <?php if ($jobtype == 'part-time') echo 'selected'; ?>>Part time</option>
      <option value="internship" <?php if ($jobtype == 'internship') echo 'selected'; ?>>Internship</option>
    </select>

    <div class="hero">
      <label for="location">Location</label>
      <input type="text" name="location" id="location" class="text_title" value="<?php echo $location; ?>">
    </div>

    <div class="hero">
      <label for="description">Description</label>
      <textarea name="description" id="description" class="text_area" rows="15"><?php echo $description; ?></textarea>
    </div>

    <a class="update" href="update_jobnew.php?id=<?= $id ?>"><button type="submit" name="update">update</button></a>
  </form>
</body>

</html>