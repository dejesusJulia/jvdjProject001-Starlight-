<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="stylesheet" href="../css/user_dash.css">
</head>
<body>
    <header id="header">
        <div id="showcase">
            <!-- <h3 class="burger-menu">&#9776;</h3> -->
            <div class="showcase-text">
                <h1> Welcome,  <?php echo $userArr['first_name'];?>!</h1>
                <h3><?php echo $userArr['student_num'];?></h3>
                <h3><?php echo $userPr . ' ' .$userYS;?></h3>
            </div>
            
        </div>
        <nav id="navbar">
            <ul class="nav-list">
                <li class="nav-item active" id="dashlink">
                    <a href="#" class="nav-link">DASHBOARD</a>
                </li>

                <li class="nav-item" id="sumlink">
                    <a href="#" class="nav-link">SUMMARY</a>
                </li>

                <li class="nav-item" id="profilelink">
                    <a href="#" class="nav-link">PROFILE</a>
                </li>
                <li class="nav-item">
                    <a href="../config/logout.php" class="nav-link">SIGN OUT</a>
                </li>
            </ul>    
        </nav>
    </header>