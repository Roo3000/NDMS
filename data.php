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
       <link rel="stylesheet" href="css/third.css">
       <link rel="stylesheet" href="css/first.css">
       <meta name="viewport" content="width=device-width, initial scale=1.0">
    </head>
    <body>
        <div class="container">
            <h1><marquee direction="rigth">WAREHOUSE DATACENTER</marquee> </h1>
        </div>
        <div class="top">
            <img id="img2" src="image/nexttel-removebg-preview.png" alt="">
            <img id="img1" src="image/image-removebg-preview.png" alt="">
        </div>
        
        <div class="container" style="margin-top:50px">
            <div class="panel-body">
                <form method="post" class="form-horizontal" role="form">
                    <span><u> COMPONENT INFORMATION</u></span>

                    <div class="form-group">  
                        
                        <div class="row">
                            <div class="col-lg-2">
                                <p></p>
                            </div>
                            <label for="inputquantity" class="col-lg-3 col-sm-2 control-label">Quantity:</label>
                            <div class="col-lg-4">
                                <input type="text" name="quantity" id="inputquantity" placeholder="Enter the quantity" required>
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
                            <label for="inputnom" class="col-lg-3 col-sm-2 control-label">Name of component:</label>
                            <div class="col-lg-4">
                                <input type="text" name="nom" id="inputnom" required>
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
                            <label for="inputSN" class="col-lg-3 col-sm-2 control-label">SN:</label>
                            <div class="col-lg-4">
                               <input type="text" name="SN" id="inputSN" placeholder="Enter the serial number" required>
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
                            <label for="inputinform" class="col-lg-3 col-sm-2 control-label">Information:</label>
                            <div class="col-lg-4">
                                 <input type="text" name="inform" id="inputinform" required>
                            </div>
                            <div class="col-lg-3">
                                <p></p>
                            </div>
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <p></p>
                            </div>
                            <div class="col-lg-3">
                               <button type="submit" name="formsend" class="btn-success" >SEND</button>
                            </div>
                            <div class="col-lg-3">
                                <button type="submit" class="btn btn-primary" ><a href="datacenter.php">DATACENTER</a></button></button>
                            </div>
                            <div class="col-lg-3">
                                <p></p>
                            </div>
                        </div> 
                    </div>
                </form>
            </div>
        </div>
        <?php 
       if(isset($_POST["formsend"])){
           $quantity=$_POST['quantity'];
           $name=$_POST['nom'];
           $SN=$_POST['SN'];
           $inform=$_POST['inform'];
      
           if(!empty($SN)){
               $sql = $db->prepare("INSERT INTO nexttel.datacenter(`quantity`,`nom`, `SN`,`inform`) VALUES(:quantity,:nom, :SN, :inform)");
               $ql=$sql->execute(array('quantity'=> $quantity,'nom'=>$name, 'SN'=> $SN,'inform'=>$inform));
               
           }
 
       }
       ?>

    </body> 
</html>