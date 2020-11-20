<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $name = sanitize($_POST["name"]);
        $email = sanitize($_POST["email"]);
        $message = sanitize($_POST["message"]);
        $website = $_POST["website"];
        $url = $_POST["url"];

        $to = "me@liammcallister.co.uk"; // Address to send email to
        $subject = "Website Enquiry (www.liammcallister.co.uk)"; // Subject of email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: ' . $email . "\r\n"; // From field
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
        
        if ( ! empty($website) || ! empty($url) ) {
            echo '<div style="font-family:arial;
                              padding: 50px 20px;
                              color: #2c2528;
                              text-align:center;
                              display:flex;
                              flex-direction:column;
                              align-items:center;
                 ">' . 
                    '<p style="font-weight:bold;font-size:28px;">Failed!</p> ' .
                    '<p>You are a bot.</p>' .
                '</div>';
        } else if ( empty($name) || empty($email) || empty($message) ) {
            echo '<div style="font-family:arial;
                              padding: 50px 20px;
                              color: #2c2528;
                              text-align:center;
                              display:flex;
                              flex-direction:column;
                              align-items:center;
                 ">' . 
                    '<p style="font-weight:bold;font-size:28px;">Failed!</p> ' .
                    '<p>Please complete all the fields.</p>' .
                '</div>';
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '<div style="font-family:arial;
                              padding: 50px 20px;
                              color: #2c2528;
                              text-align:center;
                              display:flex;
                              flex-direction:column;
                              align-items:center;
                 ">' . 
                    '<p style="font-weight:bold;font-size:28px;">Failed!</p> ' .
                    '<p>Please enter a valid Email.</p>' .
                '</div>'; 
          } else {
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