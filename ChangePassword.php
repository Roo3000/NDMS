<!-- <!DOCTYPE html>
<html>
    <head>
       
        <title>Nexttel management app</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/first.css">
        
        
        
    </head>
    <body>
        <div class="container">

            <div class="">
                <marquee direction="rigth">NEXTELL DATACENTER MANAGMENT SYSTEM</marquee> 
            </div>

        </div>

        <div class="top">
            <img id="img2" src="image/nexttel-removebg-preview.png" alt="">
            <img id="img1" src="image/image-removebg-preview.png" alt="">
        </div>

        <div class="row">

            <div class="col-lg-3">
                <p></p>
            </div>

            <div class="col-lg-6">

                <div class="card text-white bg-secondary mb-3" style="margin-top:100px">
                    <div class="card-header"><h1>Register Panel</h1></div>
                    <div class="card-body">
                        <form method="post" class="horizontal-form">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <p></p>
                                    </div>
                                    <label for="UserName" class="col-lg-3 col-sm-2 control-label">UserName:</label>
                                    <div class="col-lg-4">
                                        <input type="text" name="username" id="UserName" required>
                                    </div>
                                    <div class="col-lg-3">
                                        <p></p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <p></p>
                                    </div>
                                    <label for="pass" class="col-lg-3 col-sm-2 control-label">PassWord:</label>
                                    <div class="col-lg-4">
                                        <input type="password" name="pass" id="pass" required>
                                    </div>
                                    <div class="col-lg-3">
                                        <p></p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <p></p>
                                    </div>
                                    <label for="checkpass" class="col-lg-3 col-sm-2 control-label">PassWord Again:</label>
                                    <div class="col-lg-4">
                                        <input type="password" name="checkpass" id="checkpass" required>
                                    </div>
                                    <div class="col-lg-3">
                                        <p></p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p></p>
                                    </div>
                                    <div class="col-lg-4">
                                        <button name="send" type="submit" class="btn btn-hover btn-danger">Change Password</button>
                                    </div>
                                    <div class="col-lg-4">
                                        <p></p>
                                    </div>
                                </div> 
                            </div>

                        </form>
                    </div>
                </div>

            </div>

            <div class="col-lg-3">
                <p></p>
            </div>

        </div>

    </body>
</html> -->

<?php
$to = 'tiomoroosevelt@gmail.com';
$subject = 'Testing php email';
$message = 'This mail is sent using php mail function';
$headers = 'From:ngongtiomofranckroosevelt@gmail.com';

$test = mail($to,$subject,$message,$headers);
if($test){
    
    echo 'email succesfully sent';

}else{
    echo 'error';
}
?>