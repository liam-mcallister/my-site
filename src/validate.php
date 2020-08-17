<?php
    if(isset($_POST['submit']))
    {
        $name = trim($_POST["name"]); // Get Name value
        $email = trim($_POST["email"]); // Get Email value
        $msg = trim($_POST["message"]); // Get Message value
         
        $to = "liammca1987@gmail.com"; // Address to send email to
        $subject = "Website Enquiry (liammcallister.co.uk)"; // Subject of email
         
        // Body of email
        $message ="
        <html>
            <body>
                <table style='width:600px;'>
                    <tbody>
                        <tr>
                            <td style='width:150px'><strong>Name: </strong></td>
                            <td style='width:400px'>$name</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Email ID: </strong></td>
                            <td style='width:400px'>$email</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Message: </strong></td>
                            <td style='width:400px'>$msg</td>
                        </tr>
                    </tbody>
                </table>
            </body>
        </html>
        ";
         
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
 
        // More headers
        $headers .= 'From: Liam McAllister <liammca1987@gmail.com>' . "\r\n"; // Info in the From field
         
        if(mail($to,$subject,$message,$headers)){
            // Message if mail has been sent
            echo "Email successfully sent";
        }
 
        else{
            // Message if mail has been not sent
            echo "Email sending failed";
        }
    }
?>