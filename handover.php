<!DOCTYPE html>
<html>
<head>
<title>Nexttel management app</title>
    <meta charset="utf-8">
    <?php 
       include_once 'include/database.php';
       $db= new PDO("mysql:host=" . HOST .";dbname" . DB_NAME,USER,PASS);

       $sql = "SELECT* FROM nexttel.component";
       $component=$db->query($sql);
       $comp=$component->fetchAll();

       $sql = "SELECT* FROM nexttel.deliver";
       $results=$db->query($sql);
       $result=$results->fetchAll();

       $sql = "SELECT* FROM nexttel.receiver";
       $resu=$db->query($sql);
       $res=$resu->fetchAll();

       $date = date('d/m/Y', time());

    ?>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/handover.css">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    
</head>
<body>
   
   <div class="card border-dark text-dark  mb-3">

      <div class="card-header  bg-dark text-white">

         <div class="row">

            <div id="back" class="col-lg-3">
               <a href="first.php" data-toggle="tab" class="btn btn-warning">Go Back...</a>
            </div>

            <div class="col-lg-6">
               <p>Check the informations enterred and validate them using this button</p>
            </div>

            <div class="col-lg-2">
               <a href="convert.php" target="_blank" data-toggle="tab" class="btn btn-success">CONVERT TO PDF</a>
            </div>

         </div>
        
      </div>

      <div class="card-body bg-light">
         <div class="card-text">
            <div class="container">

               <div class="row">
                  <div class="col-lg-1">
                     <p></p>
                  </div>
                  <div class="col-lg-4">
                     <b>VIETTEL CAMEROUN S.A.</b><br>
                     <b>THE YAOUDE DATACENTER</b>
                  </div>
                  <div class="col-lg-2">
                     <P></P>
                  </div>
                  <div class="col-lg-4">
                     <b>REPUBLIC OF CAMEROUN</b><br>
                     <b>PEACE-WORK-FATHERLAND</b>
                  </div>
                  <div class="col-lg-1">
                     <p></p>
                  </div>
               </div><br><br>

               <div class="row">
                  <div class="col-lg-7">
                     <P></P>
                  </div>
                  <div class="col-lg-4">
                     <h5><i><p>Yaounde, <?php echo"$date" ?></p></i></h5>
                  </div>
                  <div class="col-lg-1">
                     <p></p>
                  </div>
               </div><br><br>

               <div class="row">
                  
                  <div class="col-lg-4">
                    <p></p>
                  </div>

                  <div class="col-lg-4">
                     <p><b><u><h4>HANDOVER</h4></u></b></p>
                     <p>(No: 11/07/2020/GS YAOUNDE)</p>
                  </div>

                  <div class="col-lg-4">
                     <p></p>
                  </div>
               </div>

               <div class="row">
                  <div class="col-lg-2">
                     <p></p>
                  </div>
                  <div class="col-lg-8">
                     <h4><p style="text-align:left;">This is a minute of handover is done in th Yaounde DATA CENTER on the date of the <?php echo"$date" ?>:</p></h4>
                  </div>
                  <div class="col-lg-2">
                     <p></p>
                  </div>
               </div><br>

               <div class="row">
                  <div class="col-lg-2">
                     <p></p>
                  </div>
         
                  <div class="table-responsive-md col-lg-8">
                    <h4><p style="text-align:left;"><b>PARTY A: REPRESENTATIVE OF DELIVER</b></p></h4>
                    <table  class="table table-dark table-hover table-striped">
                        <thead>
                           <tr>
                              <td scope="col"><b>Name</b></td>
                              <td scope="col"><b>TEL</b></td>
                              <?php
                              if(count($result)>0){
                                 echo"<td colspan='2' scope='col'><b>operations</b></td>";
                              }
                              ?> 
                           </tr>
                        </thead>
                        <tbody>
                            <?php
                              foreach($result as $row){
                                 echo"
                                 <tr>
                                 <td>".$row['pseudo']."</td>
                                 <td>".$row['numero']."</td>
                                 <td><button class='btn btn-warning'><a style='text-decoration:none; color:white' href='updeliver.php?did=".$row['did']."&dnm=".$row['pseudo']."&dnb=".$row['numero']."' onclick='return checkdelete()'>Modify</a></button></td>
                                 <td><button class='btn btn-danger'><a style='text-decoration:none; color:white' href='ddeliver.php?did=".$row['did']."&dnm=".$row['pseudo']."&dnb=".$row['numero']."' onclick='return checkdelete()'>Delete</a></button></td>
                                 </tr> ";
                              }
                            ?>
                        </tbody>
                     </table>
                  </div>
                  <div class="col-lg-2">
                     <p></p>
                  </div>
               </div><br>
               
               <div class="row">
                  <div class="col-lg-2">
                     <p></p>
                  </div>
         
                  <div class="table-responsive-md col-lg-8">
                    <h4><p style="text-align:left;"><b>PARTY B: REPRESENTATIVE OF RECEIVER</b></p></h4>
                    <table  class="table table-dark table-hover table-striped">
                        <thead>
                           <tr>
                              <td scope="col"><b>Name</b></td>
                              <td scope="col"><b>TEL</b></td>
                              <?php
                              if(count($res)>0){
                                 echo"<td colspan='2' scope='col'><b>operations</b></td>";
                              }
                              ?> 
                           </tr>
                        </thead>
                        <tbody>
                            <?php
                              foreach($res as $row){
                                 echo"
                                 <tr>
                                 <td>".$row['pseudo']."</td>
                                 <td>".$row['numero']."</td>
                                 <td><button class='btn btn-warning'><a style='text-decoration:none; color:white' href='upreceiver.php?rid=".$row['rid']."&rnm=".$row['pseudo']."&rnb=".$row['numero']."' onclick='return checkdelete()'>Modify</a></button></td>
                                 <td><button class='btn btn-danger'><a style='text-decoration:none; color:white' href='dreceiver.php?rid=".$row['rid']."&rnm=".$row['pseudo']."&rnb=".$row['numero']."' onclick='return checkdelete()'>Delete</a></button></td>
                                 </tr> ";
                              }
                            ?>
                        </tbody>
                     </table>
                  </div>
                  <div class="col-lg-2">
                     <p></p>
                  </div>
               </div><br><br>
               
               <div class="row">
                  <div class="col-lg-2">
                     <p></p>
                  </div>
                  <div class="col-lg-8">
                     <h4><p style="text-align:left;">This handover is made to send back components listed bellow from the Yaounde Data Center to the representative of receiver.</p></h4>
                  </div>
                  <div class="col-lg-2">
                     <p></p>
                  </div>
               </div><br>

               <div class="row">
                  <div class="col-lg-2">
                     <p></p>
                  </div>
         
                  <div class="table-responsive-md col-lg-8">
                    <table  class="table table-dark table-hover table-striped">
                        <thead>
                           <tr>
                              <td scope="col"><b>Quantity</b></td>
                              <td scope="col"><b>Name of components</b></td>
                              <td scope="col"><b>Serial Number</b></td>
                              <td scope="col"><b>NOTE</b></td>
                              <?php
                              if(count($comp)>0){
                                 echo"<td colspan='2' scope='col'><b>operations</b></td>";
                              }
                              ?> 
                           </tr>
                        </thead>
                        <tbody>
                            <?php
                              foreach($comp as $row){
                                 echo"
                                 <tr>
                                 <td>".$row['quantity']."</td>
                                 <td>".$row['nom']."</td>
                                 <td>".$row['SN']."</td>
                                 <td>".$row['inform']."</td>
                                 <td><button class='btn btn-warning'><a style='text-decoration:none; color:white' href='upcomponent.php?id=".$row['id']."&q=".$row['quantity']."&n=".$row['nom']."&s=".$row['SN']."&i=".$row['inform']."' onclick='return checkdelete()'>Modify</a></button></td>
                                 <td><button class='btn btn-danger'><a style='text-decoration:none; color:white' href='dcomponent.php?id=".$row['id']."&q=".$row['quantity']."&n=".$row['nom']."&s=".$row['SN']."&i=".$row['inform']."' onclick='return checkdelete()'>Delete</a></button></td>
                                 </tr> ";
                              }
                            ?>
                        </tbody>
                     </table>
                  </div>
                  <div class="col-lg-2">
                     <p></p>
                  </div>
               </div><br><br><br>

               <div class="row">
                  <div class="col-lg-2">
                     <p></p>
                  </div>
                  <div class="col-lg-2">
                     <p><b>REPRESENTATIVE OF DELIVER</b></p>
                  </div>
                  <div class="col-lg-4">
                     <P></P>
                  </div>
                  <div class="col-lg-2">
                     <p><b>REPRESENTATIVE OF RECEIVER</b></p>
                  </div>
                  <div class="col-lg-2">
                     <p></p>
                  </div>
               </div><br><br>
             
            </div>
         </div>
      </div>
   </div>
   <script>
            function checkdelete(){
                return confirm('Are you sure you want to delete this record');
            }upcomponent.php
   </script>  
 
</body>
</html>