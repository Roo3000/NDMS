<html>
    <head>
        <title>Nexttel management app</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/first.css">
        <?php 
       include_once '../include/database.php';
       $db= new PDO("mysql:host=" . HOST .";dbname" . DB_NAME,USER,PASS);
       
       $sql = "SELECT * FROM nexttel.access";
       $results=$db->query($sql);
       $result=$results->fetchAll();
       ?>
    </head>
    <body>
        <div class="container">

            <div class="">
                <marquee direction="rigth">NEXTELL DATACENTER MANAGMENT SYSTEM</marquee> 
            </div>

        </div>

        <div class="top">
            <img id="img2" src="../image/nexttel-removebg-preview.png" alt="">
            <img id="img1" src="../image/image-removebg-preview.png" alt="">
        </div>

        

        <div class="row" style="margin-top:100px">
            <div class="row">
                <div class="col-lg-1">
                    <p></p>
                </div>
                <div class="col-xs-2 col-sm-3">
                    <a href="admin-panel.php" title="go to admin panel" data-toggle="tab" class="btn btn-warning"> Go Back</a>
                </div>
                
                <div class="col-lg-4">
                    <h1>List of Access</h1>
                </div>
                <div class="col-lg-2">
                    <form method="post" class="horizontal-form">
                        <input type="submit" name="send" class="btn btn-danger" value="clear">
                    </form>
                </div>
            </div>
            <div class="col-lg-2">
                <p></p>
            </div>
            <div class="col-lg-8">
                <div class="table-responsive-md">
                    <Table style="text-align:center" class="table table-dark table-hover table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">UserName</th>
                                <th scope="col">email</th>
                                <th scope="col">DATE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($result as $row){
                            echo"
                            <tr>
                            <td>".$row['id']."</td>
                            <td>".$row['nom']."</td>
                            <td>".$row['Username']."</td>
                            <td>".$row['email']."</td>
                            <td>".$row['date']."</td>
                            </tr>";
                            } 
                           ?>
                        </tbody>
                    </Table>
                </div>
            </div>
        </div>
    </body>
    <?php
    if(isset($_POST['send'])){

        $sql ="DELETE FROM nexttel.access";
        $results=$db->query($sql);  

        $sql = "ALTER TABLE nexttel.access AUTO_INCREMENT=0";
        $results=$db->query($sql); 

        header("Location:access.php"); 

    }
    ?>
</html>