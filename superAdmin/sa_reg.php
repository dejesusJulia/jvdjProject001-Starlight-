<?php
require('../config/db.php');
if(isset($_POST['submitSA'])){
    $student_num = mysqli_real_escape_string($conn, $_POST['student_num']);
    // echo $student_num . '<br>';

    $program = mysqli_real_escape_string($conn, $_POST['program']);
    // echo $program . '<br>';

    $surname = mysqli_real_escape_string($conn, $_POST['surname']);
    // echo $surname . '<br>';

    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    // echo $first_name . '<br>';

    $middle_name = mysqli_real_escape_string($conn, $_POST['middle_name']);
    // echo $middle_name . '<br>';

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    // echo $email . '<br>';

    $pword = mysqli_real_escape_string($conn, $_POST['pword']);
    // echo $pword . '<br>';
    $pword = md5($pword);
    $insert = "INSERT INTO super_admin(student_num, program, surname, first_name, middle_name, email, pword) VALUE('$student_num', '$program', '$surname', '$first_name', '$middle_name', '$email', '$pword')";

    $runInsert = mysqli_query($conn, $insert);
    if($runInsert){
        echo 'success';
    }else{
        echo 'error in insertion';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Super Admin</title>
</head>
<body>
    <form action="sa_reg.php" method="post">
        <input type="text" name="student_num" id="sn" placeholder="student number"> <br>

        <input type="text" name="program" id="p" placeholder="program"> <br>

        <input type="text" name="surname" id="ln" placeholder="surname"> <br>

        <input type="text" name="first_name" id="fn" placeholder="first name"> <br>

        <input type="text" name="middle_name" id="mn" placeholder="middle name"> <br>

        <input type="email" name="email" id="em" placeholder="email"> <br>

        <input type="password" name="pword" id="pw" placeholder="password"> <br>

        <input type="submit" value="Submit" name="submitSA">
    </form>
</body>
</html>