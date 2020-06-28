<?php
require('db.php');
session_start();
if(empty($_SESSION['id']) && empty($_SESSION['admin_code'])){
    header("Location:../index.php");
}else{
    require('admin_logic.php');

    $prog = $adPr;
    $ys = $adYS;
    // echo $prog . $ys;
    if(isset($_GET['addFee'])){
        $_SESSION['modalAdd'] = 'modalAdd';
        header("Location:../admin/admin_mg-fee.php");
    }

    if(isset($_POST['add-fee'])){
        $descr = mysqli_real_escape_string($conn, $_POST['description']);
        echo $descr;
        $deadline = mysqli_real_escape_string($conn, $_POST['deadline']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);

        $addFee = "INSERT INTO list_of_fees(description, year_section, program, deadline, price) VALUES ('$descr', '$ys', '$prog', '$deadline', '$price')";
        $run_fee = mysqli_query($conn, $addFee);
        if($run_fee){
            // $_SESSION['modalSuccess'] = 'modalSuccess';
            header("Location:../admin/admin_mg-fee.php");
            // exit();
        }else{
            // $_SESSION['modalFailed'] = 'modalFailed';
            header("Location:../admin/admin_mg-fee.php");
            // exit();
        }
    }

    if(isset($_GET['addLog'])){
        $_SESSION['modalAddLog'] = 'modalAddLog';
        header("Location:../admin/admin_gen_log.php");
    }

    if(isset($_POST['add-gen'])){
        $uid = mysqli_real_escape_string($conn, $_POST['student_id']);
        // echo $uid;
        $fid = mysqli_real_escape_string($conn, $_POST['fee_id']);
        // echo $fid;
        $rem = mysqli_real_escape_string($conn, $_POST['remitted']);
        $bal = mysqli_real_escape_string($conn, $_POST);
        $stat  = mysqli_real_escape_string($conn, $_POST['status']);
        $date = mysqli_real_escape_string($conn, $_POST['date_paid']);

        $addLog = "INSERT INTO general_transactions(student_id, fee_id, remitted, balance, status, date_paid) VALUES('$uid', '$fid', '$rem', '$bal', '$stat', '$date')";
        $runlog = mysqli_query($conn, $addLog);
        if($runlog){
            header("Location:../admin/admin_gen_log.php");
            exit();
        }else{
            echo 'error';
        }
    }
    
}