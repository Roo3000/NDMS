<!DOCTYPE html>
<html>
    <head>
       
        <title>Nexttel management app</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/first.css">
        
        <?php 
       include_once 'include/database.php';
       $db= new PDO("mysql:host=" . HOST .";dbname" . DB_NAME,USER,PASS);

       ?>
        
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

            <div class="row" style = "margin-top:100px">
                
                <div class="col-xs-2 col-sm-3">
                    <a href="admin/user.php" title="go back to the users list" data-toggle="tab" class="btn btn-warning"> Go Back</a>
                </div>
        
            </div>

            <div class="col-lg-3">
                <p></p>
            </div>

            <div class="col-lg-6">

                <div class="card text-white bg-secondary mb-3" style="margin-top:100px">
                    <div class="card-header"><h1>Registration Panel</h1></div>
                    <div class="card-body">
                        <form method="post" class="horizontal-form">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <p></p>
                                    </div>
                                    <label for="Name" class="col-lg-3 col-sm-2 control-label">Name:</label>
                                    <div class="col-lg-4">
                                        <input type="text" name="name" id="Name" required>
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
                                    <label for="email" class="col-lg-3 col-sm-2 control-label">Email:</label>
                                    <div class="col-lg-4">
                                        <input type="email" name="email" id="email" required>
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
                                    <div class="col-lg-5">
                                        <p></p>
                                    </div>
                                    <div class="col-lg-2">
                                        <button name="send" type="submit" class="btn btn-hover btn-danger">Register</button>
                                    </div>
                                    <div class="col-lg-5">
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

    <?php
    if(isset($_POST["send"])){

        $name=$_POST['name'];
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=md5($_POST['pass']);

        $sql = "SELECT * FROM nexttel.users WHERE Username LIKE '$name' OR email LIKE '$email' OR PassWord LIKE '$password'";
        $results=$db->query($sql);
        $result=$results->fetchAll();

        if(count($result)==0){
          
            if($_POST['pass']==$_POST['checkpass'] && strlen($_POST['pass'])>=8){

                $name=$_POST['name'];
                $username=$_POST['username'];
                $email=$_POST['email'];
                $password=md5($_POST['pass']);
       
                if(!empty($name)){
                    $sql = $db->prepare("INSERT INTO nexttel.users(`nom`,`Username`, `email`,`PassWord`) VALUES(:name,:username, :email, :pass)");
                    $ql=$sql->execute(array('name'=> $name,'username'=>$username, 'email'=> $email,'pass'=>$password));
                    header("Location:admin/user.php");
                }
            }elseif(strlen($_POST['pass']<8)){
                echo '<script>alert("Password should have more than 8 characters")</script>';
            }else{
                echo '<script>alert("The passwords are different")</script>';
            }

        }else{
            echo '<script>alert("Username or Password already used")</script>';
        }

        

    }
    ?>
</html>