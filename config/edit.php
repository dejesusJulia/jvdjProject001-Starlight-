<?php
require('db.php');
session_start();
if(empty($_SESSION['id']) && empty($_SESSION['admin_code'])){
    header("Location:index.php");
}else{
    require('admin_logic.php');

    $prog = $adPr;
    $ys = $adYS;

    if(isset($_GET['editFee'])){
        $editID = $_GET['editFee'];
        $_SESSION['modalEdit'] = $_GET['editFee'];
        // include('modify.php');
        // header("Location:../admin/admin_mg-fee.php");
        // exit();
        $edit = "SELECT * FROM list_of_fees WHERE fee_id = '$editID'";
        $run_edit = mysqli_query($conn, $edit);
        $fetch_edit = mysqli_fetch_assoc($run_edit);
        $_SESSION['desc'] = $fetch_edit['description'];
        $_SESSION['deadline'] = $fetch_edit['deadline'];
        $_SESSION['price'] = $fetch_edit['price'];
        header("Location:../admin/admin_mg-fee.php");
        exit();
       
    }


    if(isset($_POST['updateFee'])){
        $desc = mysqli_real_escape_string($conn, $_POST['description']);
        // echo $desc;
        $deadline = mysqli_real_escape_string($conn, $_POST['deadline']);
        // echo $deadline;
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        // echo $price;
        $updateID = mysqli_real_escape_string($conn, $_POST['updateID']);

        $update = "UPDATE list_of_fees SET description = '$desc', deadline = '$deadline', price = '$price' WHERE fee_id = '$updateID'";

        $run_update = mysqli_query($conn, $update);
        if($run_update){
            header("Location: ../admin/admin_mg-fee.php");
            exit();
        }else{
            echo 'Error in updating';
        }
    }

    if(isset($_GET['editLog'])){
        $logID = $_GET['editLog'];
        $_SESSION['modalEditGen'] = $_GET['editLog'];
        $gt = "SELECT * FROM general_transactions WHERE id = '$logID'";
        $run_update_log = mysqli_query($conn, $gt);
        if($run_update_log){
            $fetch_log = mysqli_fetch_assoc($run_update_log);
            $_SESSION['uid'] = $fetch_log['student_id'];
            $_SESSION['fid'] = $fetch_log['fee_id'];
            $_SESSION['rem'] = $fetch_log['remitted'];
            $_SESSION['bal'] = $fetch_log['balance'];
            $_SESSION['stat'] = $fetch_log['status'];
            $_SESSION['date'] = $fetch_log['date_paid'];
            header("Location:../admin/admin_gen_log.php");
            exit();
        }
    }

    if(isset($_POST['updateLog'])){
        $uid = mysqli_real_escape_string($conn, $_POST['student_id']);
        // echo $uid;
        $fid = mysqli_real_escape_string($conn, $_POST['fee_id']);
        // echo $fid;
        $rem = mysqli_real_escape_string($conn, $_POST['remitted']);
        $bal = mysqli_real_escape_string($conn, $_POST['balance']);
        $stat = mysqli_real_escape_string($conn, $_POST['status']);
        $date = mysqli_real_escape_string($conn, $_POST['date_paid']);
        $hidID = mysqli_real_escape_string($conn, $_POST['updateIdlog']);

        $updategt = "UPDATE general_transactions SET student_id = '$uid', fee_id = '$fid', remitted = '$rem', balance = '$bal', status = '$stat', date_paid = '$date' WHERE id = '$hidID'";

        $runLog = mysqli_query($conn, $updategt);
        if($runLog){
            // echo 'success!';
            header("Location:../admin/admin_gen_log.php");
            exit();
        }else{
            echo 'Error';
        }

    }






}
