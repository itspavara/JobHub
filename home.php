<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./src/styles/home.css" />

  <!--Fontawsomr icons-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>JobHub</title>
</head>

<?php require_once("./header.php") ?>

<body>
  <div class="hero">
    <div>
      <h1 class="header-title">
        Easy to looking for job Career with JobHub
      </h1>
      <p class="hero-disc"><span>JobHub</span> is job search with a talent passionate all people can connect with several company in the SriLanka.One of advantage to use this website you can
        <span>easy & quickly </span> to find a match job
      </p>
    </div>
    <!-- search bar -->
    <form action="findjob.php" method="get">
      <div class="search-wrapper">
        <div class="search">
          <div class="search-bar">
            <input type="text" placeholder="   Search Jobs,Keyword,Company,State..." class="search-input" name="search" />
            <select class="category" name="category">
              <option value="full-time">Full Time</option>
              <option value="part-time">Part Time</option>
              <option value="internship">Internship</option>
            </select>
            <button class="btn btn-search" type="submit">Search</button>
          </div>

        </div>
      </div>
    </form>
  </div>

  <div class="body">
    <div class="recent-job">
      <h1>Most Recent Jobs</h1>

      <?php

      $sql = "SELECT company,job_title,job_type FROM  job_vacancy LIMIT 4";
      $result = $con->query($sql);

      if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

      ?>
          <div class="job-tag">
            <h3><?php echo $row['company'] ?></h3>
            <h3><?php echo $row['job_title'] ?></h3>
            <h4><?php echo $row['job_type'] ?></h4>
            <a class="viewjob" href="/JobHub/viewjob.php"><i class="fa-solid fa-circle-chevron-right fa-lg"></i></a>
          </div>
      <?php
        }
      } else {
        echo "Job post not Found";
      }
      ?>



      <a href="/Jobhub/findjob.php" class="btn btn-seemore">see More</a>
    </div>
  </div>

  <!-- testamonial -->
  <section class="testamonial">

    <h1>Testamonial</h1>

    <div class="carousel">
      <div class="carousel-slide">
        <div class="carousel-item">
          <h2>Slide 1</h2>
          <p>Content for slide 1</p>
        </div>
        <div class="carousel-item">
          <h2>Slide 2</h2>
          <p>Content for slide 2</p>
        </div>
        <div class="carousel-item">
          <h2>Slide 3</h2>
          <p>Content for slide 3</p>
        </div>
        <div class="carousel-item">
          <h2>Slide 4</h2>
          <p>Content for slide 4</p>
        </div>
        <div class="carousel-item">
          <h2>Slide 5</h2>
          <p>Content for slide 5</p>
        </div>
        <div class="carousel-item">
          <h2>Slide 6</h2>
          <p>Content for slide 6</p>
        </div>
      </div>
      <button class="carousel-prev"><i class="fa-solid fa-arrow-left fa-xl"></i></button>
      <button class="carousel-next"><i class="fa-solid fa-arrow-right fa-xl"></i></button>
    </div>

  </section>


  <section class="about-box">
    <div class="about-disc">
      <h1>About us</h1>
      <p>If you're looking for a job, our online job portal is the perfect place to start your search. We have a wide variety of jobs to choose from, our job search tools are easy to use, and we offer a variety of features to help you stand out from the competition. We are also committed to helping you find a job, so don't hesitate to contact our team of career coaches if you need help with your job search. </p>
    </div>

    <div class="grid-container">
      <div class="vision">
        <h2>Vision</h2>
        <p>Our vision for the job portal is to connect job seekers with their ideal career opportunities and empower employers to find the perfect candidates. We aim to be the go-to platform for job search, providing a seamless and user-friendly experience for both job seekers and employers.</p>
      </div>

      <div class="mission">
        <h2>Mission</h2>
        <p>Our mission is to revolutionize the job search process by creating a dynamic and inclusive platform that empowers individuals to find meaningful employment opportunities and supports employers in discovering top talent.</p>
      </div>

    </div>

    <div class="team">
      <h1>Team</h1>

      <img src="" alt="">
    </div>
  </section>

  <script src="/JobHub/src/js/home.js"></script>
</body>

<?php require_once("./footer.php") ?>

</html>