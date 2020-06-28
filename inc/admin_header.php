<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="../css/admin_dash.css">
    <link rel="stylesheet" href="../css/modify.css">
</head>
<body>
    <div class="admin-container">
        <header class="header">
            <div class="head">
                <div class="logo"></div>
                <h1 class="username"><?php echo $adSN;?></h1>
                <h2 class="pys"><?php echo $adPr . ' ' . $adYS;?></h2>
            </div>

            <nav class="nav-bar">
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="../admin/admin_home.php" class="nav-link activeL" id="nl1" >Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="../admin/admin_gen_log.php" class="nav-link" id="nl2">Transactions</a>
                    </li>
                    <li class="nav-item">
                        <a href="../admin/admin_mg-fee.php" class="nav-link" id="nl3">Manage Fees</a>
                    </li>
                    <li class="nav-item">
                        <a href="../admin/admin_mg-users.php" class="nav-link" id="nl4">Manage Users</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="../user/user_home.php" class="nav-link" id="nl5">User Account</a>
                    </li> -->
                </ul>
            </nav>

            <a href="../config/logout.php" class="signout">Sign Out</a>
        </header>

        <div id="toggle-btn" onclick="toggleSidebar()">
            <h1>&#9776;</h1>
        </div>