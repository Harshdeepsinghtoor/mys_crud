<?php      
if(isset($_POST["save"])){
    if(empty($_POST["names"])){
        header("Location: profile.php") ;


    }else{
        include "db_conn.php" ;
        $squli1= "SELECT * FROM users WHERE name LIKE '%$_POST[names]%'" ;     
        $results1= mysqli_query($conn,$squli1) or die("Error in Queries ") ;
        if(mysqli_num_rows($results1)>0){
            echo mysqli_num_rows($results1)." Results Are Found" ;
        
        }else{
            echo "No Recods are Found for the name " ; 
        }
}


}

?>