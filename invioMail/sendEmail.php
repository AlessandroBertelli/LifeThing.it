<?php
    use PHPMailer\PHPMailer\PHPMailer;

    if(isset($_POST["name"]) && isset($_POST["email"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $body = $_POST["body"];

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();

        //settaggio SMTP
        $mail -> isSMTP();
        $mail -> Host = "smtp.gmail.com";
        $mail -> SMTPAuth = true;
        $mail -> Username = "help.lifething@gmail.com";
        $mail -> Password = "SALVIBOX";
        $mail -> Port = 465;
        $mail -> SMTPSecure = "ssl";

        //settaggio email
        $mail -> isHTML(true);
        $mail -> setFrom($email, $name);
        $mail -> addAddress("help.lifething@gmail.com");
        $mail -> Subject = ("$email ($subject)");
        $mail -> Body = $body;

        if($email -> send()){
            $status = "success";
            $response = "Email inviata!";
        } else {
            $status = "failed";
            $response = "Qualcosa è andato storto: " . $mail->ErrorInfo;
        }

        exit(json_encode(array("status" => $status, "response" => $response)));
    }

?>