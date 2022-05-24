<?php
     

session_start();

include "db_conn.php" ;

if(isset($_POST["lemail"]) && isset($_POST["lpass"])){
    function validates($data){
        $data= trim($data);
        $data= stripslashes($data);
        $data= htmlspecialchars($data);
        return $data;
        

    }
    $lemail= validates($_POST["lemail"]);
    $lpass= validates($_POST["lpass"]);
    // At this steps i have validated the datas taken from the forms

    if(empty($lemail)){

        header("Location: login.php?error=Email is required");

        exit();
    }elseif(empty($lpass)){

        header("Location: login.php?error=Passwords is required");

        exit();
    }else{
        $enclpass=md5($lpass) ;

        $sqls="SELECT * FROM users WHERE email='$lemail' AND password='$enclpass'";
        $results= mysqli_query($conn, $sqls) ;
        if(mysqli_num_rows($results)===1){
        $row= mysqli_fetch_assoc($results);

        if($row["email"]===$lemail && $row["password"]===$enclpass){
            echo "Log in Successfull" ;
            $_SESSION["id"]=$row["id"];
            $_SESSION["email"]=$row["email"];
            $_SESSION["name"]=$row["name"];
            $_SESSION["contact"]=$row["contact"] ;
            $_SESSION["gender"]=$row["gender"] ;
            $_SESSION["hobbies"]=$row["hobbies"] ;
            $_SESSION["country"]=$row["country"] ;
            header("Location: profile.php");
            exit();
        }else{
            header("Location: login.php?error=Incorect User name or password");

                exit();
        }
        }else{
            header("Location: login.php?error=Incorect User name or password Not 1");

                exit();
        }
    }

}else{
    header("Location: index.php");

                exit();
}
?>