<!DOCTYPE html>
<html>
    <head>
        <title>CodeIgniter Send Email</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <h3>Use the form below to send email</h3>
            <form class="form" method="post" action="<?=base_url('email')?>" enctype="multipart/form-data">
                <div></div>
                <input type="email" id="to" name="to" placeholder="Receiver Email">
                <br><br>
                <input type="text" id="subject" name="subject" placeholder="Subject">
                <br><br>
                <textarea rows="6" id="message" name="message" placeholder="Type your message here"></textarea>
                <br><br>
                <input class="btn btn-success" type="submit" value="Send Email" />
            </form>
        </div>
        <style>
            .msg-body{
                border: 1px solid #deb887;
                max-width: 60%;
                text-align: center;
                padding: 1%;
            }
            .main-body{
                font-style:normal;
                font-weight:bold;
                padding-top:20px;
                padding-bottom:20px;
                text-align:left;
                padding-left:25px;
                background-color:whitesmoke;
            }
            .body-head{
                padding: 4% 0;
                background-color: #ecd415;
                /* height: 22%; */
                height:75px
            }
        </style>
        <?php
            $link = '<a href="login/authenticate?email=&&reset_token=">here</a>';
        ?>
        <div class="msg-body">
            <div class="body-head">
                <h4 style="color:#fff; font-weight:600;">EXAMPUR</h4>
            </div>
            <div class="main-body">
                <p>This mail is confidential.For security reasons, DO NOT share this with anyone. Click <?= $link ?> to change your password;</p>
            </div>
        </div>
    </body>
</html>
