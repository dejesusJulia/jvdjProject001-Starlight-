<?php
    include('config/login.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Register</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway|Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fontawesome.com/icons/eye?style=solid">
    <script src="https://kit.fontawesome.com/83e68d843d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- wrapper for sliding images -->
    <div class="main-page-wrap">
        <!-- wrapper for translucent black background -->
        <div class="sub-page-wrap">
            <!-- content -->
           <div class="container">
               <!-- flex box (welcome and login) -->
               <div class="start-wrap">
                <!-- welcome text -->
                <div class="box description">
                    <h1 class="start-heading">WELCOME!</h1>
                    <p>Starlight Finances aims to ease financial transactions in your organization. SIGN UP NOW!</p>
                </div>

                <!-- login box -->
                <div class="box login">
                <div class="pic-box"><!--avatar-->
                    <img src="images/undraw_profile_pic_ic5t.png" width="100px" class="img-login">
                </div>
              <!--form-->
                <form action="index.php" class="start-form" method="post">
                    <div class="start-form-group">
                        <label>USERNAME</label>
                        <input type="text" placeholder="enter student number" id="sn" name="studentNum">
                    </div>
                    <div class="start-form-group">
                        <label>PASSWORD</label>
                        <div class="pass">
                            <input type="password" placeholder="enter password" id="pw" name="pword">
                            <div id="showpass"> <i class="fas fa-eye"id="eye" id="eye" ></i> </div>
                        </div>
                    </div>
                    <div class="start-form-group">
                        <input type="submit" value="LOGIN" class="btn" name="login-btn">
                    </div>
            
                    <div>Not yet registered? <span class="reg-link"><a href="index_register.php" id="register-link">Register now.</a></span></div>
                </form><!--end of form-->
                </div> <!-- end of login box -->
               </div>
           </div> 
        </div>
    </div>
    <script src="js/main.js">
        // alert(1);
    </script>
</body>
</html>