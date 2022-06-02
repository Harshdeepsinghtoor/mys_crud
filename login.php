<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link href="data:image/x-icon;base64,AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAA3PDTADaMDgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAEQAAAAAAAAEiEAAAAAAAESIQAAAAAAASIiEAAAAAASIiIQAAAAARIhEiEAAAABIhASIRAAAAERAAEiEQAAAAAAABIhEAAAAAAAASIRAAAAAAAAEiEQAAAAAAABIhEAAAAAAAASIgAAAAAAAAERAAAAAAAAAAD//wAA+f8AAPD/AADg/wAA4H8AAMB/AACAPwAAhB8AAI4PAAD/BwAA/4MAAP/BAAD/4AAA//AAAP/4AAD//wAA" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
    <div class="container">
        <?php include "aelementss/heading.php" ?>
        <div class="main">
            <?php include "aelementss/sidebar.php" ?>

            <!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX THE CONTENT MAINS AREA OF THE PAGE IS STARTING FROM HERE XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
            <div class="news">
                <h1>Log In</h1>
                <?php if (isset($_GET['error'])) { ?>

                    <p class="errors"><?php echo $_GET['error']; ?></p>

                <?php } ?>
                <form action="logindata.php" method="post">
                    <label for="lemail">Enter your Email</label><br>
                    <input name="lemail" type="text" placeholder="Email"><br>
                    <label for="lpass">Password</label><br>
                    <input name="lpass" type="password" placeholder="Password" id="myInput">
                    <input type="checkbox" onclick="myFunction()">Show Password

                    <script>
                        function myFunction() {
                            var x = document.getElementById("myInput");
                            if (x.type === "password") {
                                x.type = "text";
                            } else {
                                x.type = "password";
                            }
                        }
                    </script>
                    <br><br>
                    <input name="login" type="submit" value="Login"><span> or </span><a href="register2.php" style="color:white;background-color:blue;font-weight:bolder;padding:4px;">Sign up</a><br>

                </form>


            </div>


        </div>
    </div>



</body>

</html>