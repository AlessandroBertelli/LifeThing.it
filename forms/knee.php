<?php
    require'./mailer/mailsender.php';

    if(isset($_POST["send"])){
        $nome = $_POST["name"];
        $mail = $_POST["email"];
        $oggetto = $_POST["subject"];
        $messaggio = $_POST["text"];
    
        $res = send_mail($mail, "kneeeeeee", $messaggio);

    }
?>