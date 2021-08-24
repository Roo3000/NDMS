<!DOCTYPE html>
<html>
    <head>
        <title>Nexttel management app</title>
        <meta charset="utf-8">
        <?php 
       include_once 'include/database.php';
       $db= new PDO("mysql:host=" . HOST .";dbname" . DB_NAME,USER,PASS);
       
       $sql = "SELECT quantity,nom,SN,inform,lastdate,id FROM nexttel.datacenter";
       $results=$db->query($sql);
       $result=$results->fetchAll();
       ?>
       <link rel="stylesheet" href="css/first.css">
       <link rel="stylesheet" href="css/bootstrap.min.css">
       <meta name="viewport" content="width=device-width, initial scale=1.0">
       <style>
        body { background-color: #8F0000;
               color: white;
             }
        </style>
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
        <div class="">
          
           
            <div class="row">
                <div class="col-xs-6 col-sm-3">
                <a href="first.php" data-toggle="tab" class="btn btn-warning"> Go Back</a>
                </div>
                <div class="col-xs-6 col-sm-3">
                   <a href="data.php" title="click here to add component" data-toggle="tab" class="btn btn-success">+</a>
                </div>


                <div class="col-xs-6 col-sm-3">
                   <P></P>
                </div>

                <div class="col-xs-6 col-sm-3">

                   <div class="panel-body">
                        <form method="post" action="" class="form-inline" role="form">

                            <div class="form-group">

                                <div class="row">

                                    <div class="col-xs-8 col-sm-9">
                                        <input name="search" class="form-control" placeholder="search Designation or Serial Number" type="text" required>
                                    </div>

                                    <div class="col-xs-4 col-sm-3">
                                        <button name="send" type="submit" class="btn btn-dark">Search</button>
                                    </div>
                               
                                </div>
                            </div>
                        </form>
                   </div>

                </div>

            </div>

        </div><br>
        <div class="table-responsive-md">
            <table  class="table table-dark table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Designation</th>
                        <th scope="col">Serial Number</th>
                        <th scope="col">Information</th>
                        <th scope="col">Date</th>
                        <?php
                        if(count($result)>0){
                            echo"<th colspan='2' scope='col'>Operations</th>";
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(isset($_POST["send"])){

                        $search=$_POST['search'];
                        $sql = "SELECT * FROM nexttel.datacenter WHERE SN LIKE '$search' OR nom LIKE '$search'";
                        $results=$db->query($sql);
                        $result=$results->fetchAll();
                        if(count($result) > 0){
                            foreach($result as $row){
                                echo"
                                <tr>
                                <td>".$row['id']."</td>
                                <td>".$row['quantity']."</td>
                                <td>".$row['nom']."</td>
                                <td>".$row['SN']."</td>
                                <td>".$row['inform']."</td>
                                <td>".$row['lastdate']."</td>
                                <td><button class='btn btn-warning'><a style='text-decoration:none; color:white' href='update.php?id=".$row['id']."&q=".$row['quantity']."&n=".$row['nom']."&s=".$row['SN']."&i=".$row['inform']."&ld=".$row['lastdate']."' onclick='return checkdelete()'>Edit/Update</a></button></td>
                                <td><button class='btn btn-danger'><a style='text-decoration:none; color:white' href='delete.php?id=".$row['id']."&q=".$row['quantity']."&n=".$row['nom']."&s=".$row['SN']."&i=".$row['inform']."&ld=".$row['lastdate']."' onclick='return checkdelete()'>Delete</a></button></td>
                                </tr>";
                            }
                        }
                    }else {

                        foreach($result as $row){
                            echo"
                            <tr>
                            <td>".$row['id']."</td>
                            <td>".$row['quantity']."</td>
                            <td>".$row['nom']."</td>
                            <td>".$row['SN']."</td>
                            <td>".$row['inform']."</td>
                            <td>".$row['lastdate']."</td>
                            <td><button class='btn btn-warning'><a style='text-decoration:none; color:white' href='update.php?id=".$row['id']."&q=".$row['quantity']."&n=".$row['nom']."&s=".$row['SN']."&i=".$row['inform']."&ld=".$row['lastdate']."' onclick='return checkdelete()'>Edit/Update</a></button></td>
                            <td><button class='btn btn-danger'><a style='text-decoration:none; color:white' href='delete.php?id=".$row['id']."&q=".$row['quantity']."&n=".$row['nom']."&s=".$row['SN']."&i=".$row['inform']."&ld=".$row['lastdate']."' onclick='return checkdelete()'>Delete</a></button></td>
                            </tr>";
                        } 

                
                    }
               
                       
                    ?>
                </tbody>
            </table>
           </div>
        </div>
        </div>
       
        <script>
            function checkdelete(){
                return confirm('Are you sure you want to delete this record');
            }
        </script>
    </body> 
</html>