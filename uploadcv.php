<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Upload job</title>

  <!--Fontawsomr icons-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="./src/styles/home.css" />
  <link rel="stylesheet" href="./src/styles/uploadcv.css" />
</head>

<?php require_once("./header.php") ?>

<body>
  <div class="cv-container">
    <div class="cv-wrapper">
      <h1>Add a CV to JobHub</h1>
      <div class="btn-wrapper">
        <button class="btn btn-cv" type="submit">Upload CV</button>
      </div>
      <p>
        By continuing, you agree to create a public CV and agree to receiving
        job opportunities from employers.
      </p>
    </div>
  </div>
</body>

<?php require_once("./footer.php") ?>

</html>