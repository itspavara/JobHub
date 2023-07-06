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

      $sql = "SELECT * FROM  job_vacancy LIMIT 4";
      $result = $con->query($sql);

      if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

      ?>
          <form action="viewjobs.php" method="get">

            <div class="job-tag">
              <h3><?php echo $row['company'] ?></h3>
              <h3><?php echo $row['job_title'] ?></h3>
              <h4><?php echo $row['job_type'] ?></h4>
              <a class="viewjob" href="viewjobs.php?id=<?= $row['job_id'] ?>"><i class="fa-solid fa-circle-chevron-right fa-lg"></i></a>
            </div>
          </form>
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
          <p>"This job portal transformed my career. Within a week, I landed a perfect job that matched my skills and goals. Highly recommended!"</p>
          <h2>Senadi Dilhara</h2>
        </div>
        <div class="carousel-item">
          <p>"Thanks to this job portal, I found my dream job quickly and effortlessly. It streamlined the entire process, and I'm now employed in a role I truly enjoy."</p>
          <h2>Supipi Rangani</h2>
        </div>
        <div class="carousel-item">
          <p>"The resources and support from this job portal helped me secure a higher-paying job with better growth prospects. Highly satisfied with the results!"</p>
          <h2> Davinda Jayathilaka</h2>
        </div>
        <div class="carousel-item">
          <p>"I restarted my career successfully with this job portal. The resume builder and career advice section were invaluable. I landed a job offer that exceeded my expectations." </p>
          <h2>Mahesh Thikshana</h2>
        </div>
        <div class="carousel-item">
          <p>"This job portal was a game-changer for my freelance career. I found regular gigs and built a strong portfolio, thanks to its reliable platform."</p>
          <h2>Kapila Gunawardana</h2>
        </div>
        <div class="carousel-item">
          <p>"After relocating, I needed a job quickly. This job portal helped me find opportunities in my area. Now happily employed, thanks to their support and resources."</p>
          <h2>Vishwa Perera</h2>
        </div>
      </div>
      <button class="carousel-prev"><i class="fa-solid fa-arrow-left fa-xl"></i></button>
      <button class="carousel-next"><i class="fa-solid fa-arrow-right fa-xl"></i></button>
    </div>

  </section>



  <script src="/JobHub/src/js/home.js"></script>
</body>

<?php require_once("./footer.php") ?>

</html>