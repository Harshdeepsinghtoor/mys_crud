<?php 
if(!empty($_GET["keys"])){       
include "db_conn.php" ;
$squli="SELECT name,photo FROM users WHERE name LIKE '%$_GET[keys]%' LIMIT 5" ;       
$results=mysqli_query($conn,$squli) or die("Error in Queries") ;         
if(mysqli_num_rows($results)>0){
    while($row=mysqli_fetch_assoc($results)){ ?>
<span><img src="image/<?php if(isset($row['photo'])){ echo $row['photo'] ; }else{echo 'blank-profile.jpg' ; } ?>" alt="Photo" style="height:25px ;width:25px ; object-fit:contain"> <?php echo $row["name"]; ?></span><br>      

    <?php }
}else{
    echo "No results Found" ;     
}
}


?>