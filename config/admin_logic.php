<?php
require 'db.php';
// Get ADMIN DATA
$admID = $_SESSION['id']; $admCD = $_SESSION['admin_code'];
$selSN = "SELECT * FROM admin_data WHERE admin_id = '$admID' AND admin_code = '$admCD' LIMIT 1";
$queSN = mysqli_query($conn, $selSN);
if($queSN){
    $fetSN = mysqli_fetch_assoc($queSN);
    $adSN = $fetSN['student_num'];
    $adFN = $fetSN['first_name'];
    $adPr = $fetSN['program'];
    $adYS = $fetSN['year_section'];
}else{
    echo '$queSN query failed';
}

// DATE
$curDay = date('l');
$curDate = date('F j, Y');
$todayDue = date('Y-m-d');

// Get LIST OF FEES
$selLof = "SELECT * FROM list_of_fees WHERE year_section = '$adYS' AND program = '$adPr'";
$queLof = mysqli_query($conn, $selLof);
if($queLof){
    // list of fees (according to table order)
    $lof = array();
    $f = 0;
    while($fetLof = mysqli_fetch_assoc($queLof)){
        $lof[$f] = array("fid"=>$fetLof['fee_id'], "desc"=>$fetLof['description'], "deadline"=>$fetLof['deadline'], "price"=>$fetLof['price']);
        $f++;
    }

    // list of fees (according to due date)
    $d = 0; $td = 0; $yd = 0; $tmd= 0;
    $dueDesc = array();
    $overDesc = array();
    $urgDesc = array();
    while($d < $f){
        if($todayDue == $lof[$d]['deadline']){
            $dueDesc[$td] = array("desc" => $lof[$d]['desc'], "price" => $lof[$d]['price']);
            $td++;
        }else if($todayDue > $lof[$d]['deadline']){
           $overDesc[$yd] = array("desc" => $lof[$d]['desc'], "deadline" => $lof[$d]['deadline'], "price" => $lof[$d]['price']);
           $yd++;
        }else{
            $urgDesc[$tmd] = array("desc" => $lof[$d]['desc'], "deadline" => $lof[$d]['deadline'], "price" => $lof[$d]['price']);
            $tmd++;
        }
        $d++;
    }
}

// Get USERS' DATA
$selRegUsers = "SELECT * FROM user_data WHERE program = '$adPr' AND year_section = '$adYS'";
$queRegUsers = mysqli_query($conn, $selRegUsers);
if($queRegUsers){
    $regUsers = array();
    $ru = 0;
    // $ruCtr = 0;
    while($fetRegUsers = mysqli_fetch_assoc($queRegUsers)){
        $regUsers[$ru] = array("uid"=>$fetRegUsers['student_id'], "student_num"=>$fetRegUsers['student_num'], "sName"=>$fetRegUsers['surname'], "fName"=>$fetRegUsers['first_name'], "mName"=>$fetRegUsers['middle_name'], "email"=>$fetRegUsers['email'], "created_at"=>$fetRegUsers['created_at']);  

        $ru++;
    }
    
}else{
    echo '$queRegUsers query failed';
}

// Store USER IDs
$userArr = array();
$k = 0;
while($k<$ru){
    $userArr[$k] = $regUsers[$k]['uid'];
    $k++;
}

// Get GENERAL TRANSACTIONS
$genTrac = array(); $l = 0;
$err = 0;

$selectLog = "SELECT id, general_transactions.student_id, remitted, balance, status, date_paid, user_data.program, user_data.year_section, surname, description, deadline, price FROM general_transactions INNER JOIN user_data ON general_transactions.student_id = user_data.student_id INNER JOIN list_of_fees ON general_transactions.fee_id = list_of_fees.fee_id ORDER BY id";
$runLog = mysqli_query($conn, $selectLog);
if($runLog){
    while($fetchLog = mysqli_fetch_assoc($runLog)){
        if($fetchLog['program'] == $adPr && $fetchLog['year_section'] == $adYS){
            $genTrac[$l] = array("id" => $fetchLog['id'], "student_id" => $fetchLog['student_id'], "remitted" => intval($fetchLog['remitted']), "balance" => intval($fetchLog['balance']), "status" => $fetchLog['status'], "date_paid" => $fetchLog['date_paid'], "program" => $fetchLog['program'], "year_section" => $fetchLog['year_section'], "surname" => $fetchLog['surname'], "description" => $fetchLog['description'], "deadline" => $fetchLog['deadline'], "price" => intval($fetchLog['price'])); 
        }else{
            $err+=1;
        }
        $l++;
    }
}else{
    echo 'Error in inner join';
}

$sumArr = array(); $s = 0;
for($j = 0; $j < $l; $j++){
    $var = $genTrac[$j]['description'];
    if($sumArr == null){
        $sumArr[$s] = array("description" => $genTrac[$j]['description'], "remitted" => $genTrac[$j]['remitted'], "deadline" => $genTrac[$j]['deadline'], "price" => $genTrac[$s]['price']*$ru);
        $s++;
    }else if(in_array($var, array_column($sumArr, 'description'))){
        $key = array_search($var, array_column($sumArr, 'description'));
        $sumArr[$key]['remitted'] += $genTrac[$j]['remitted'];
    }else{
        $sumArr[$s] = array("description" => $genTrac[$j]['description'], "remitted" => $genTrac[$j]['remitted'], "deadline" => $genTrac[$j]['deadline'], "price" => $genTrac[$j]['price']*$ru);
        $s++;
    }
}
$amount = 0;
for($m = 0; $m < $s; $m++){
    $amount += $sumArr[$m]['remitted'];
}