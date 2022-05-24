<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact</title>
    <link href="data:image/x-icon;base64,AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAA3PDTADaMDgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAEQAAAAAAAAEiEAAAAAAAESIQAAAAAAASIiEAAAAAASIiIQAAAAARIhEiEAAAABIhASIRAAAAERAAEiEQAAAAAAABIhEAAAAAAAASIRAAAAAAAAEiEQAAAAAAABIhEAAAAAAAASIgAAAAAAAAERAAAAAAAAAAD//wAA+f8AAPD/AADg/wAA4H8AAMB/AACAPwAAhB8AAI4PAAD/BwAA/4MAAP/BAAD/4AAA//AAAP/4AAD//wAA" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" href="CSS/style.css">
    <!--<style>
        body {
            max-width: 100%;
            margin: 0%;
            padding: 0%;
            background-image: url("Grad.jpg");
            background-size: cover;
            background-repeat: repeat-x;
        }

        .container {
            height: 100vh;
            width: 100vw;

        }

        .heading {
            margin: 0%;
            padding: 0%;
            width: 100vw;
            height: 15vh;
            border: 2px solid black;
        }

        .nav1 {
            float: right;
            border: 2px solid red;
            margin-right: 30px;
        }

        .list {
            display: flex;
            list-style-type: none;
            background-color: black;
            border-radius: 10px;
        }

        li {
            padding: 2.5em;
            margin: 0.2em;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;

            color: white;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            color: red;
            background-color: rgb(54, 49, 49);
        }

        /*All the content for the upper body is Above*/
        .main {
            width: 100vw;
            border: 2px solid yellow;
            height: 80vh;
            display: flex;
        }

        .nav2 {
            border: 2px solid green;
            width: 25vw;
        }

        .list2 {
            width: 50%;
            margin-left:20% ;
            border: 2px solid orchid;

            list-style-type: none;
            background-color: rgba(53, 157, 175, 0.7);
            
            border-top-right-radius:10px ;
            border-bottom-left-radius:10px;
        }

        .list2 li {
            color: black;
        }


        .news {
            font-family: Arial, Helvetica, sans-serif;
            padding: 1em;
            border: 2px solid brown;
            width: 75vw;
        }
    </style>-->
</head>

<body>
    <div class="container">
    <?php include "aelementss/heading.php" ; ?>
        
        <div class="main">
            <?php include "aelementss/sidebar.php" ; ?>
            <div class="news">
                <h1>Contact Us</h1>
                <form action="get">
                    <label for="fullname">Name</label><br>
                    <input type="text" name="fullname" id="fullname">
                    <br><br>
                    <label for="ems">Email</label><br>
                    <input type="email" name="ems" id="ems">
                    <br><br>
                    <label for="message">Message</label><br>
                    <textarea name="message" id="message" cols="30" rows="10"></textarea>
                    <br><br>
                    <input type="submit" value="Submit">
                    
                </form>
                

            </div>


        </div>
    </div>

</body>

</html>