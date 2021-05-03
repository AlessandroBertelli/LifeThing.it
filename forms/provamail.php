<html>
    <head>

    </head>
    <body>
        <form action="knee.php" method="POST">
            <input type="email" name="email" placeholder="scrivi la tua email">
            <textarea name="text"></textarea>
            <input type="submit" name="send" value="invia">
        </form>

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
    </body>
</html>