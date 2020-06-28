<?php
require 'db.php';

if(isset($_POST['login-btn'])){
    $studentNum = mysqli_real_escape_string($conn, $_POST['studentNum']);
    // echo $studentNum;
    $pword = mysqli_real_escape_string($conn, $_POST['pword']);

    $pword = md5($pword);
    $selectUD = "SELECT * FROM user_data WHERE student_num = '$studentNum' LIMIT 1";
    $queryUD = mysqli_query($conn, $selectUD);
    $fetchUD = mysqli_fetch_assoc($queryUD);

    if($fetchUD){
        // User
        if($studentNum == $fetchUD['student_num']){
            if($pword == $fetchUD['pword']){
                session_start();
                $_SESSION['id'] = $fetchUD['student_id'];
                // echo "Welcome, user " . $_SESSION['id'];
                header("Location:user/user-home.php");
            }else{
                header("Location:index.php?error=invaliduserpass");
            }
        }else{
            header("Location:index.php?error=invalidusername");
        }
        // Admin
    }else if(!$fetchUD){
        $selectAD = "SELECT * FROM admin_data WHERE student_num = '$studentNum' LIMIT 1";
        $queryAD = mysqli_query($conn, $selectAD);
        $fetchAD = mysqli_fetch_assoc($queryAD);

        if($fetchAD){
            if($studentNum == $fetchAD['student_num']){
                if($pword == $fetchAD['pword']){
                    session_start();
                    $_SESSION['id'] = $fetchAD['admin_id'];
                    $_SESSION['admin_code'] = $fetchAD['admin_code'];
                    header("Location:admin/admin_home.php");
                    // echo "Welcome, admin " . $_SESSION['id'] . " code " . $_SESSION['admin_code'];
                }else{
                    header("Location:index.php?error=invalidadminpass");
                }
            }else{
                header("Location:inedx.php?error=invalidadminname");
            }
        }else if(!$fetchAD){
            $selectSAD = "SELECT * FROM super_admin WHERE student_num = '$studentNum' LIMIT 1";
            $querySAD = mysqli_query($conn, $selectSAD);
            $fetchSAD = mysqli_fetch_assoc($querySAD);

            if($studentNum == $fetchSAD['student_num']){
                if($pword == $fetchSAD['pword']){
                    session_start();
                    $_SESSION['id'] = $fetchSAD['sa_id'];
                    header("Location:superAdmin/sa_dash.php");
                    // echo 'Welcome, super_admin ' . $_SESSION['id'];
                }else{
                    header("Location:index.php?error=invalidSApass");
                }
            }else{
                header("Location:index.php?error=invalidSAname");
            }
        }
    }else{
        header("Location:index.php?error=userdoesnotexist");
    }
}