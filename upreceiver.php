<!DOCTYPE html>
<html>
    <head>
        <title>Nexttel management app</title>
        <meta charset="utf-8">
        <?php 
       include_once 'include/database.php';
       $db= new PDO("mysql:host=" . HOST .";dbname" . DB_NAME,USER,PASS);
       error_reporting(0);
       $rid = $_GET['rid'];
       $rnm = $_GET['rnm'];
       $rnb = $_GET['rnb']
      
       ?>
       <link rel="stylesheet" href="css/bootstrap.min.css">
       <link rel="stylesheet" href="css/third.css">
       <link rel="stylesheet" href="css/first.css">
       <meta name="viewport" content="width=device-width, initial scale=1.0">
    </head>
    <body>
        <div class="container">
            <h1><marquee direction="rigth">Receiver INformation</marquee> </h1>
        </div>
        <div class="top">
            <img id="img2" src="image/nexttel-removebg-preview.png" alt="">
            <img id="img1" src="image/image-removebg-preview.png" alt="">
        </div>
    <div class="container" style="margin-top:50px">
            <div class="panel-body">
                <form  method="post" class="form-horizontal" role="form">
                    <span><u> RECIVER INFORMATION</u></span>

                    <div class="form-group">  
                        
                        <div class="row">
                            <div class="col-lg-2">
                                <p></p>
                            </div>
                            <label for="inputnom" class="col-lg-3 col-sm-2 control-label">Receiver's Name:</label>
                            <div class="col-lg-4">
                                <input type="text" name="nom" id="inputnom" value="<?php echo $rnm?>" required>
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
                            <label for="inputnum" class="col-lg-3 col-sm-2 control-label">Number:</label>
                            <div class="col-lg-4">
                                <input type="text" name="number" value="<?php echo $rnb?>" id="inputnum" required>
                            </div>
                            <div class="col-lg-3">
                                <p></p>
                            </div>
                        </div>
                        
                    </div>

                        
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-5">
                                <p></p>
                            </div>
                            <div class="col-lg-2">
                               <button type="submit" name="formsend" class="btn-success" >SEND</button>
                            </div>
                            <div class="col-lg-5">
                                <p></p>
                            </div>
                        </div> 
                    </div>
                </form>
            </div>
        </div>
        <?php 
        function start($string, $startstring){
            $len = strlen($startstring);
            return (substr($string,0,$len)===$startstring);
        }
       if(isset($_POST["formsend"])){
           $name=$_POST['nom'];
           $number=$_POST['number'];
      
           if(!empty($name) && start($number, '66')==true){
               $sql ="UPDATE nexttel.receiver SET pseudo='$name', numero='$number' WHERE rid='$rid'";
               $results=$db->query($sql); 

               header("Location:handover.php");  
         }
           elseif(start($number, '66')==false){
            echo '<script> alert(" Nexttel phone numbers start with 66")</script>';
           }
           else {
              echo '<script> alert("Fill the form correctly")</script>';
            }

       }
     
       ?>

    </body> 
</html>