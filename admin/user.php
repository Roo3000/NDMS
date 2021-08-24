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
       
       $sql = "SELECT * FROM nexttel.users";
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
                    <h1>List of Users</h1>
                </div>
                <div class="col-xs-2 col-sm-3">
                   <a href="../register.php" title="click here to add users" data-toggle="tab" class="btn btn-success">+</a>
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
                                <?php
                                if(count($result)>0){
                                    echo"<th colspan='2' scope='col'>Status</th>";
                                }
                                ?>
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
                            <td><button class='btn btn-primary'><a title='click to change his status to admin' style='text-decoration:none; color:white' href='adminconv.php' onclick='return check()'>Admin</a></button></td>
                            <td><button class='btn btn-danger'><a title='click to delete this user' style='text-decoration:none; color:white' href='deluser.php?id=".$row['id']."&username=".$row['Username']."' onclick='return checkdelete()'>Delete</a></button></td>
                            </tr>";
                            } 
                           ?>
                        </tbody>
                    </Table>
                </div>
            </div>
        </div>

        <script>
            function checkdelete(){
                return confirm('Are you sure you want to delete this user?');
            }
        </script>
        <script>
            function check(){
                return confirm('Are you sure you want this user to become an admin?');
            }
        </script>
    </body>
</html>