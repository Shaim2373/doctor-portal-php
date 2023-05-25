<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Doctor Portal</title>
</head>

<body>
  <!-- manu bar start     -->
  <header>
    <div class="header">
      <div class="navbar">
        <div class="logo">
          <a href="/">Doctor portal</a>
        </div>
        <nav>
          <ul>
            <li><a href="./index.php">Home</a></li>
            <li><a href="./appointment.php">Appointment</a></li>
            <li><a href="./login.php">Log in</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </header>
  <!-- manu bar end -->
  <!-- appointment start -->
  <section class="appointment">
    <div class="wrapper">
      <header>
        <p class="current-date"></p>
        <div class="icons">
          <span id="prev" class="material-symbols-rounded"><i class="fa-solid fa-angle-left"></i></span>
          <span id="next" class="material-symbols-rounded"><i class="fa-solid fa-angle-right"></i></span>
        </div>
      </header>
      <div class="calendar">
        <ul class="weeks">
          <li>Sun</li>
          <li>Mon</li>
          <li>Tue</li>
          <li>Wed</li>
          <li>Thu</li>
          <li>Fri</li>
          <li>Sat</li>
        </ul>
        <ul class="days"></ul>
      </div>
    </div>
    <div>
      <img src="img/chair.png" alt="">
    </div>
  </section>
  <!-- appointment end -->
  <!-- footer start -->
  <footer>
    <div class="footer">
      <div class="footer-col">
        <span class="footer-title">Services</span>
        <a class="link link-hover" href="/">Branding</a>
        <a class="link link-hover" href="/">Design</a>
        <a class="link link-hover" href="/">Marketing</a>
        <a class="link link-hover" href="/">Advertisement</a>
      </div>
      <div class="footer-col">
        <span class="footer-title">Company</span>
        <a class="link link-hover" href="/">About us</a>
        <a class="link link-hover" href="/">Contact</a>
        <a class="link link-hover" href="/">Jobs</a>
        <a class="link link-hover" href="/">Press kit</a>
      </div>
      <div class="footer-col">
        <span class="footer-title">Legal</span>
        <a class="link link-hover" href="/">Terms of use</a>
        <a class="link link-hover" href="/">Privacy policy</a>
        <a class="link link-hover" href="/">Cookie policy</a>
      </div>
    </div>
  </footer>
  <!-- footer end  -->

  <script src="js/index.js"></script>
</body>

</html>