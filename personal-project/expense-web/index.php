<?php
include 'include/link.php';
include 'include/connection.php';
include 'include/function.php';

if (isset($_POST['submit'])) {
  $username1 = get_safe_data($connect, $_POST['username1']);
  $password1 = password_hash(get_safe_data($connect, $_POST['password1']), PASSWORD_DEFAULT);

  $res = mysqli_query($connect, "INSERT INTO users (username, password) VALUES ('$username1', '$password1')");

  if ($res) {
    echo "User registered successfully!";
  } else {
    echo "Error: ";
  }
}

if (isset($_POST['login'])) {
  $username = get_safe_data($connect, $_POST['username']);
  $password = get_safe_data($connect, $_POST['password']);

  $check = mysqli_query($connect, "SELECT * FROM users WHERE username = '$username'");

  if (mysqli_num_rows($check) > 0) {
    $row = mysqli_fetch_assoc($check);
    if (password_verify($password, $row['password'])) {
      $_SESSION['UID'] = $row['id'];
      $_SESSION['UNAME'] = $row['username'];
      header('location: dashboard.php');
    } else {
      echo "Invalid password!";
    }
  } else {
    echo "User not found!";
  }
}
?>

<!doctype html>
<html lang="en">



<body>

  <?php include 'include/header.php'; ?>

  <!-- content section start -->


  <body>

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-end align-items-center">
      <div id="heroCarousel" data-bs-interval="5000" class="container-fluid carousel carousel-fade"
        data-bs-ride="carousel">

        <div class="carousel-item active"
          style="background-image: url('./img/disp.jpg'); background-repeat: no-repeat; object-fit: cover; background-position: center;">
          <div class="carousel-container">
            <h2 class="animate__animated animate__fadeInDown">Welcome to <span>WalletWise</span></h2>
            <p class="animate__animated animate__fadeInUp">Simplify your expenses and split with ease!</p>
            <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Get Started</a>
          </div>
        </div>

      </div>

      <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
        viewBox="0 24 150 28 " preserveAspectRatio="none">
        <defs>
          <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
        </defs>
        <g class="wave1">
          <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
        </g>
        <g class="wave2">
          <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
        </g>
        <g class="wave3">
          <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
        </g>
      </svg>

    </section>
    <!-- End Hero -->

    <main id="main">

      <!-- ======= About Section ======= -->
      <section id="about" class="about">
        <div class="layer"></div>
        <div class="container">

          <div class="section-title" data-aos="zoom-out">
            <h2>Discover</h2>
            <p>WalletWise</p>
          </div>

          <div class="row content" data-aos="fade-up">
            <div class="col-lg-6  order-lg-0 order-2">
              <p>
                Welcome to WalletWise, your go-to platform for hassle-free expense management and sharing. Say
                goodbye to financial stress and hello to easy collaboration with friends, partners, and colleagues!
              </p>

              <h2 class="mt-md-0 mt-4" data-aos="zoom-out">Our Vision</h2>
              <p>Empowering Financial Control</p>

              <p>WalletWise envisions a world where managing expenses is seamless and intuitive, allowing
                individuals and groups to take charge of their financial journeys.</p>

              <h2 class="mt-md-0 mt-4" data-aos="zoom-out">Our Mission</h2>
              <p>Simplify Expense Tracking</p>

              <p>Our mission is to provide a user-friendly platform that revolutionizes expense tracking, making it
                accessible and efficient for everyone.</p>

              <a href="#" class="btn-learn-more">Get Started</a>
            </div>

            <div class="col-lg-6 pt-4 pt-lg-0">
              <img src="./img/pay.jpg" alt="" class="img-fluid">
            </div>
          </div>

        </div>
      </section><!-- End About Section -->

      <!-- ======= Features Section ======= -->
      <section id="features" class="features">
        <div class="container">
          <div class="section-title" data-aos="zoom-out">
            <h2>Key Features</h2>
            <p>Explore What We Offer</p>
          </div>
          <ul class="nav nav-tabs row d-flex">
            <li class="nav-item col-3" data-aos="zoom-in">
              <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">
                <i class="ri-gps-line"></i>
                <h4 class="d-none d-lg-block">Easy Expense Tracking</h4>
              </a>
            </li>
            <li class="nav-item col-3" data-aos="zoom-in" data-aos-delay="100">
              <a class="nav-link" data-bs-toggle="tab" href="#tab-2">
                <i class="ri-body-scan-line"></i>
                <h4 class="d-none d-lg-block">Expense Splitting</h4>
              </a>
            </li>
            <li class="nav-item col-3" data-aos="zoom-in" data-aos-delay="200">
              <a class="nav-link" data-bs-toggle="tab" href="#tab-3">
                <i class="ri-sun-line"></i>
                <h4 class="d-none d-lg-block">Real-time Notifications</h4>
              </a>
            </li>
            <li class="nav-item col-3" data-aos="zoom-in" data-aos-delay="300">
              <a class="nav-link" data-bs-toggle="tab" href="#tab-4">
                <i class="ri-store-line"></i>
                <h4 class="d-none d-lg-block">Secure Data Encryption</h4>
              </a>
            </li>
          </ul>

          <div class="tab-content" data-aos="fade-up">
            <div class="tab-pane active show" id="tab-1">
              <div class="row">
                <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                  <h3>Easy Expense Tracking</h3>
                  <p class="fst-italic">
                    Effortlessly record your expenses on-the-go and keep a clear overview of your financial
                    transactions.
                  </p>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 text-center">
                  <img src="./img/planner.jpg" alt="" class="img-fluid">
                </div>
              </div>
            </div>
            <div class="tab-pane" id="tab-2">
              <div class="row">
                <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                  <h3>Effortless Expense Splitting</h3>
                  <p class="fst-italic">
                    Seamlessly divide expenses among friends, partners, or colleagues with our intuitive splitting
                    feature.
                  </p>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 text-center">
                  <img src="assets/img/split_expenses.png" alt="" class="img-fluid">
                </div>
              </div>
            </div>
            <div class="tab-pane" id="tab-3">
              <div class="row">
                <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                  <h3>Real-time Notifications</h3>
                  <p class="fst-italic">
                    Stay informed with instant updates on shared expenses, ensuring everyone is on the same page.
                  </p>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 text-center">
                  <img src="assets/img/notifications.png" alt="" class="img-fluid">
                </div>
              </div>
            </div>
            <div class="tab-pane" id="tab-4">
              <div class="row">
                <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                  <h3>Secure Data Encryption</h3>
                  <p class="fst-italic">
                    Your financial information is protected with state-of-the-art encryption, ensuring maximum security.
                  </p>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 text-center">
                  <img src="assets/img/encryption.png" alt="" class="img-fluid">
                </div>
              </div>
            </div>
          </div>

        </div>
      </section><!-- End Features Section -->

      <!-- ======= Cta Section ======= -->
      <section id="cta" class="cta">
        <div class="container">
          <div class="row white">
            <div class="col-md-6 shadow p-4">
              <form method="POST" action="">
                <h3>Log In</h3>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">User Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="username"
                    aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" class="form-control" name="password" id="exampleInputPassword1" required>
                </div>
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck">
                  <label class="form-check-label" for="exampleCheck">Remember Me</label>
                </div>
                <button type="submit" name="login" class="btn btn-primary">Log In</button>
              </form>
            </div>

            <!-- sign up form -->

            <div class="col-md-6 shadow p-4">
              <form method="POST" action="">
                <h3>Sign Up</h3>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">User Name</label>
                  <input type="text" class="form-control" id="exampleInputusername" name="username1"
                    aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" class="form-control" name="password1" id="exampleInputPassword1" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </section><!-- End Cta Section -->

      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">
        <div class="container">
          <div class="section-title" data-aos="zoom-out">
            <h2>Contact</h2>
            <p>Contact Us</p>
          </div>
          <div class="row mt-5">
            <div class="col-lg-4" data-aos="fade-right">
              <div class="info">
                <div class="address">
                  <i class="bi bi-geo-alt"></i>
                  <h4>Location:</h4>
                  <p>North West Delhi 110086</p>
                </div>
                <div class="email">
                  <i class="bi bi-envelope"></i>
                  <h4>Email:</h4>
                  <p>dbisht044@gmail.com</p>
                </div>
                <div class="phone">
                  <i class="bi bi-phone"></i>
                  <h4>Call:</h4>
                  <p>+91 8377878861</p>
                </div>
              </div>
            </div>
            <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left">
              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="row">
                  <div class="col-md-6 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                  </div>
                  <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                  </div>
                </div>
                <div class="form-group mt-3">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                </div>
                <div class="form-group mt-3">
                  <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
              </form>
            </div>
          </div>
        </div>
      </section><!-- End Contact Section -->

    </main><!-- End #main -->


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

    <!-- Add your JavaScript and other scripts here -->

  </body>
  <?php include 'include/footer.php'; ?>

</html>