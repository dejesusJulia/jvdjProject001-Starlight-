<?php
require('../config/db.php');
session_start();
if(empty($_SESSION['id'])){
    header("Location:../index.php");
}else{
    include('../config/sa_logic.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super admin</title>
    <link rel="stylesheet" href="sa_style.css">
</head>
<body>
    <header id="header">
        <nav id="nav">
            <ul class="sidenav">
                <li class="sidenav-item" id="dashLink">
                    DASHBOARD
                </li>

                <li class="sidenav-item" id="logLink">
                    LOGBOOK
                </li>

                <li class="sidenav-item" id="lofLink">
                    LIST OF FEES
                </li>

                <li class="sidenav-item" id="adminLink">
                    ADMIN
                </li>
            </ul>
        </nav>

        <a href="../config/logout.php">Sign out</a>
    </header>

    <div id="container">
        <div id="dashboard">
            <div id="grid1">
                <div class="grid1-box" id="acGen">
                    <label for="ac">Admin Code</label>
                    <input type="text" id="ac" value="<?php echo $admin_code;?>" readonly>
                    <a href="sa_dash.php" class="a-btn">Generate</a>
                </div>

                <div class="grid1-box" id="">
                    <h1>User Count</h1>
                    <h2><?php echo $au;?></h2>
                </div>

                <div class="grid1-box" id="">

                </div>
            </div>
        </div>

        <div id="logbook">

        </div>

        <div id="lof">

        </div>

        <div id="admin">

        </div>
    </div>
    
</body>
</html>