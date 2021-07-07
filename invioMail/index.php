<!DOCTYPE html>
<html>
    <head>
        <title>Send an Email</title>
    </head>
    <body>
        <center>
            <h4 class="sent-notification"></h4>

            <form id="myForm">
                <h2>Send an Email</h2>

                <label>Name</label>
                <input type="text" id="name" placeholder="Inserisci nome">
                <br><br>
                <label>Email</label>
                <input type="text" id="email" placeholder="Inserisci email">
                <br><br>
                <label>Subject</label>
                <input type="text" id="subject" placeholder="Inserisci oggetto">
                <br><br>
                <p>Message</p>
                <textarea id="body" rows="5" placeholder="Inserisci messaggio"></textarea>
                <br><br>
                <button type="button" onclick="sendEmail()" value="Send An Email">Submit</button>
            </form>
        </center>

        <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	    <script type="text/javascript">
        
        function sendEmail() {
            var name = $("#name");
            var email = $("#email");
            var subject = $("#subject");
            var body = $("#body");

            if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax({
                   url: 'sendEmail.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       name: name.val(),
                       email: email.val(),
                       subject: subject.val(),
                       body: body.val()
                   }, success: function (response) {
                        $('#myForm')[0].reset();
                        $('.sent-notification').text("Message Sent Successfully.");
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>
    </body>
</html>