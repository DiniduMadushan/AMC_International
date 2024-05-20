<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <link rel="stylesheet" href="css/login.css">

</head>
<body>
    <div id="loginPageBody">

                    <?php

                            $alert="";

                        if (isset($_GET['status'])) {

                            if ($_GET['status'] == 0) {
                              $alert="<p style='text-align:center;color:red'>Please fill all the fields..!</p>";
                            }elseif ($_GET['status'] == 1) {
                              $alert="<p style='text-align:center;color:red'>Please fill all the fields..!</p>";
                            }
                            elseif ($_GET['status'] == 2) {
                              $alert="<p style='text-align:center;color:red'>Please Enter correct username and password..!</p>";
                            }
                            
                        }
                    ?>

        <div class="wrapper">
            <form action="admin panel/controller/login.php" method="post">
              <h1>Login</h1>
              <?= $alert ?>
              <div class="input-box">
                <input type="email" name="email" placeholder="Email" required/>
                <i class='bx bxs-user'></i>
              </div>
              <div class="input-box">
                <input type="password" name="password" placeholder="Password" required/>
                <i class='bx bxs-lock-alt' ></i>
              </div>
              <div class="remember-forgot">
                <label><input type="checkbox"/>Remember Me</label>
                <a href="#">Forgot Password</a>
              </div>
              <button type="submit" class="btn">Login</button>
              <div class="register-link">
                <p>Dont have an account? Register</p>
              </div>
            </form>
          </div>
        
          </div>
    
</body>
</html>