<?php

    // Define variables
    $nameErr = $emailErr = $messageErr = "";
    $name = $email = $message = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = sanitize($_POST["name"]);
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                $nameErr = "Letters and spaces only";
            }
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = sanitize($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "A valid email is required";
            }
        }

        if (empty($_POST["message"])) {
            $messageErr = "A message is required";
        } else {
            $message = sanitize($_POST["message"]);
        }


        $to = "liammca1987@gmail.com"; // Address to send email to
        $subject = "Website Enquiry (www.liammcallister.co.uk)"; // Subject of email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: ' . $email . "\r\n"; // From field

        // Body of email
        $body ="
        <html>
            <body>
                <p><strong>Name: </strong></p>
                <p>$name</p>
                <br />
                <p><strong>Email: </strong></p>
                <p>$email</p>
                <br />
                <p><strong>Message: </strong></p>
                <p>$message</p>
            </body>
        </html>
        ";

        mail($to, $subject, $body, $headers);
    }

    // Sanitize the values
    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data, ENT_QUOTES);
        return $data;
    }
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->

<head>
    <!--METADATA-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Freelance Website Designer & Developer | Liam McAllister</title>
    <meta name="author" content="Liam McAllister">
    <meta name="keywords" content="" />
    <meta name="description" content="Web Design Belfast | Liam McAllister">
    <!--DEPENDENCIES-->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <!--STYLESHEETS-->
    <link rel="stylesheet" href="styles/css/styles.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg fixed-top">
        <span class="navbar-brand d-flex align-items-center"><img class="icon-sm" src="images/icons/code.svg"
                alt="">lmc</span>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
            aria-expanded="false" aria-label="Toggle navigation" type="button">
            <span>
                <img class="icon-sm" src="images/icons/menu.svg" alt="">
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto text-center">
                <li class="nav-item"><a href="#services" class="nav-link">Services</a></li>
                <li class="nav-item"><a href="#portfolio" class="nav-link">Portfolio</a></li>
                <li class="nav-item"><a href="#skills" class="nav-link">Skills</a></li>
                <li class="nav-item"><a href="#contact" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </nav>

    <div id="scroll-to" class="nav-height-section"></div>

    <div class="intro">
        <div class="container-fluid text-center">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-7 mb-5">
                    <img class="mb-4" src="images/logos/me.svg" alt="">
                    <h1 class="mb-3">Website Designer and Developer</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non reprehenderit magni excepturi
                        cupiditate voluptatem quidem temporibus enim quibusdam saepe quo libero, magnam accusantium
                        nesciunt laudantium similique, nostrum quia autem alias.</p>
                    <a href="#services">
                        <img class="icon bounce" src="images/icons/down.svg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="services" id="services">
        <div class="container-fluid">
            <div class="row py-5">
                <div class="col-sm-12 col-md-6 col-xl-3 d-flex justify-content-center">
                    <div class="card mb-5 mb-xl-0 text-center">
                        <div class="card-body">
                            <h5 class="card-title">Web Design</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-xl-3 d-flex justify-content-center">
                    <div class="card mb-5 mb-xl-0 text-center">
                        <div class="card-body">
                            <h5 class="card-title">Web Development</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-xl-3 d-flex justify-content-center">
                    <div class="card mb-5 mb-md-0 text-center">
                        <div class="card-body">
                            <h5 class="card-title">Responsive Sites</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-xl-3 d-flex justify-content-center">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">SEO</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="portfolio" id="portfolio">
        <div class="container-fluid px-4">
            <div class="row py-5 justify-content-center align-items-center text-center text-md-left">
                <div class="col-md-4 col-lg-3 pb-4 pb-md-0 d-flex justify-content-center">
                    <img src="images/screenshots/coffee-screen.png" alt="">
                </div>
                <div class="col-md-6 col-xl-4">
                    <h3>Coffee Shop</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita officiis porro omnis illo esse
                        dolore voluptates cumque voluptate laboriosam velit, animi officia accusantium laborum eligendi,
                        ratione aperiam perferendis quos est.</p>
                    <a href="https://liam-mcallister.github.io/coffee-shop-site/" target="_blank" class="btn">Live
                        Site</a>
                </div>
            </div>

            <div class="row py-5 justify-content-center align-items-center text-center text-md-left">
                <div class="col-md-4 col-lg-3 pb-4 pb-md-0 d-flex justify-content-center">
                    <img src="images/screenshots/storage-screen.png" alt="">
                </div>
                <div class="col-md-6 col-xl-4">
                    <h3>Self Storage</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita officiis porro omnis illo esse
                        dolore voluptates cumque voluptate laboriosam velit, animi officia accusantium laborum eligendi,
                        ratione aperiam perferendis quos est.</p>
                    <a href="https://liam-mcallister.github.io/storage-theme/" target="_blank" class="btn">Live Site</a>
                </div>
            </div>

            <div class="row py-5 justify-content-center align-items-center text-center text-md-left">
                <div class="col-md-4 col-lg-3 pb-4 pb-md-0 d-flex justify-content-center">
                    <img src="images/screenshots/blackcab-screen.png" alt="">
                </div>
                <div class="col-md-6 col-xl-4">
                    <h3>Blackcab Tours</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita officiis porro omnis illo esse
                        dolore voluptates cumque voluptate laboriosam velit, animi officia accusantium laborum eligendi,
                        ratione aperiam perferendis quos est.</p>
                    <a href="https://liam-mcallister.github.io/blackcab-site/" target="_blank" class="btn">Live Site</a>
                </div>
            </div>
        </div>
    </div>

    <div class="skills" id="skills">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                </div>
            </div>
        </div>
    </div>

    <div class="contact" id="contact">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-md-6 p-4 px-md-0 m-auto">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Name:</label>
                                <input type="text" name="name" class="form-control" id="name" required />
                                <span class="error"><?php echo $nameErr;?></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email:</label>
                                <input type="email" name="email" class="form-control" id="email" required />
                                <span class="error"><?php echo $emailErr;?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message">Message:</label>
                            <textarea type="text" name="message" class="form-control" id="message" rows="10"
                                required></textarea>
                                <span class="error"><?php echo $messageErr;?></span>
                        </div>
                        <div class="row">
                            <div class="col mb-3 d-flex justify-content-center">
                                <div class="g-recaptcha" data-sitekey="6Lff1r4ZAAAAADVjX_wKT3KefqJ4UHRZLjzokj-t"></div>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col">
                                <button type="submit" name="submit" class="btn btn-lg">Send
                                    <img id="spinner" class="icon-sm spinner" src="images/icons/spinner.gif" alt="">
                                </button>
                            </div>
                        </div>
                    </form>
                    <div id="success-msg" class="success-msg">
                        <img class="mb-5 icon" src="images/icons/tick.svg" alt="">
                        <p>Thank you for your enquiry. We will be in touch shortly.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container-fluid">
            <div class="row py-3">
                <div class="col-12 text-center">
                    <small>&copy; 2020 Liam McAllister</small>
                </div>
            </div>
        </div>
    </footer>


    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please upgrade your browser to improve your experience.</p>
        <![endif]-->

    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/popper.js/dist/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="scripts/app.js"></script>
</body>

</html>