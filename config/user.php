<?php
require 'db.php';

$select  = "SELECT remitted, balance, status, date_paid, description FROM general_transactions INNER JOIN list_of_fees ON general_transactions.fee_id = list_of_fees.fee_id WHERE general_transactions.student_id = '4'";

$query = mysqli_query($conn, $select);
if($query){
    $gtArr = array(); $g = 0; 
    while($fetch = mysqli_fetch_assoc($query)){
        // echo '<pre>';
        // var_dump($fetch);
        // echo '</pre>';
        $gtArr[$g] = array("remitted" => $fetch['remitted'], "balance" => $fetch['balance'], "status" => $fetch['status'], "date_paid" => $fetch['date_paid'], "description" => $fetch['description']);
        $g++;

    }
    // $fetch = mysqli_fetch_assoc($query);
    // echo $fetch[2]['balance'];
}else{
    echo 'error!';
}
print_r($gtArr);