<?php
require('db.php');
session_start();
if(empty($_SESSION['id']) && empty($_SESSION['admin_code'])){
    header("Location:../index.php");
}else{

require('admin_logic.php');

// list of fees
if(isset($_GET['delFee'])){
    $fId = $_GET['delFee'];
    // echo $fId;
    $_SESSION['modalDelete'] = $_GET['delFee'];
    header("Location:../admin/admin_mg-fee.php");
    exit();
}

if(isset($_GET['confirmDelFee'])){
    $fee_id = $_GET['confirmDelFee'];

    $delFee = "DELETE FROM list_of_fees WHERE fee_id = '$fee_id'";
    $runDel = mysqli_query($conn, $delFee);
    if($runDel){
        header("Location:../admin/admin_mg-fee.php");
        exit();
    }else{
        $_SESSION['modalFailed'] = 'modalFailed';
        header("Location:../admin/admin_mg-fee.php");
    }
}

// general transactions

if(isset($_GET['delGen'])){
    $gId = $_GET['delGen'];
    // echo $gId;
    $_SESSION['modalDelGen'] = $_GET['delGen'];
    header("Location:../admin/admin_gen_log.php");
    exit();
}
if(isset($_GET['confirmDelGen'])){
    $genId = $_GET['confirmDelGen'];
    $delGen = "DELETE FROM general_transactions WHERE id = '$genId'";
    $run_delGen = mysqli_query($conn, $delGen);
    if($run_delGen){
        header("Location:../admin/admin_gen_log.php");
        exit();
    }else{
        echo 'error';
    }
}

if(isset($_GET['delUser'])){
    $userId = $_GET['delUser'];
    // echo $userId;
    $_SESSION['modalDelUser'] = $_GET['delUser'];
    header("Location:../admin/admin_mg-users.php");
    exit();
}

if(isset($_GET['confirmDelUser'])){
    $useID = $_GET['confirmDelUser'];
    $delUser = "DELETE FROM user_data WHERE student_id = '$useID'";
    $run_delUser = mysqli_query($conn, $delUser);
    if($run_delUser){
        header("Location:../admin/admin_mg-users.php");
        exit();
    }else{
        echo 'error in deleting user';
    }
}





}