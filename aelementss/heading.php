<div class="heading">
            <a href="index.php" style="text-decoration:none ;"><img style="height: 80%; width: 10em; margin: 1em; border-radius: 10px;" src="images/Loggo.jpg" alt="Logo"></a>
            <div class="nav1">
                <ul class="list">
                    <a href="index.php">
                        <li>Home</li>
                    </a>
                    <a href="about-us.php">
                        <li>About</li>
                    </a>
                    <!-- Writing code if person is login then shows profile otherwise show Register -->
                    <?php if(isset($_SESSION['id'])){ ?>
                    <a href="profile.php">
                       <li>Profile</li>
                    </a>
                    <?php }else{ ?>
                        <a href="register2.php">
                       <li>Register</li>
                    </a>
                    <?php } ?>

                    <!-- Ending here code Writing code if person is login then shows profile otherwise show Register -->


                     <!-- Writing code if person is login then shows Logout otherwise show Login -->

                     <?php if(isset($_SESSION['id'])){ ?>

                    <a href="logout.php">
                        <li>Log Out</li>
                    </a>
                    <?php }else{ ?>

                        <a href="login.php">
                        <li>Log In</li>
                    </a>
                    <?php } ?>

                    <a href="contact.php">
                        <li>Contact</li>
                    </a>
                </ul>
            </div>
        </div>