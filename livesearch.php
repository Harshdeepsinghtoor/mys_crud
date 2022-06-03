<?php 
session_start() ;
if(!empty($_GET["keys"])){       
include "db_conn.php" ;
$squli="SELECT id,name,photo FROM users WHERE name LIKE '%$_GET[keys]%' LIMIT 8" ;       
$results=mysqli_query($conn,$squli) or die("Error in Queries") ;         
if(mysqli_num_rows($results)>0){
    while($row=mysqli_fetch_assoc($results)){ if($_SESSION["id"]!==$row["id"]){ ?>
<span><img src="image/<?php if(isset($row['photo'])){ echo $row['photo'] ; }else{echo 'blank-profile.jpg' ; } ?>" alt="Photo" 
style="height:25px ;width:25px ; object-fit:contain"> <a href="friendsprofile.php?id=<?php  echo $row['id'] ; ?>" id="livesearchlinks"><?php echo $row["name"]; ?></a></span><br>      

    <?php } }
}else{
    echo "No results Found" ;     
}
}


?>