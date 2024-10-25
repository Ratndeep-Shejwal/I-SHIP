<?php
session_start();
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>AtoZ International Shipping</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicon icon -->
  <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <!-- Custom Styling -->

  <style>
    .login-button a {
      color: white;
      font-size: 20px;
    }
  </style>

</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <!-- Can add logo here if we want -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">AtoZ International Shipping</h1> <span></span>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="#about">About US</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#testimonials">Testimonials</a></li>
          <li><a href="#contact">Contact Us</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      <!-- TODO : Change to login after all changes -->

      <?php
      if (isset($_SESSION['user'])) {
        echo "<button class='btn btn-warning login-button'>";
        echo "<a href='./admin/'>Dashboard</a>";
        echo "</button>";
        echo "<button class='btn btn-warning login-button'>";
        echo "<a href='./customer/logout.php'>Logout</a>";
        echo "</button>";
      } else {
        echo "<button class='btn btn-warning login-button'>";
        echo "<a href='./customer/login.php'>Login</a>";
        echo "</button>";
      }
      ?>




    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <div class="info d-flex align-items-center">
        <div class="container">
          <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-6 text-center">
              <h2>Welcome to <br> AtoZ International Shipping</h2>
              <p>Dedicated to providing reliable and efficient cargo shipping solutions tailored to meet your needs.
                With years of experience and a commitment to excellence.</p>
              <a href="#contact" class="btn-get-started">Get Started</a>
            </div>
          </div>
        </div>
      </div>

      <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">

        <!-- <div class="carousel-item">
          <img src="assets/img/hero-carousel/cta-bg.jpg" alt="image">
        </div>

        <div class="carousel-item">
          <img src="assets/img/hero-carousel/hero-carousel-1.jpg" alt="">
        </div> -->

        <div class="carousel-item active">
          <video class="d-block w-100" autoplay loop muted>
            <source src="assets/videos/video.mp4" type="video/mp4">
            Your browser does not support the video tag.
          </video>
        </div>

        <!-- <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a> -->

      </div>

    </section><!-- /Hero Section -->


    <!-- [ HERO section ] ended -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row position-relative">

          <div class="col-lg-7 about-img" data-aos="zoom-out" data-aos-delay="200"><img src="assets/img/about.jpg">
          </div>

          <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
            <h2 class="inner-title">AtoZ <br> International Shipping</h2>
            <div class="our-story">
              <h4>Est 2018</h4>
              <h3>About US</h3>
              <p>At AtoZ International Shipping, we pride ourselves on delivering top-notch cargo shipping services
                tailored to meet
                the diverse needs of our clients. With a strong foundation built on years of experience and a commitment
                to excellence.</p>
              <ul>
                <li><i class="bi bi-check-circle"></i> <span>Reliable Service</span></li>
                <li><i class="bi bi-check-circle"></i> <span>Global Reach</span></li>
                <li><i class="bi bi-check-circle"></i> <span>Customer Focused</span></li>
              </ul>
              <p>Choose AtoZ Shipping for your cargo shipping needs, and experience the difference that dedication and
                expertise make.</p>
              <!-- Can add Video Link if want -->
              <!-- 
              <div class="watch-video d-flex align-items-center position-relative">
                <i class="bi bi-play-circle"></i>
                <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox stretched-link">Watch Video</a>
              </div> -->
            </div>
          </div>

        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Stats Counter Section -->
    <section id="stats-counter" class="stats-counter section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Our Achievements</h2>
        <p>Key Performance Indicators Highlighting Our Success and Reliability.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-emoji-smile color-blue flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                  class="purecounter"></span>
                <p>Happy Clients</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-journal-richtext color-orange flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="17" data-purecounter-duration="1"
                  class="purecounter"></span>
                <p>Countries Supported</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-headset color-green flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="5000" data-purecounter-duration="1"
                  class="purecounter"></span>
                <p>Cars Delivered</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-people color-pink flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="13" data-purecounter-duration="1"
                  class="purecounter"></span>
                <p>Hard Workers</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </section><!-- /Stats Counter Section -->

    <!-- Services Section -->
    <section id="services" class="services section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Services</h2>
        <p>Comprehensive Solutions for Your Shipping Needs.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item  position-relative">
              <div class="icon">
                <i class="fa-solid fa-ship"></i>
              </div>
              <h3>Ocean Freight</h3>
              <p>Efficient and cost-effective ocean freight solutions, ensuring your cargo reaches its destination
                safely and on time, no matter the size or complexity.</p>
              <!-- <a href="#" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a> -->
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fa-solid fa-plane-departure"></i>
              </div>
              <h3>Air Freight</h3>
              <p>Fast and reliable air freight services for time-sensitive shipments, providing global reach with
                exceptional care and handling.</p>
              <!-- <a href="#" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a> -->
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fa-solid fa-file-signature"></i>
              </div>
              <h3>Customs Clearance</h3>
              <p>Expert customs clearance services to navigate complex regulations, ensuring your cargo moves smoothly
                across borders without delays.</p>
              <!-- <a href="#" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a> -->
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fa-solid fa-warehouse"></i>
              </div>
              <h3>Warehousing and Distribution</h3>
              <p>Secure warehousing and distribution services, offering storage, inventory management, and timely
                distribution to meet your business needs.</p>
              <!-- <a href="#" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a> -->
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fa-solid fa-hard-hat"></i>
              </div>
              <h3>Project Cargo Logistics</h3>
              <p>Specialized project cargo logistics for oversized and heavy shipments, delivering tailored solutions
                for complex logistics challenges.</p>
              <!-- <a href="#" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a> -->
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fa-solid fa-shipping-fast"></i>
              </div>
              <h3>Express Courier Services</h3>
              <p>Swift and dependable express courier services for urgent deliveries, guaranteeing prompt and secure
                shipment of your parcels worldwide.</p>
              <!-- <a href="#" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a> -->
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Services Section -->

    <!-- Features Section -->
    <section id="features" class="features section">

      <div class="container">

        <ul class="nav nav-tabs row  g-2 d-flex" data-aos="fade-up" data-aos-delay="100" role="tablist">

          <li class="nav-item col-3" role="presentation">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1" aria-selected="true"
              role="tab">
              <h4>Network</h4>
            </a>
          </li><!-- End tab nav item -->

          <li class="nav-item col-3" role="presentation">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2" aria-selected="false"
              tabindex="-1" role="tab">
              <h4>Tracking</h4>
            </a><!-- End tab nav item -->

          </li>
          <li class="nav-item col-3" role="presentation">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3" aria-selected="false"
              tabindex="-1" role="tab">
              <h4>Solutions</h4>
            </a>
          </li><!-- End tab nav item -->

          <li class="nav-item col-3" role="presentation">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-4" aria-selected="false"
              tabindex="-1" role="tab">
              <h4>Compliance</h4>
            </a>
          </li><!-- End tab nav item -->

        </ul>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

          <div class="tab-pane fade active show" id="features-tab-1" role="tabpanel">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                <h3>Global Logistics Network</h3>
                <p class="fst-italic">
                  Offers comprehensive coverage to over 150 countries, ensuring connectivity to key global markets.
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i> <span>Reach major ports and destinations globally, facilitating
                      efficient and timely deliveries.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Seamlessly coordinate multimodal transportation to optimize
                      routes and reduce transit times.</span></li>
                  <!-- <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</span></li> -->
                </ul>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="assets/img/features-1.jpg" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End tab content item -->

          <div class="tab-pane fade" id="features-tab-2" role="tabpanel">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                <h3>Advanced Tracking and Transparency</h3>
                <p class="fst-italic">
                  Offers real-time updates on shipment status, including location, temperature monitoring for
                  perishables, and estimated delivery times.
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i> <span>Customers can track their cargo 24/7, enhancing visibility
                      and control over shipments.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Automated notifications for milestones like departure,
                      arrival, and customs clearance, ensuring proactive management.</span></li>
                  <!-- <li><i class="bi bi-check2-all"></i> <span>Provident mollitia neque rerum asperiores dolores quos qui a. Ipsum neque dolor voluptate nisi sed.</span></li> -->
                  <!-- <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</span></li> -->
                </ul>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="assets/img/features-2.jpg" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End tab content item -->

          <div class="tab-pane fade" id="features-tab-3" role="tabpanel">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                <h3>Customized Shipping Solutions</h3>
                <p class="fst-italic">
                  Tailors shipping solutions based on cargo type, volume, urgency, and specific customer requirements.
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i> <span>Dedicated account managers provide tailored advice and
                      solutions, ensuring individualized customer support.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Range of shipping modes available, from standard sea
                      freight to expedited air cargo, to meet diverse shipping needs.</span></li>
                  <!-- <li><i class="bi bi-check2-all"></i> <span>Provident mollitia neque rerum asperiores dolores quos qui a. Ipsum neque dolor voluptate nisi sed.</span></li> -->
                </ul>

              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="assets/img/features-3.jpg" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End tab content item -->

          <div class="tab-pane fade" id="features-tab-4" role="tabpanel">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                <h3>Expertise in Compliance</h3>
                <p class="fst-italic">
                  Ensures adherence to international trade regulations, customs requirements, and safety standards.
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i> <span>Expertise in navigating complex customs procedures and
                      regulatory compliance across global markets.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Streamlined documentation processes to minimize delays and
                      ensure smooth transit through customs checkpoints.</span></li>
                  <!-- <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</span></li> -->
                </ul>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="assets/img/features-4.jpg" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End tab content item -->

        </div>

      </div>

    </section><!-- /Features Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Testimonials</h2>
        <p>Hear from businesses and individuals who trust us with their cargo shipping needs.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 40
                },
                "1200": {
                  "slidesPerView": 2,
                  "spaceBetween": 20
                }
              }
            }
          </script>
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                  <h3>Saul Goodman</h3>
                  <h4>Ceo &amp; Founder</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                      class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    <span>Fantastic car shipping service! My vehicle arrived on time and in perfect condition. Highly
                      professional and reliable. Would definitely use them again!</span>
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                  <h3>Sara Wilsson</h3>
                  <h4>Designer</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                      class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    <span>Outstanding experience! The car shipping company exceeded my expectations with their prompt
                      and secure delivery. Excellent customer service throughout the process.</span>
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                  <h3>Jena Karlis</h3>
                  <h4>Store Owner</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                      class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    <span>Highly recommend this car shipping company! They handled everything smoothly, kept me updated,
                      and delivered my car without any issues. Great service!</span>
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                  <h3>Matt Brandon</h3>
                  <h4>Freelancer</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                      class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    <span>Impressed with the efficiency and professionalism of this car shipping service. My car arrived
                      safely and on schedule. Very satisfied with their work!</span>
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                  <h3>John Larson</h3>
                  <h4>Entrepreneur</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                      class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    <span>Exceptional service from start to finish! The car shipping company ensured my vehicle was
                      transported safely and timely. Communication was clear and helpful. Definitely recommend!</span>
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Testimonials Section -->


    <!-- Contact Section -->
    <section id="contact" class="contact section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact US</h2>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">

          <div class="col-lg-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up"
              data-aos-delay="200">
              <i class="bi bi-geo-alt"></i>
              <h3>Address</h3>
              <p>7310 Ardmore St, Houston, TX 77054</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up"
              data-aos-delay="300">
              <i class="bi bi-telephone"></i>
              <h3>Call Us</h3>
              <p>+1 (832) 888-3474</p>
              <p>+1 (832) 888-4400</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up"
              data-aos-delay="400">
              <i class="bi bi-envelope"></i>
              <h3>Email Us</h3>
              <p>info@atozship.net</p>
            </div>
          </div><!-- End Info Item -->

        </div>

        <div class="row gy-4 mt-1">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3466.0157088658207!2d-95.38410782538331!3d29.690324235263645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640bfe5720c8c3f%3A0x769e57c6d6de0660!2s7310%20Ardmore%20St%2C%20Houston%2C%20TX%2077054%2C%20USA!5e0!3m2!1sen!2sin!4v1722519495884!5m2!1sen!2sin"
              frameborder="0" style="border:0; width: 100%; height: 400px;" allowfullscreen="" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"></iframe>
            <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3466.0157088658207!2d-95.38410782538331!3d29.690324235263645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640bfe5720c8c3f%3A0x769e57c6d6de0660!2s7310%20Ardmore%20St%2C%20Houston%2C%20TX%2077054%2C%20USA!5e0!3m2!1sen!2sin!4v1722519495884!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>   -->
          </div><!-- End Google Maps -->

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
              data-aos-delay="400">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                  <button type="submit">Send Message</button>

                </div>

              </div>
            </form>

          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">AtoZ International Shipping</span>
          </a>
          <div class="footer-contact pt-3">
            <p>7310 Ardmore St, </p>
            <p>Houston, TX 77054</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+1 (832) 888-3474</span></p>
            <p><strong>Email:</strong> <span>info@atozshipping.us</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#about">About us</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#services">Ocean Freight</a></li>
            <li><a href="#services">Air Freight</a></li>
            <li><a href="#services">Customs Clearance</a></li>
            <li><a href="#services">Warehousing and Distribution</a></li>
            <li><a href="#services">Project Cargo Logistics</a></li>
            <li><a href="#services">Express Courier Services</a></li>
          </ul>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">AtoZ International Shipping</strong> <span>All Rights
          Reserved</span></p>
      <div class="credits">
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>