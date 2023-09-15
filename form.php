
            <div class="form-container">
                <form method="POST" action="includes/login.inc.php" class="forml">
                <div className="img"></div>
                <style>
                    .error {
                            color: #A52A2A;
                            font-size: 0.7rem;
                            padding: 5px;
                            background-color: rgb(28,28,30);
                            border-radius: 5px;
                            }
                    .success {
                            color: green;
                            font-size: 0.7rem;
                            padding: 5px;
                            background-color: rgb(28,28,30);
                            border-radius: 5px;
                            }
                    

                </style>
                <?php
                    if(isset($_GET['error'])){
                        if($_GET['error'] == 'emptyinput'){
                            echo '<div class="error">Empty fields are not allowed !</div>';
                        }elseif($_GET['error'] == "wronglogin" || $_GET['error'] == "wrongpwd"){
                            echo "<div class='error'>wrong password or username !</div>";
                        }elseif($_GET["error"] == "invalidusername"){
                            echo "<div class='error'>Invalid user !</div>";
                        }elseif($_GET["error"] == "emptyinput"){
                            echo "<div class='error'>All fields are required !</div>";
                        }elseif($_GET["error"] == "invalidpwd"){
                            echo "<div class='error'>Invalid password form !</div>";
                        }else{
                                echo "<div class='error'>Something Went wrong Try Again please !</div>";
                            }
                    }elseif(isset($_GET['success'])){
                        if($_GET['success'] == 'registered'){
                            echo "<div class='success'>You have successfully registered! Please login to continue!</div>";
                        }
                    }
                ?>
                <img src="ressources/logo.png" alt="not found"/>
                <div class="input-group">
                <input type="text" name="username" class="input" placeholder="Username"/>
                <input type="password" name="password" class="input" placeholder="Password"/>
                </div>
                <div className="login-btn">
                    <input type="submit" name="submit" class="btn" placeholder="Password" value="login" />
                </div>
                <hr></hr>
                <p>Not Registered ? <span><a href="register.php" >Signup here.</a></span></p>
            </form></div>
			