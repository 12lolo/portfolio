<?php
session_start(); // Start the session

// Generate a CSRF token if it doesn't exist
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

include 'includes/config.php';
echo "Raw SMTP_PASS: " . getenv('SMTP_PASS') . "\n";
// Display the SMTP password check result
echo "<pre>";
echo "SMTP Password: " . htmlspecialchars($config['smtp_pass']) . "\n";
echo "</pre>";

echo "<pre>";
print_r($_SERVER);
echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta charset="UTF-8">
  <title>Senne Visser</title>
  <link rel="icon" type="image/x-icon" href="images/favicon.png">
  <meta name="description" content="Web designer and front-end developer">
  <link href='https://fonts.googleapis.com/css?family=Raleway:100,200,400,600' rel='stylesheet' type='text/css'>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.7.4/jquery.fullPage.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'><link rel="stylesheet" href="main.css">

</head>
<body>

  <!-- navbar header -->
<!--  <div class="nav-header">-->
<!--      <div class="logo logo.home"></div>-->
<!---->
<!--      <button class="hamburger">-->
<!--          <div class="bar"></div>-->
<!--      </button>-->
<!--      <nav>-->
<!--          <ul>-->
<!--              <li data-menuanchor="fourthPage"><a href="#contact">CONTACT</a></li>-->
<!--              <li data-menuanchor="thirdPage"><a href="#portfolio">PORTFOLIO</a></li>-->
<!--              <li data-menuanchor="secondPage"><a href="#about">ABOUT</a></li>-->
<!--          </ul>-->
<!--      </nav>-->
<!--  </div>-->
  <!-- end navbar header -->

  <!-- begin fullpage -->
  <div id="fullpage">

    <!-- begin section -->
    <div class="section aboutme" data-anchor="aboutme">
      <div class="opaque-bg animated fadeInDown">

        <h1 style="color:white">SENNE<span style="color:#FF6363">/</span>VISSER</h1>
        <p><span id="holder"></span><span class="blinking-cursor">|</span></p>
      </div>
      <i id="moveDown" class="fa fa-chevron-down fa-3x bounce"></i>
    </div>
    <!-- end section -->

    <!-- begin section -->
    <div class="section" data-anchor="skills">
      <div class="content">
        <h1 class="wow fadeInDown" data-wow-delay="0.2s">ABOUT ME</h1>
        <p class="wow fadeInDown" data-wow-delay="0.2s">Hi, I'm Senne Visser! I'm a Web Designer & Front-end Developer focused on creating clean, responsive web designs!</p>

        <div class=" wow fadeInUp container-skillbar" data-wow-delay="0.2s">
          <div class="skillbar clearfix " data-percent="90%">

            <div class="skillbar-title"
                 style="background: #DD1E2F;">
                <span>HTML5</span>
            </div>
            <div class="skillbar-bar"
                 style="background: #DD1E2F;">
            </div>

            <div class="skill-bar-percent">90%</div>
          </div> <!-- End Skill Bar -->

          <div class="skillbar clearfix" data-percent="80%">

            <div class="skillbar-title"
                 style="background: #06A2CB;">
                <span>CSS3</span>
            </div>
            <div class="skillbar-bar"
                 style="background: #06A2CB;">
            </div>

            <div class="skill-bar-percent">80%</div>
          </div>

          <div class="skillbar clearfix " data-percent="75%">

            <div class="skillbar-title"
                 style="background: #218559;">
                <span>scss</span>
            </div>
            <div class="skillbar-bar"
                 style="background: #218559;">
            </div>

            <div class="skill-bar-percent">75%</div>
          </div>

          <div class="skillbar clearfix " data-percent="45%">

            <div class="skillbar-title"
                 style="background: #6840D4;">
                <span>PHP</span>
            </div>
            <div class="skillbar-bar"
                 style="background: #6840D4;">
            </div>

            <div class="skill-bar-percent">45%</div>
          </div>

          <div class="skillbar clearfix " data-percent="30%">

            <div class="skillbar-title"
                 style="background: #EBB035;">
                <span>Javascript</span>
            </div>
            <div class="skillbar-bar"
                 style="background: #EBB035;">
            </div>

            <div class="skill-bar-percent">30%</div>
          </div>

          <div class="skillbar clearfix " data-percent="20%">

            <div class="skillbar-title"
                 style="background: #AB4DD2;">
                <span>SQL</span>
            </div>
            <div class="skillbar-bar"
                 style="background: #AB4DD2;">
            </div>

            <div class="skill-bar-percent">20%</div>
          </div>
        </div>
      </div>
    </div>
    <!-- end section -->

    <!-- begin section -->
    <div class="section" data-anchor="projects">
      <div class="content-slide">
        <div class="slide">
          <h1 class="wow fadeInDown" data-wow-delay="0.2s">XFAIRE</h1>
          <p class="wow fadeInDown" data-wow-delay="0.2s">Digital streaming service</p>
          <img class="wow fadeInUp" data-wow-delay="0.2s" data-src="https://s3-us-west-2.amazonaws.com/bradengelhardt/assets/xfaire.jpg">
        </div>
        <div class="slide">
          <h1>MACHETE ENERGY</h1>
          <p>Energy drink website</p>
          <img data-src="https://s3-us-west-2.amazonaws.com/bradengelhardt/assets/machete.jpg">
        </div>
        <div class="slide">
          <h1>PORTFOLIO</h1>
          <p>Mockup of a personal portfolio I was working on for a friend.</p>
          <img data-src="https://s3-us-west-2.amazonaws.com/bradengelhardt/assets/cascioportfolio.jpg">
        </div>
        <div class="slide">
          <h1>THATONEBLOG</h1>
          <p>Minimalist blogging platform.</p>
          <img data-src="https://s3-us-west-2.amazonaws.com/bradengelhardt/assets/blog.jpg">
        </div>
        <div class="slide">
          <h1>PIXBORED</h1>
          <p>Website for sharing images and gifs.</p>
          <img data-src="https://s3-us-west-2.amazonaws.com/bradengelhardt/assets/pixbored.jpg">
        </div>
        <div class="slide">
          <h1>PERSONAL WEBSITE</h1>
          <p>Responsive vertical/horizontal header website theme.</p>
          <img data-src="https://s3-us-west-2.amazonaws.com/bradengelhardt/assets/personalsite.jpg">
        </div>
      </div>
    </div>
    <!-- end section -->

    <!-- begin section -->
      <section class="section" data-anchor="contact" aria-labelledby="contact-heading">
          <div class="content wow fadeInDown" data-wow-delay="0.2s">
              <h1 id="contact-heading">CONTACT ME</h1>
              <p>Whether you're interested in working with me or just want to say hello, I'd love to hear from you!</p>

              <div class="contact-form">
                  <!-- Form Messages -->
                  <div id="form-messages" role="alert" aria-live="polite"></div>

                  <!-- Contact Form -->
                  <form
                          id="ajax-contact"
                          method="post"
                          action="../includes/mailer.php"
                          autocomplete="off"
                  >
                      <!-- CSRF Token -->
                      <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">

                      <!-- Name Field -->
                      <div class="wow fadeInLeft" data-wow-delay="0.6s">
                          <label for="name" class="visually-hidden">Name</label>
                          <input
                                  type="text"
                                  class="form-control"
                                  id="name"
                                  name="name"
                                  placeholder="NAME"
                                  minlength="2"
                                  maxlength="50"
                                  required
                          >
                          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                      </div>

                      <!-- Email Field -->
                      <div class="wow fadeInRight" data-wow-delay="0.8s">
                          <label for="email" class="visually-hidden">Email</label>
                          <input
                                  type="email"
                                  class="form-control"
                                  id="email"
                                  name="email"
                                  placeholder="EMAIL"
                                  required
                          >
                          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                      </div>

                      <!-- Message Field -->
                      <div class="wow fadeInLeft" data-wow-delay="1s">
                          <label for="message" class="visually-hidden">Message</label>
                          <textarea
                                  class="form-control"
                                  id="message"
                                  name="message"
                                  placeholder="MESSAGE"
                                  minlength="10"
                                  maxlength="1000"
                                  required
                          ></textarea>
                          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                      </div>

                      <!-- Honeypot -->
                      <div class="honeypot" aria-hidden="true">
                          <input
                                  type="text"
                                  name="human"
                                  id="human"
                                  tabindex="-1"
                                  autocomplete="off"
                          >
                      </div>

                      <!-- Submit Button -->
                      <div class="wow fadeInUp" data-wow-delay="1s">
                          <button
                                  type="submit"
                                  id="submit"
                                  name="submit"
                                  class="btn btn-lg"
                                  aria-label="Send message"
                          >
                              <span class="button-text">SEND MESSAGE</span>
                          </button>
                      </div>
                  </form>
              </div>
          </div>
      </section>
    <!-- end section -->

    <!-- begin section -->
    <div class="section fp-auto-height">
      <div class="footer">
        <p>CONNECT WITH ME</p>
        <nav>
          <span><a href="https://www.linkedin.com/in/senne-visser-8a504b329/?locale=nl_NL" target="_blank"><i class="fa fa-linkedin fa-2x"></i></a></span>
          <span><a href="https://wa.me/310616219191" target="_blank"><i class="fa fa-whatsapp fa-2x"></i></a></span>
          <span><a href="https://github.com/12lolo" target="_blank"><i class="fa fa-github fa-2x"></i></a></span>
          <span><a href="https://codepen.io/12lolo/pens/public"><i class="fa fa-codepen fa-2x"></i></a></span>
        </nav>
      </div>
    </div>
    <!-- end section -->

  </div>
  <!-- end fullpage -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.7.4/jquery.fullPage.min.js'></script>
  <script src="js/MobileNav.js"></script>
  <script src="js/script.js"></script>
  <script src="js/contact.js"></script>

</body>
</html>