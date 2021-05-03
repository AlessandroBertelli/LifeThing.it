<?php
  require './mailer/mailsender.php';

  if(isset($_POST["invio"])){
    $nome = $_POST["name"];
    $mail = $_POST["email"];
    $oggetto = $_POST["subject"];
    $messaggio = $_POST["message"];

    send_mail($mail, $oggetto, $messaggio);

  }
?>
