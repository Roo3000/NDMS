<!DOCTYPE html>
<html>
    <head>
        <title>Nexttel management app</title>
        <meta charset="utf-8">
        <?php 
       include_once 'include/database.php';
       $db= new PDO("mysql:host=" . HOST .";dbname" . DB_NAME,USER,PASS);
       ?>
       <link rel="stylesheet" href="css/bootstrap.min.css">
       <link rel="stylesheet" href="css/first.css">
       <link rel="stylesheet" href="css/third.css">
       <meta name="viewport" content="width=device-width, initial scale=1.0">
    </head>
    <body>
        <div class="container">
            <h1><marquee direction="rigth">DELIVER/RECEIVER INFORMATION</marquee> </h1>
        </div>
        <div class="top">
            <img id="img2" src="image/nexttel-removebg-preview.png" alt="">
            <img id="img1" src="image/image-removebg-preview.png" alt="">
        </div>

    <div class="container" style="margin-top:50px">
        <div class="row">
            <div class="col-lg-3">
                <button name="back" class="btn btn-dark" ><a href="first.php" title="go to the previous page">Back</a></button>
            </div>
            <div class="col-lg-6">
                <p></p>
            </div>
            <div class="col-lg-3">
                <button  name="next" class="btn btn-primary" ><a href="fourth.php">Next</a></button>
            </div>
        </div>
        
        <div class="row">
            <!-- deliver information -->
            <div class="col-lg-6 col-sm-10 col-xs-12">
                <div class="container">
                    <div class="panel-body">
                        <form method="post" action="" class="form-horizontal">
                            <span><u>DELIVER INFORMATION</u></span>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-sm-2 col-xs-2">
                                        <p></p>
                                    </div>
                                    <label for="inputdpseudo" class="col-lg-3 col-sm-3 col-xs-3 control-label">Deliver's name:</label>
                                    <div class="col-lg-4 col-sm-4 col-xs-4">
                                        <input type="text" name="dpseudo" id="inputdpseudo" required>
                                    </div>
                                    <div class="col-lg-3 col-sm-3 col-xs-3">
                                        <p></p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-sm-2 col-xs-2">
                                        <p></p>
                                    </div>
                                    <label for="inputdnumber" class="col-lg-3 col-sm-3 col-xs-3 control-label">Number:</label>
                                    <div class="col-lg-4 col-sm-4 col-xs-4">
                                        <input type="text" name="dnumber" id="inputdnumber" required>
                                    </div>
                                    <div class="col-lg-3 col-sm-3 col-xs-3">
                                        <p></p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-5 col-sm-5 col-xs-5">
                                        <p></p>
                                    </div>
                                    <div class="col-lg-2 col-sm-2 col-xs-2">
                                        <button type="submit" name="formsend" class="btn btn-success" >SEND</button>
                                    </div>
                                    <div class="col-lg-5 col-sm-5 col-xs-5">
                                        <p></p>
                                    </div>
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>      
    
            <!-- receiver information -->
            <div class="col-lg-6 col-sm-10 col-xs-12">
                <div class="container">
                    <div class="panel-body">
                        <form method="post" action="" class="form-horizontal">
                            <span><u>RECEIVER INFORMATION</u></span>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-sm-2 col-xs-2">
                                        <p></p>
                                    </div>
                                    <label for="inputrpseudo" class="col-lg-3 col-sm-3 col-xs-3 control-label">Receiver's name:</label>
                                    <div class="col-lg-4 col-sm-4 col-xs-4">
                                        <input type="text" name="rpseudo" id="inputrpseudo" required>
                                    </div>
                                    <div class="col lg-3 col-sm-3 col-xs-3">
                                        <p></p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-sm-2 col-xs-2">
                                        <p></p>
                                    </div>
                                    <label for="inputrnumber" class="col-lg-3 col-sm-3 col-xs-3 control-label">Number:</label>
                                    <div class="col-lg-4 col-sm-4 col-xs-4">
                                        <input type="text" name="rnumber" id="inputrnumber" required>
                                    </div>
                                    <div class="col-lg-3 col-sm-3 col-xs-3">
                                        <p></p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 col-xs-4">
                                        <p></p>
                                    </div>
                                
                                    <div class="col-lg-4 col-sm-4 col-xs-4">
                                        <button type="submit" name="send" class="btn btn-success">SEND</button>
                                    </div>
                               
                                    <div class="col-lg-4 col-sm-4 col-xs-4">
                                        <p></p>
                                    </div>
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 col-sm-1 col-xs-1">
                <p></p>
            </div>
        </div>

    </div>
        <?php 

        function start($string, $startstring){
            $len = strlen($startstring);
            return (substr($string,0,$len)===$startstring);
        }
       if(isset($_POST["formsend"])){
           $pseudo=$_POST['dpseudo'];
           $number=$_POST['dnumber'];
           
           if(!empty($pseudo) && strlen($number)==9 && start($number, '66')==true ){
               
               if(is_string($pseudo)== true || is_nan(intval($pseudo))==true){
                $sql = $db->prepare("INSERT INTO nexttel.deliver(`pseudo`,`numero`) VALUES(:dpseudo, :dnumber)");
                $ql=$sql->execute(array('dpseudo'=>$pseudo,'dnumber'=>$number));
               }
               else {
                echo '<script> alert("Warning:!!A name cannot be a number!!")</script>';
               }
            }
           elseif (is_nan(intval($number))==true || strlen($number)!=9 ) {
            echo '<script> alert(" We need real phone numbers")</script>';
           }
            elseif(start($number, '66')==false){
                echo '<script> alert(" Nexttel phone numbers start with 66")</script>';
            }
           else {
            echo '<script> alert("Fill the form correctly")</script>';
           }
 
        }
       
       if(isset($_POST["send"])){
           $pseudo=$_POST['rpseudo'];
           $number=$_POST['rnumber'];
           
           if(!empty($pseudo) && strlen($number)==9 && start($number, '66')==true){
              
               if(is_string($pseudo)== true || is_nan(intval($pseudo))==true){
                $sql = $db->prepare("INSERT INTO nexttel.receiver(`pseudo`,`numero`) VALUES(:rpseudo, :rnumber)");
                $ql=$sql->execute(array('rpseudo'=>$pseudo,'rnumber'=>$number));
               }else {
                echo '<script> alert("Warning:!!A name cannot be a number!!")</script>';
               }
            }
           elseif(start($number, '66')==false){
             echo '<script> alert(" Nexttel phone numbers start with 66")</script>';
           }
           elseif (is_nan(intval($number))==true || strlen($number)!=9) {
             echo'<script> alert(" We need real phone numbers!")</script>';
           }
           elseif(strlen($number)!=9) {
            echo '<script> alert("WARNING:!!a number has 9 digits!!")</script>';
            }
            else {
                echo '<script> alert("Fill the form correctly!")</script>';
            }
 
        }
       ?>
       
    </body> 
</html>