
<html lang="en">
<head>
    
    <title>Student Crud Application</title>
    <style>
        
    </style>
</head>
<body>

                        <h1 align="center"> Admin Page </h1>
            
                    
                   
                    
                        
                        <br/>
                        <br/>

                    <table class="table" border="2" align="center">
                        
                            <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Number of Adult</th>
                            <th>Number of Child</th>
                            <th>Adult Selected Offer</th>
                            <th>Child Selected Offer</th>
                            <th></th>
                            </tr>
                        
                        <tbody>
                                <?php
                                
                 $host = "localhost";
                 $user = "root";
                 $pass = "";
                 $db = "water park";
                $conn = mysqli_connect($host, $user, $pass, $db);

                                $sql = "select * from ticket_bookings";
                                $run = mysqli_query($conn, $sql);
                                $id= 1;

                                while($row = mysqli_fetch_array($run))
                                {

                                    $id = $row['id'];
                                    $name = $row['name'] ;
                                    $mobile = $row['mobile'];
                                    $email = $row['email'];
                                    $date = $row['booking_date'];

                                   $adultQuantity = $row['adult_tickets'];
                                   $childQuantity = $row['child_tickets'];
                                   $adultOffer = $row['adult_offer'];
                                   $childOffer = $row['child_offer'];
                                ?>

                                   <tr>
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $name ?></td>
                                        <td><?php echo $mobile ?></td>
                                        <td><?php echo $email ?></td>
                                        <td><?php echo $date ?></td>
                                        <td><?php echo $adultQuantity ?></td>
                                        <td><?php echo $childQuantity ?></td>
                                        <td><?php echo $adultOffer ?></td>
                                        <td><?php echo $childOffer ?></td>

                                        <td>
                                            
                                        <!-- <button class="btn btn-suc cess"> <a href='edit.php?edit=' class="text-light"> Edit </a> </button> &nbsp; -->
                                        <button><a href="delete.php">Delete</a></button>
                                    </td>
                                   </tr>
                                    <?php $id++; } ?>
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>