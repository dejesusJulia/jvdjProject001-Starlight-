<?php
require 'db.php';

// user registration
if(isset($_POST['user_submit'])){
    $Ustudent_num = mysqli_real_escape_string($conn, $_POST['usn']);
    echo $Ustudent_num;
    $Uprog = mysqli_real_escape_string($conn, $_POST['upr']);
    echo $Uprog;
    $Uyear_section = mysqli_real_escape_string($conn, $_POST['uys']);
    // echo $Uyear_section;
    $Usurname = mysqli_real_escape_string($conn, $_POST['uln']);
    // echo $Usurname;
    $Ufirstname = mysqli_real_escape_string($conn, $_POST['ufn']);
    // echo $Ufirstname;
    $Umiddlename = mysqli_real_escape_string($conn, $_POST['umn']);
    // echo $Umiddlename;
    $Ugender = mysqli_real_escape_string($conn, $_POST['ug']);
    // echo $Ugender;
    $Ubday = mysqli_real_escape_string($conn, $_POST['ubday']);
    // echo $Ubday;
    $Uemail = mysqli_real_escape_string($conn, $_POST['uem']);
    // echo $Uemail;
    $Upass = mysqli_real_escape_string($conn, $_POST['upw']);
    // echo $Upass;

    if(!preg_match("/^[a-zA-Z0-9- --]*$/", $Ustudent_num) || !preg_match("/^[a-zA-Z0-9- -]*$/", $Usurname) || !preg_match("/^[a-zA-Z0-9- -]*$/", $Ufirstname) || !preg_match("/^[a-zA-Z0-9- -]*$/", $Umiddlename)){
        header("Location:index_register.php?error=invalidinput");
    }else{
        $Upass = md5($Upass);
        $Uins = "INSERT INTO user_data(student_num, program, year_section, surname, first_name, middle_name, gender, bday, email, pword) VALUES('$Ustudent_num', '$Uprog', '$Uyear_section', '$Usurname', '$Ufirstname', '$Umiddlename', '$Ugender', '$Ubday', '$Uemail', '$Upass')";

        $Uque = mysqli_query($conn, $Uins);
        if($Uque){
            header("Location:index.php");
        }else{
            die('Could not insert data');
        }
    }
    
}

if(isset($_POST['admin_submit'])){
    $Astudent_num = mysqli_real_escape_string($conn, $_POST['asn']);
    $Aadmincode = mysqli_real_escape_string($conn, $_POST['acd']);
    $Aprog = mysqli_real_escape_string($conn, $_POST['apr']);
    $Ayear_section = mysqli_real_escape_string($conn, $_POST['ays']);
    $Asurname = mysqli_real_escape_string($conn, $_POST['aln']);
    $Afirstname = mysqli_real_escape_string($conn, $_POST['afn']);
    $Amiddlename = mysqli_real_escape_string($conn, $_POST['amn']);
    $Agender = mysqli_real_escape_string($conn, $_POST['ag']);
    $Abday = mysqli_real_escape_string($conn, $_POST['abday']);
    $Aemail = mysqli_real_escape_string($conn, $_POST['aem']);
    $Apass = mysqli_real_escape_string($conn, $_POST['apw']);

    if(!preg_match("/^[a-zA-Z0-9- --]*$/", $Astudent_num) || !preg_match("/^[a-zA-Z0-9- -]*$/", $Asurname) || !preg_match("/^[a-zA-Z0-9- -]*$/", $Afirstname) || !preg_match("/^[a-zA-Z0-9- -]*$/", $Amiddlename)){
        header("Location:index_register.php?error=invalidformat");
    }else{
        $Apass = md5($Apass);

        $Ains = "INSERT INTO admin_data(student_num, admin_code, program, year_section, surname, first_name, middle_name, gender, bday, email, pword) VALUES('$Astudent_num', '$Aadmincode', '$Aprog', '$Ayear_section', '$Asurname', '$Afirstname', '$Amiddlename', '$Agender', '$Abday', '$Aemail', '$Apass')";

        $Aque = mysqli_query($conn, $Ains);
        if($Aque){
            // header("Location:index.php");
            echo 'admin success';
        }else{
           die('Could not insert admin');
        }
    }

}
