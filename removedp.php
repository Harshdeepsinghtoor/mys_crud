<?php 
session_start() ;
include "db_conn.php" ;

                $sqls1="UPDATE users SET photo=null WHERE id='$_SESSION[id]'" ;
                $results=mysqli_query($conn,$sqls1) or die("Error in the query");
                echo "Photo removed Successfully" ;
                header("Location: profile.php") ;
                    //echo "<a href='update.php' style=color:white;background-color:black>Update Data</a>";
                    
                

?>