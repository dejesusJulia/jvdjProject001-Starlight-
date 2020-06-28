<?php
require 'config/register.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="regtest.php" method="post">
        <input type="text" name="usn" id="" placeholder="student number"><br>
        <select name="upr" id="">
            <option value="BSA">BSA</option>
            <option value="BBTE">BBTE</option>
            <option value="BSEE">BSEE</option>
            <option value="BSIE">BSIE</option>
            <option value="BSECE">BSECE</option>
            <option value="BSP">BSP</option>
            <option value="BSEnt">BSEnt</option>
            <option value="BSIT">BSIT</option>
        </select>

        <select name="uys" id="">
            <option value="1-1">1-1</option>
            <option value="1-2">1-2</option>
            <option value="2-1">2-1</option>
            <option value="2-2">2-2</option>
            <option value="3-1">3-1</option>
            <option value="3-2">3-2</option>
            <option value="4-1">4-1</option>
        </select>
        <br>

        <input type="text" name="uln" id="" placeholder="last name">
        <input type="text" name="ufn" id="" placeholder="first name">
        <input type="text" name="umn" id="" placeholder="middle name">
        <br>
        <select name="ug" id="">
            <option value="male">male</option>
            <option value="female">female</option>
            <option value="others">others</option>
        </select>
        <input type="date" name="ubday" id="">
        <br>
        <input type="email" name="uem" id="" placeholder="email">
        <input type="password" name="upw" id="" placeholder="password">

        <br>
        <input type="submit" value="submit" name="user_submit">
    </form>
    
</body>
</html>