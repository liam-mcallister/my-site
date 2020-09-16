<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $url = "https://www.google.com/recaptcha/api/siteverify";
        $data = array(
            "secret" => "6LeKA8wZAAAAAGuILaCRm4yAJ4B0dniIjwtU5tpM",
            "response" => $_POST["g-recaptcha-response"],
            "remoteip" => $_SERVER["REMOTE_ADDR"]
        );
        $options = array(
            "http" => array (
            "method" => 'POST',
            "header"  => 'Content-type: application/x-www-form-urlencoded',
            "content" => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $verify = file_get_contents($url, false, $context);
        $captcha_success=json_decode($verify);
        
        if ($captcha_success->success == false) {

            echo '<div style="font-family:arial;
                              padding: 50px 20px;
                              color: #2c2528;
                              text-align:center;
                              display:flex;
                              flex-direction:column;
                              align-items:center;
                 ">' . 
                    '<p style="font-weight:bold;font-size:28px;">Failed!</p> ' .
                    '<p>Go back and check the reCaptcha box.</p>' .
                '</div>';

        } else if ($captcha_success->success == true) {

            header( "refresh:5;url=https://liammcallister.co.uk/" );
            echo '<div style="font-family:arial;
                              padding: 50px 20px;
                              color: #2c2528;
                              text-align:center;
                              display:flex;
                              flex-direction:column;
                              align-items:center;
                 ">' . 
                    '<img style="width:100px;height:100px;" src="images/icons/tick.svg" alt="Tick icon" />' .
                    '<p style="font-weight:bold;font-size:28px;">Thank you for your enquiry, we will be in touch shortly.</p> ' .
                    '<p>We are re-directing you back to the homepage.</p>' .
                '</div>';

            $name = sanitize($_POST["name"]);
            $email = sanitize($_POST["email"]);
            $message = sanitize($_POST["message"]);

            $to = "me@liammcallister.co.uk"; // Address to send email to
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

            exit();
        }
    }

    // Sanitize the values
    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data, ENT_QUOTES);
        return $data;
    }
?>