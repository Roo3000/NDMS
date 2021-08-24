<!DOCTYPE html>
<html>
    <head>
        <title>Nexttell Management App</title>
        <?php 
       include_once 'include/database.php';
       $db= new PDO("mysql:host=" . HOST .";dbname" . DB_NAME,USER,PASS);

       $sql = "SELECT id,nom,lastdate FROM nexttel.uploads";
       $results=$db->query($sql);
       $result=$results->fetchAll();
       ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/first.css">
    </head>
    <body>
        <div class="container">
            <h1><marquee direction="rigth">Stock of Handover</marquee> </h1>
        </div>
        <div class="top">
            <img id="img2" src="image/nexttel-removebg-preview.png" alt="">
            <img id="img1" src="image/image-removebg-preview.png" alt="">
        </div>
        <div class="container" style="margin-top:50px">
            <div class="panel-body">
                <div class="row">
                     <div class="col-lg-2">
                        <a href="first.php" data-toggle="tab" class="btn btn-warning">Go Back...</a>
                    </div>

                    <div class="col-lg-6">

                        <form method="post" class="from-inline" role="form"> 
                            <button name="clear"  type = "submit" class="btn btn-hover btn-danger">Clear</button>
                        </form>

                    </div>
                    <div class="col-lg-4">

                        <form method="post" enctype="multipart/form-data" action="" class="form-inline" role="form">

                            <div class="form-group">

                                <div class="row">

                                    <div class="col-lg-6">
                                        <input  type="file" name="userfile" class="form-control bg-dark text-white" required>
                                    </div>

                                    <div class="col-lg-6">
                                        <button name="send" type="submit" class="btn btn-hover btn-dark">Add</button>
                                    </div>
                               
                                </div>

                            </div>

                        </form>

                    </div>
                </div>

            </div>

            <div class="table-responsive-md">
                <table class=" table table-dark table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col-lg-2">Id</th>
                            <th scope="col-lg-6">Name of the File</th>
                            <th scope="col-lg-4">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($result as $row){
                            echo "
                            <tr>
                                <th>".$row['id']."</th>
                                <th><a href='uploads/".$row['nom']."' target = '_BLANK'>".$row['nom']."</a></th>
                                <th>".$row['lastdate']."</th>
                            </tr>
                            ";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php
        function start($string, $startstring){
            $len = strlen($startstring);
            return (substr($string,0,$len)===$startstring);
        }

       if(isset($_POST['send'])){

            $file = $_FILES['userfile'];


            $date = date('Y-m-d-h-i-s', time());

            $filename = $_FILES['userfile']['name'];
            $fileTmpname = $_FILES['userfile']['tmp_name'];

            $fileSize = $_FILES['userfile']['size'];
            $fileError = $_FILES['userfile']['error'];
            $fileType = $_FILES['userfile']['type'];

            $fileExt = explode('.', $filename);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array('pdf');

            $nom = "handover-".$date;

            if(!empty($_POST['userfile'])){
                
                if($sql){
                    echo"reussie";
                }else{
                    echo"echoue";
                }
            }

            if (in_array($fileActualExt, $allowed)){
                if($fileError === 0){
                  if($fileSize < 1000000){
                      $filenamenew = uniqid('',true).".".$fileActualExt;
                      $fileDestination = 'uploads/'.$filenamenew;

                      $sql = $db->prepare("INSERT INTO nexttel.uploads(`nom`) VALUES(:userfile)");
                      $ql=$sql->execute(array('userfile'=>$filenamenew));

                      move_uploaded_file($fileTmpname,$fileDestination);
                      header("Location:upload.php");
                      
                  }else{
                    echo '<script>alert("Your file is too big!")</script>';
                  }
                } else {
                    echo '<script>alert("We found an error while uploading the file. Please retry")</script>';
                }
            }else{
                echo '<script>alert("Warning: !!You cannot upload files of this type. This app only allowed pdf files!!")</script>';
            }
           
       }

       if (isset($_POST['clear'])){

           $sql ="DELETE FROM nexttel.uploads";
           $results=$db->query($sql); 

           $sql = "ALTER TABLE nexttel.uploads AUTO_INCREMENT=0";
           $results=$db->query($sql);
           header("Location:upload.php");
       }  
    ?>
    </body>
</html>