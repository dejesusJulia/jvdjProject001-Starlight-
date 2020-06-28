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
            <h1>MANAGE FEES</h1>
            <h2><?php echo $adPr . ' ' . $adYS;?></h2>
        </div>
        
        <div class="content-wrap">
            <table class="tableMain">
                <th>FID</th>
                <th>DESCRIPTION</th>
                <th>PRICE</th>
                <th>DEADLINE</th>
                <th>MOD</th>

            <?php
            $a = 0;
            while($a < $f):
            ?>
                <tr>
                    <td><?php echo $lof[$a]['fid'];?></td>
                    <td><?php echo $lof[$a]['desc'];?></td>
                    <td><?php echo $lof[$a]['price'];?></td>
                    <td><?php echo $lof[$a]['deadline'];?></td>
                    <td>
                        <span class="tableMod">
                            <a href="../config/edit.php?editFee=<?php echo $lof[$a]['fid'];?>" class="edit-btn" >Edit</a>
                            <p>/</p>
                            <a href="../config/del.php?delFee=<?php echo $lof[$a]['fid'];?>" class="del-btn">Del</a>
                        </span>
                    </td>
                </tr>
            <?php
            $a++;
            endwhile
            ;?>
            </table>

            <div class="tableNav">
                <a href="" class="prev"></a>
                <a class="add-btn" href="../config/add.php?addFee">+</a>
                <a href="" class="nxt"></a>
            </div>

            
        </div>
    </div>

</div>
<!--NOTIFICATION MODAL-->
<!--EDIT MODAL-->
<?php
if(isset($_SESSION['modalEdit'])){
?>
<div id="modalEdit" class="modal">
    <div class="modal-content">
        <div class="panel-head"><h1>UPDATE</h1></div>
        <div class="form">
            <form action="../config/edit.php" method="post" class="formAddFee">
                <label for="description">Description</label>
                <input type="text" name="description" id="" class="modalinput" value="<?php echo $_SESSION['desc'];?>">

                <label for="deadline">Deadline</label>
                <input type="date" name="deadline" id="deadline" class="modalinput" value="<?php echo $_SESSION['deadline'];?>">

                <label for="price">Price</label>
                <input type="number" name="price" id="price" class="modalinput" value="<?php echo $_SESSION['price'];?>">

                <input type="hidden" name="updateID" value="<?php echo $_SESSION['modalEdit'];?>">

                <div class="checksave">
                    <input type="checkbox" name="" id="savechanges">
                    <label for="savechanges">Save Changes</label>
                </div>

                <input type="submit" value="Update" name="updateFee" class="upload-btn">

            </form>
            <a href="admin_mg-fee.php" class="cancel">Cancel</a>
        </div>
    </div>
</div>
<?php
// unset($_SESSION['modifyFee']);
unset($_SESSION['modalEdit']);
}
?>

<!--DELETE MODAL-->
<?php
if(isset($_SESSION['modalDelete'])):
?>
<div id="modalDelete" class="modal">
    <div class="modal-content">
    <div class="panel-head"><h1>DELETE</h1></div>
        <div class="modal-text">
            <p>Do you want to delete fee no. <?php echo $_SESSION['modalDelete'];?>?</p>
            <div class="panel-body">
                <a class="confirm" href="../config/del.php?confirmDelFee=<?php echo $_SESSION['modalDelete'];?>">Confirm</a>
                <a class="cancel" href="admin_mg-fee.php">Cancel</a>
            </div>
        </div>
    </div>
</div>
<?php
unset($_SESSION['modalDelete']);
endif;
?>

<!--ADD MODAL-->
<?php
if(isset($_SESSION['modalAdd'])):
?>
<div id="modalAdd" class="modal">
    <div class="modal-content">
        <div class="panel-head"><h1>ADD</h1></div>
        <div class="form">
            <form action="../config/add.php" method="post" class="formAddFee">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" class="modalinput" placeholder="enter one to three words for description" required>

                <label for="deadline">Deadline</label>
                <input type="date" name="deadline" id="deadline" class="modalinput" required>

                <label for="Price">Price</label>
                <input type="number" name="price" id="Price" class="modalinput" required>

                <div class="checksave">
                    <input type="checkbox" name="" id="savechanges" required>
                    <label for="savechanges">Save</label>
                </div>
                <input type="submit" value="Submit" name="add-fee" class="upload-btn">
            </form>
            <a href="admin_mg-fee.php" class="cancel">Cancel</a>
        </div>
    </div>
</div>
<?php
unset($_SESSION['modalAdd']);
endif;
?>

<!--success modal-->
<?php
if(isset($_SESSION['modalSuccess'])):
?>
<div id="modalSuccess" class="modal">
    <div class="modal-content">
        <div class="popup">
            <p>Success!</p>
            <a href="admin_mg-fee.php" class="okay">OK</a>
        </div>
    </div>
</div>
<?php
unset($_SESSION['modalSuccess']);
endif;
?>
<!--failed modal-->
<?php
if(isset($_SESSION['modalFailed'])):
?>
<div id="modalFailed" class="modal">
    <div class="modal-content">
        <div class="popup">
            <p>An error occured!</p>
            <a href="admin_mg-fee.php" class="okay">OK</a>
        </div>
    </div>
</div>
<?php
unset($_SESSION['modalFailed']);
endif;
?>
<script src="../js/adminMod"></script>
</body>
</html>

