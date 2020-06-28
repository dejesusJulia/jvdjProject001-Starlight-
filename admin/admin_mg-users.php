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
    <div id="showcase1">
        <h1>MANAGE USERS</h1>
        <h2><?php echo $adPr . ' ' . $adYS;?></h2>
    </div>

    <div class="content-wrap">
        <table class="tableMain">
            <th>UID</th>
            <th>STUDENT NUM</th>
            <th>L. NAME</th>
            <th>F. NAME</th>
            <th>EMAIL</th>
            <th>MOD</th>

            <?php
            $a = 0;
            while($a < $ru):
            ?>
            <tr>
                <td><?php echo $regUsers[$a]['uid'];?></td>
                <td><?php echo $regUsers[$a]['student_num'];?></td>
                <td><?php echo $regUsers[$a]['sName'];?></td>
                <td><?php echo $regUsers[$a]['fName'];?></td>
                <td><?php echo $regUsers[$a]['email'];?></td>
                <td>
                    <span class="tableMod">
                        <a href="../config/del.php?delUser=<?php echo $regUsers[$a]['uid'];?>" class="del-btn">Delete</a>
                    </span>
                </td>
            </tr>
            <?php
            $a++;
            endwhile;
            ?>
        </table>
    </div>
</div>

<!--NOTIFICATION MODAL-->
<!--delete modal-->
<?php
if(isset($_SESSION['modalDelUser'])):
?>
<div id="modalDelete" class="modal">
    <div class="modal-content">
        <div class="panel-head"><h1>DELETE</h1></div>
        <div class="modal-text">
            <p>Do you want to delete user no. <?php echo $_SESSION['modalDelUser'];?></p>
            <div class="panel-body">
                <a href="../config/del.php?confirmDelUser=<?php echo $_SESSION['modalDelUser'];?>" class="confirm">Confirm</a>
                <a href="admin_mg-users.php" class="cancel">Cancel</a>
            </div>
        </div>
    </div>
</div>
<?php
unset($_SESSION['modalDelUser']);
endif;
?>
<script src="../js/adminMod"></script>
</body>
</html>

