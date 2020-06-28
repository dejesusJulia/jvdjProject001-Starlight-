<?php
$conn = mysqli_connect('localhost', 'root', '@localhost', 'treasury');

if(mysqli_connect_errno()){
    echo 'Failed to connect to MySQL' . mysqli_connect_errno();
}else{
    // echo 'connection success';
}