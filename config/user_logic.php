<?php
require 'db.php';
$todayDate = date('Y-m-d');
// user data
$userID = $_SESSION['id'];
$select = "SELECT * FROM user_data WHERE student_id = '$userID' LIMIT 1";
$que = mysqli_query($conn, $select);
if($que){
    $fetSN = mysqli_fetch_assoc($que);
    // decrypt password
    $oldPass = $fetSN['pword'];
    // editable user info
    $userArr = array("student_id" => $fetSN['student_id'], "student_num" => $fetSN['student_num'], "surname"=> $fetSN['surname'], "first_name" => $fetSN['first_name'], "middle_name" =>$fetSN['middle_name'], "gender" => $fetSN['gender'], "bday" => $fetSN['bday'], "email" => $fetSN['email'], "pword" => $oldPass);

    $userPr = $fetSN['program'];
    $userYS = $fetSN['year_section'];
}else{
    echo 'error!';
}

// DASHBOARD
$select2 = "SELECT * FROM list_of_fees WHERE year_section = '$userYS' AND program = '$userPr'";
$que2 = mysqli_query($conn, $select2);
if($que2){
    // due today array
    $todayArr = array(); $tA = 0;
    // upcoming array
    $upcomingArr = array(); $uA = 0;
    // overdue array
    $overdueArr = array(); $oA = 0;

    // fetch
    while($fetFee = mysqli_fetch_assoc($que2)){
        if($todayDate == $fetFee['deadline']){
            $todayArr[$tA] = array("fee_id" => $fetFee['fee_id'], "description" => $fetFee['description'], "deadline" => $fetFee['deadline'], "price" => $fetFee['price']);
            $tA++;
        }else if($todayDate < $fetFee['deadline']){
            $upcomingArr[$uA] = array("fee_id" => $fetFee['fee_id'], "description" => $fetFee['description'], "deadline" => $fetFee['deadline'], "price" => $fetFee['price']);
            $uA++; 
        }else{
            $overdueArr[$oA] = array("fee_id" => $fetFee['fee_id'], "description" => $fetFee['description'], "deadline" => $fetFee['deadline'], "price" => $fetFee['price']);
            $oA++;
        }
    }

    // if today's due is available
    if($tA > 0){
        $_SESSION['tsAvailable'] = 'tsAvailable';
    }else{
        $_SESSION['tsUnavailable'] = 'tsUnavailable';
    }

    // if upcoming is available
    if($uA > 0){
        $_SESSION['usAvailable'] = 'usAvailable';
    }else{
        $_SESSION['usUnavailable'] = 'usUnavailable';
    }

    // if overdue is available
    if($oA > 0){
        $_SESSION['osAvailable'] = 'osAvailable';
    }else{
        $_SESSION['osUnavailable'] = 'osUnavailable';
    }
}else{
    echo 'error in fetching fees';
}

// SUMMARY
$select3 = "SELECT remitted, balance, status, date_paid, description, price FROM general_transactions INNER JOIN list_of_fees ON general_transactions.fee_id = list_of_fees.fee_id WHERE general_transactions.student_id = '$userID'";
$que3 = mysqli_query($conn, $select3);
if($que3){
    $gtArr = array(); $gt = 0;
    while($fet3 = mysqli_fetch_assoc($que3)){
        $gtArr[$gt] = array("remitted" => $fet3['remitted'], "balance" => $fet3['balance'], "status" => $fet3['status'], "date_paid" => $fet3['date_paid'], "description" => $fet3['description'], "price" => $fet3['price']);
        $gt++;
    }
}else{
    echo 'Error';
}

// PROFILE
// personal profile
if(isset($_POST['updateProfile'])){
    $newSN = mysqli_real_escape_string($conn, $_POST['studentNum']);
    $newSur = mysqli_real_escape_string($conn, $_POST['surname']);
    $newFN = mysqli_real_escape_string($conn, $_POST['firstName']);
    $newMN = mysqli_real_escape_string($conn, $_POST['middleName']);
    $newGen = mysqli_real_escape_string($conn, $_POST['gender']);
    $newBday = mysqli_real_escape_string($conn, $_POST['bday']);
    $newEm = mysqli_real_escape_string($conn, $_POST['email']);
    $updateId = mysqli_real_escape_string($conn, $_POST['updateID']);

    if(!preg_match("/^[a-zA-Z0-9- --]*$/", $newSN) || !preg_match("/^[a-zA-Z0-9- --]*$/", $newSur) || !preg_match("/^[a-zA-Z0-9- --]*$/", $newFN) || !preg_match("/^[a-zA-Z0-9- --]*$/", $newMN)){
        header("Location:user/user-home.php?error=invalidinput");
    }else{
        // echo 'success!';
        $update1 = "UPDATE user_data SET 
            student_num = '$newSN',
            surname = '$newSur',
            first_name = '$newFN',
            middle_name = '$newMN',
            gender = '$newGen',
            bday = '$newBday',
            email = '$newEm'
            WHERE student_id = '$updateId'";
        $runUpdate1 = mysqli_query($conn, $update1);
        if($runUpdate1){
            header("Location: user/user-home.php");
            exit();
        }else{
            header("Location: user/user-home.php?updatefailed");
            exit();
        }
    }
}
// password
if(isset($_POST['updatePass'])){
    $newPword = mysqli_real_escape_string($conn, $_POST['pword']);
    $newCpw = mysqli_real_escape_string($conn, $_POST['cpw']);
    $updateId2 = mysqli_real_escape_string($conn, $_POST['updateID2']);

    if(!preg_match("/^[a-zA-Z0-9- --]*$/", $newPword) || !preg_match("/^[a-zA-Z0-9- --]*$/", $newCpw)){
        header("Location: user/user-home.php?error=invalidinput");
    }else if($newPword != $newCpw){
        header("Location: user/user-home.php?error=inputmismatch");
    }else{
        // echo 'success';
        $newPass = md5($newPword);
        $update2 = "UPDATE user_data SET pword = '$newPass' WHERE student_id = '$updateId2'";
        $runUpdate2 = mysqli_query($conn, $update2);
        if($runUpdate2){
            header("Location: user-home.php");
            exit();
        }else{
            header("Locatio: user-home.php?updatefailed");
        }
    }
}
