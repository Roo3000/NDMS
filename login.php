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

            <div class="col-lg-3">
                <p></p>
            </div>

            <div class="col-lg-6">

                <div class="card text-white bg-secondary mb-3" style="margin-top:200px">
                    <div class="card-header"><h1>Login Panel</h1></div>
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
                                    <div class="col-lg-5">
                                        <p></p>
                                    </div>
                                    <div class="col-lg-2">
                                        <button name="send" type="submit" class="btn btn-hover btn-danger">Login</button>
                                    </div>
                                    <div class="col-lg-5">
                                        <p></p>
                                    </div>
                                </div> 
                            </div>

                        </form>

                        <div>
                            <p></p>
                        </div>
                        
                        <div class="text-primary" style="color:blue;">
                            <a href="ChangePassword.php">Forgot password?</a>
                        </div>
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

        $username=$_POST['username'];
        $password=md5($_POST['pass']);

        $sql = "SELECT * FROM nexttel.admin WHERE Username LIKE '$username' AND PassWord LIKE '$password'";
        $results=$db->query($sql);
        $res=$results->fetchAll();


        $sql = "SELECT * FROM nexttel.users WHERE Username LIKE '$username' AND PassWord LIKE '$password'";
        $results=$db->query($sql);
        $result=$results->fetchAll();

        if(count($res)==1){

            header("Location:admin/admin-panel.php");  

        }elseif(count($result)==1){
             
            foreach($result as $row){
                $name = $row['nom'];
                $username = $row['Username'];
                $email = $row['email'];
                $sql = $db->prepare("INSERT INTO nexttel.access(`nom`,`Username`, `email`) VALUES(:name,:username, :email)");
                $ql=$sql->execute(array('name'=> $name,'username'=>$username, 'email'=> $email));
            }
 
      
            header("Location:first.php"); 

        }else{
            echo '<script>alert("This account doesnt exist")</script>';
        }
   

    }
    ?>
</html>