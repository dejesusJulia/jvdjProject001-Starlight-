<?php
$superID = $_SESSION['id'];
$select1 = "SELECT * FROM super_admin WHERE sa_id = '$superID'";
$run1 = mysqli_query($conn, $select1);
if($run1){
    $fetch1 = mysqli_fetch_assoc($run1);
    $sa_prog = $fetch1['program'];
}else{
    echo 'error in fetching super_admin program';
}
// date
$numDate = date('Y-m-d');
$worDate = date('F j, Y');

// code generator
$admin_code = 'admin-code-' . rand(1000, 9999);

// fees
$select2 = "SELECT * FROM list_of_fees WHERE program = '$sa_prog'";
$run2 = mysqli_query($conn, $select2);
if($run2){
    // all fees
    $allFee = array(); $af = 0;
    while($fetchFee = mysqli_fetch_assoc($run2)){
        $allFee[$af] = array("fid"=>$fetchFee['fee_id'], "description"=>$fetchFee['description'], "deadline"=>$fetchFee['deadline'], "price"=>$fetchFee['price']);
        $af++;
    }
    // classifying
    $ctr = 0; $t = 0; $u = 0; $o = 0;
    $today = array(); $urgent = array(); $overdue = array();
    while($ctr < $af){
        if($numDate == $allFee[$ctr]['deadline']){
            $today[$t] = $allFee[$ctr]['description'];
            $u++;
        }else if($numDate < $allFee[$ctr]['deadline']){
            $urgent[$u] = $allFee[$ctr]['description'];
            $u++;
        }else{
            $overdue[$o] = $allFee[$ctr]['description'];
            $o++;
        }
        $ctr++;
    }
    
}else{
    echo 'error in run2';
}

// users
$select3 = "SELECT * FROM user_data WHERE program = '$sa_prog'";
$run3 = mysqli_query($conn, $select3);
if($run3){
    $allUser = array(); $au = 0;
    while($fetchUsers=mysqli_fetch_assoc($run3)){
        $allUser[$au] = array("uid"=>$fetchUsers['student_id'], "studentNum"=>$fetchUsers['student_num'], "yearSection"=>$fetchUsers['year_section'], "sname"=>$fetchUsers['surname'], "fname"=>$fetchUsers['first_name'], "email"=>$fetchUsers['email']);
        $au++;
    }
}else{
    echo 'error in run3';
}

// admins
$select4 = "SELECT * FROM admin_data WHERE program = '$sa_prog'";
$run4 = mysqli_query($conn, $select4);
if($run4){
    $allAdmin = array(); $aa = 0;
    while($fetchAdmin = mysqli_fetch_assoc($run4)){
        $allAdmin[$aa] = array("admin_id" => $fetchAdmin['admin_id'], "student_num" => $fetchAdmin['student_num'], "program" => $fetchAdmin['program'], "year_section" => $fetchAdmin['year_section'], "surname" => $fetchAdmin['surname'], "firstname" => $fetchAdmin['first_name'], "email" => $fetchAdmin['email']);
        $aa++;
    }
}else{
    echo 'error in run4';
}

