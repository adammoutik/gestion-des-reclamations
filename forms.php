<div class="form-container">
                <form method="POST" action="includes/register.in.php" class="forml">
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
                        if($_GET["error"] == "usernametaken"){
                            echo "<div class='error'>Username already taken !</div>";
                        }elseif($_GET["error"] == "success"){
                            echo "<div class='success'>Registered Successfully !</div>";
                        }elseif($_GET["error"] == "stmtfailed2"){
                            echo "<div class='error'>Creation failed !</div>";
                        }elseif($_GET["error"] == "invalidpwdform"){
                            echo "<div class='error'>weak password !</div>";
                        }elseif($_GET["error"] == "emptyinput"){
                            echo "<div class='error'>All fields are required !</div>";
                        }else{
                              echo "<div class='error'>Something Went wrong Try Again please !</div>";
                          }
                    }
                ?>
                <!-- image logo -->
                <img src="ressources/logo.png" alt="not found"/>
                    <!-- inputs -->
                    <div class="input-group">
                        <input type="text" name="username" class="input" placeholder="Username" required/>
                        <input type="password" name="password" class="input" placeholder="Password" required/>
                        <input type="text" name="fname" class="input" placeholder="firstName" required/>
                        <input type="text" name="lname" class="input" placeholder="lastName" required/>
                    </div>
                    <!-- Selection -->
                    <label for="department">Departement :</label>
                    <select name="department" required>
                        <option value="">----------SELECT OPTION------------</option>
                        <option value="5">IT</option>
                        <option value="3">HR</option>
                        <option value="4">STANDARD</option>
                        <option value="1">Finance</option>
                        <option value="2">Marketing</option>
                    </select>
                    <label for="role">Poste :</label>
                    <select name="role" required>
                        <option value="">----------SELECT OPTION------------</option>
                        <option value="chef">chef</option>
                        <option value="manager">manager</option>
                        <option value="employee">employee</option>
                    </select>
                    <!-- Button -->
                    <input type="submit" name="submit" class="btn" value="register" />
                <!-- Write your comments here -->
                <hr></hr>
                <!-- Write your comments here -->

                <p>Already Registered ? <span><a href="login.php" >Sign in here.</a></span></p></div>
                
            </form>
            </div>