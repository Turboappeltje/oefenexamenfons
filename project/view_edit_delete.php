<?php
include 'database.php';

//initialize session
session_start();
?>

<html>
    <head>
        <title>Welcome!</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="topnav">
            <a class="active" href="welcome_user.php">Home</a>
            <a href="new_user.php">Add user</a>
            <a href="view_edit_delete.php">View, Edit and/or Delete users</a>
            <a href="logout.php">Logout</a>
        </div>

        <?php
            $db = new database('localhost', 'root', '', 'project', 'utf8');
            $results = $db->show_profile_details_user(NULL);
            

            // fixed array. all indexes have the same number of columns. use first index.
            $columns = array_keys($results[0]);

            // todo:
            //check results, what is it?


            

            echo "<table>";
            echo "<tr>";


                    foreach($columns as $column){
                        echo "
                            <th>
                                <strong>$column</strong>
                            </th>
                        ";                    
                    }
                    echo "<th>Edit</th>";
                    echo "<th>Delete</th>";
                echo "</tr>";
                 echo "<tr>";
                 // foreach($columns as $column){
                 //     echo "
                 //         <th>
                 //             <strong>$column</strong>
                 //        </th>
                 //     ";                    
                 // }
                 // echo "<tr>";

                
                 foreach($results as $rows => $row){

                    echo "<tr>";
                    foreach($row as $row_data){
                       
                        echo "<td>$row_data</td>";
                        
                     }
                    echo "<td>Edit</td>";
                   
                  
                   echo "<td>Delete</td>";
                     echo "</tr>";
                     //print_r($row_data);
                 }
             

                  // foreach($results as $rows => $row){
                  //     foreach($row as $r){
                  //         echo $r;
                  //     }
                  //    print_r($row_data);
                
                
            echo "</table>"; 
    ?>                
    </body>
</html>