<?php
session_start();
if(empty($_SESSION['id']) && empty($_SESSION['admin_code'])){
    header("Location:../index.php");
}else{
    require '../config/admin_logic.php';
    include '../inc/admin_header.php';
    // echo 'login success';
}
?>
        <div id="dashboard-wrap">
            <div id="showcase">
                <h1>WELCOME, <?php echo strtoupper($adFN);?></h1>
                <h2><?php echo $curDay .", " . $curDate;?></h2>
            </div>

            <div class="dash-grid-wrap">
                <div class="dash-grid">
                    <div class="gridbox" id="box1">
                        <h3>Today</h3>
                        <?php for($x = 0; $x < $td; $x++):?>
                        <div class="box1-bar">
                            <div class="price-box1">
                                <h1><?php echo 'Php ' . $dueDesc[$x]['price'];?></h1>
                            </div>
                            <div class="description-box1">
                                <p><?php echo $dueDesc[$x]['desc'];?></p>
                            </div>
                        </div> 
                        <?php endfor;?>
                    </div>
                    <div class="gridbox" id="box2">
                        <!-- <h3>Priority</h3> -->
                        <div class="priority-list">
                            <h4>Upcoming</h4>
                            <ul>
                                <?php for($y = 0; $y < $tmd; $y++):?>
                                <li>
                                    <p><?php echo $urgDesc[$y]['desc'] . ' (' . $urgDesc[$y]['price'] . ')';?></p>
                                    <small><?php echo $urgDesc[$y]['deadline'];?></small>
                                </li>
                                <?php endfor;?>
                            </ul>
                        </div>
                        <div class="priority-list">
                            <h4>Overdue</h4>
                            <ul>
                                <?php for($z = 0; $z < $yd; $z++):?>
                                <li>
                                    <p><?php echo $overDesc[$z]['desc'] . ' (' . $overDesc[$z]['price'] . ' )';?></p>
                                    <small><?php echo $overDesc[$z]['deadline'];?></small>
                                </li>
                                <?php endfor;?>
                            </ul>
                        </div>
                    </div>
                    <div class="gridbox" id="box3">
                        <h1><?php echo $ru;?></h1>
                        <p>Registered Users</p>
                    </div>
                    <div class="gridbox" id="box4">
                        <h1><?php echo 'P' . $amount;?></h1>
                        <p>Collected Amount</p>
                    </div>
                    <div class="gridbox" id="box5">
                        <table id="feeSummary">
                            <th>Description</th>
                            <th>Deadline</th>
                            <th>Amount Collected</th>

                            <?php for($ctr = 0; $ctr < $s; $ctr++):?>
                            <tr>
                                <td><?php echo $sumArr[$ctr]['description'];?></td>
                                <td><?php echo $sumArr[$ctr]['deadline'];?></td>
                                <td><?php echo $sumArr[$ctr]['remitted'] . '/' . $sumArr[$ctr]['price'] ;?></td>
                            </tr>
                            <?php endfor;?>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <script src="../js/admindash.js"></script>
</body>
</html>