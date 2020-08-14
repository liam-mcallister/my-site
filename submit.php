<?php
    if(isset($_POST['name']))
    {
        $name = trim($_POST["name"]);
        $email = trim($_POST["email"]);
        $msg = trim($_POST["message"]);
        
        if(strlen($name)<2) {
            print "<p>Please type your name.</p>";
        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            print  "<p>Please type a valid email address.</p>";
        }else if(strlen($msg)<10) {
            print "<p>Please type your message.</p>";
        }else{
            $headers =  'From: '.$email. "\r\n" .
                            'Reply-To: '.$email . "\r\n" .
                            'X-Mailer: PHP/' . phpversion();
        mail('me@mymail.me',$msg,$headers);
        print "mail succesuffully sent";
    }
}
?>