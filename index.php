<?php

// including the php config file to connect to database
include('config.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
<div class="mx-auto text-center">
    <h1 class="mb-5">Employees</h1>

    <!-- table start for titles -->
    <table class="table">
        <thead class="thead-dark mb-4">
            <tr class="table-primary">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Years</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody >

        <!-- php and mysql code to store the result in $result -->
            <?php
                                    
                                    $sno = 0;
                                    $sql="SELECT  id, name, years  ,status
                                    FROM employees ";
                                    $stmt = mysqli_prepare($conn,$sql);
                                    $stmt->execute();
                                    $result=$stmt->get_result();

                                    // error handling
                                if (!$result) {
                                    echo '<tr>
                                    <th scope="row">query error</th>
                                    </tr>';
                              }
                              else{  

                                // until we get all values from database
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                         
                                            // creating a counter to show serial number
                                          $sno = $sno + 1;
                                          // class_name variable which will implement the green color if years>=5 and active
                                          $class_name= ($row["status"]==0 && $row["years"]>=5)?"table-success":"";
                                          $status= ($row["status"]==0) ?"active":"non active";
                                          
                                          // displaying the values of table
                                          echo '<tr class='.$class_name.'>
                                                    <th scope="row">'. $sno . '</th>
                                                    <td>'. $row['name'] .'</td>
                                                    <td>'. $row["years"] . '</td>
                                                    <td>'. $status . '</td> ';


                                                  
                                                    
                                                    
                                            
                                                
                                        }
                                        // closing connection
                                        $conn->close();
                               
                            }
                        ?>





        </tbody>
    </table>


</div>
</body>

</html>