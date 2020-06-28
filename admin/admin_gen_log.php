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
                <h1>LOGBOOK</h1>
                <h2>GENERAL TRANSACTIONS</h2>
            </div>

            <div class="content-wrap">
                <table class="tableMain">
                    <th>#</th>
                    <th>USER LN</th>
                    <th>PARTICULAR</th>
                    <th>REM</th>
                    <th>BAL</th>
                    <th>STAT</th>
                    <th>DATE</th>
                    <th>MOD</th>

                    <?php 
                    $a = 0;
                    while($a < $l):
                    ?>
                    <tr>
                        <td><?php echo $genTrac[$a]['id'];?></td>
                        <td><?php echo $genTrac[$a]['surname'];?></td>
                        <td><?php echo $genTrac[$a]['description'];?></td>
                        <td><?php echo $genTrac[$a]['remitted'];?></td>
                        <td><?php echo $genTrac[$a]['balance'];?></td>
                        <td><?php echo $genTrac[$a]['status'] == 1 ? 'paid': 'not paid' ;?></td>
                        <td><?php echo $genTrac[$a]['date_paid'];?></td>
                        <td>
                            <span class="tableMod">
                                <a href="../config/edit.php?editLog=<?php echo $genTrac[$a]['id'];?>" class="edit-btn">Edit</a>
                                <p>/</p>
                                <a href="../config/del.php?delGen=<?php echo $genTrac[$a]['id'];?>" class="del-btn">Del</a>
                            </span>
                        </td>
                    </tr>
                    <?php 
                    $a++;
                    endwhile;
                    ?>
                </table>

                <div class="tableNav">
                    <a name="prev" id="" class="prev" href="#"></a>
                    <a name="addLog" class="add-btn" href="../config/add.php?addLog">+</a>
                    <a name="nxt" id="" class="nxt" href="#"></a>
                </div>

            </div>
            
            
        </div>
    </div>

<!--notifcation modals-->
<!--edit modal-->
<?php
if(isset($_SESSION['modalEditGen'])):
?>
<div id="modalEditLog" class="modal">
    <div class="modal-content">
        <div class="panel-head"><h1>UPDATE</h1></div>
        <div class="form">
            <form action="../config/edit.php" method="post" class="formAddFee">
            <div class="form-group-3">
            <div class="input">
                <label for="uid">User ID</label>
                <select name="student_id" id="uid" class="modalinput">
                <?php
                $eu = 0;
                while($eu<$ru):
                    ($_SESSION['uid'] == $regUsers[$eu]['uid'])? $select_attr = 'selected' : $select_attr = '';
                ?>
                <option value="<?php echo $regUsers[$eu]['uid'];?>" <?php echo $select_attr;?>>
                <?php echo $regUsers[$eu]['uid'] . $regUsers[$eu]['sName'];?>
                </option>
                <?php
                $eu++;
                endwhile;
                ?>
                </select>
            </div>

            <div class="input">
                <label for="fid">Fee ID</label>
                <select name="fee_id" id="fid" class="modalinput">
                    <?php
                    $ei = 0;
                    while($ei < $f):
                        ($_SESSION['fid'] == $lof[$ei]['fid'])?$select_attr2 = 'selected': $select_attr2 = '';
                    ?>
                    <option value="<?php echo $lof[$ei]['fid'];?>" <?php echo $select_attr2;?>>
                    <?php echo $lof[$ei]['fid'] . $lof[$ei]['desc'];?>
                    </option>
                    <?php
                    $ei++;
                    endwhile;
                    ?>
                </select>
            </div>

            <div class="input">
                <label for="rem">Remitted</label>
                <input type="number" name="remitted" id="rem" class="modalinput" value="<?php echo $_SESSION['rem'];?>">
            </div>
            </div>

            <div class="form-group-3">
                <div class="input">
                    <label for="bal">Balance</label>
                    <input type="number" name="balance" id="bal" class="modalinput" value="<?php echo$_SESSION['bal'];?>">
                </div>

                <div class="input">
                    <label for="stat">Status</label>
                    <select name="status" id="stat" class="modalinput">
                        <?php
                        $true=1; $false=0;
                        if($_SESSION['stat'] == $true){
                            $select_true = 'selected';
                            $select_false = '';
                        }else{
                            $select_true = '';
                            $select_false = 'selected';
                        }
                        ?>
                        <option value="<?php echo $false;?>" <?php echo $select_false;?>>
                        not paid
                        </option>
                        <option value="<?php echo $true;?>"<?php echo $select_true;?>> 
                        paid
                        </option>
                    </select>
                </div>

                <div class="input">
                    <label for="date">Date</label>
                    <input type="date" name="date_paid" id="date" class="modalinput" value="<?php echo $_SESSION['date'];?>">
                </div>
            </div>

            <input type="hidden" name="updateIdlog" value="<?php echo $_SESSION['modalEditGen'];?>">

            <div class="checksave">
                <input type="checkbox" name="" id="savechanges" required>
                <label for="savechanges">Save Changes</label>
            </div>
            <input type="submit" value="Update" class="upload-btn" name="updateLog">
            </form>
            <a href="admin_gen_log.php" class="cancel">Cancel</a>
        </div>
    </div>
</div>
<?php
unset($_SESSION['modalEditGen']);
endif;
?>

<!--delete modal--> 
<?php
if(isset($_SESSION['modalDelGen'])):
?>
<div id="modalDelete" class="modal">
    <div class="modal-content">
    <div class="panel-head"><h1>DELETE</h1></div>
        <div class="modal-text">
            <p>Do you want to delete Log no. <?php echo $_SESSION['modalDelGen'];?>?</p>
            <div class="panel-body">
                <a href="../config/del.php?confirmDelGen=<?php echo $_SESSION['modalDelGen'];?>" class="confirm">Confirm</a>
                <a href="admin_gen_log.php" class="cancel">Cancel</a>
            </div>
        </div>
    </div>
</div>
<?php
unset($_SESSION['modalDelGen']);
endif;
?>

<!--add modal--> 
<?php 
if(isset($_SESSION['modalAddLog'])):
?>
<div id="modalAddLog" class="modal">
    <div class="modal-content">
        <div class="panel-head"><h1>ADD</h1></div>
        <div class="form">
            <form action="../config/add.php?addGen" method="post" class="formAddFee">
                <div class="form-group-3">
                    <div class="input">
                    <label for="uid">User ID</label>
                    <select name="student_id" id="uid" class="modalinput" required>
                        <?php
                        $uid = 0;
                        while($uid < $ru):
                        ?>
                        <option value="<?php echo $regUsers[$uid]['uid'];?>"><?php echo $regUsers[$uid]['uid'] .' '. $regUsers[$uid]['sName'];?></option>
                        <?php
                        $uid++;
                        endwhile;
                        ?>
                    </select>
                    </div>
                    
                   <div class="input">
                   <label for="fid">Fee ID</label>
                    <select name="fee_id" id="fid" class="modalinput" required>
                        <?php
                        $fid = 0;
                        while($fid < $f):
                        ?>
                        <option value="<?php echo $lof[$fid]['fid'];?>"><?php echo $lof[$fid]['fid'] .' '.$lof[$fid]['desc'];?></option>
                        <?php
                        $fid++;
                        endwhile;
                        ?>
                    </select>
                   </div>

                   <div class="input">
                    <label for="rem">Remitted</label>
                        <input type="number" name="remitted" id="rem" class="modalinput" required>
                    </div>
                </div>

                <div class="form-group-3">
                    <div class="input">
                    <label for="balance">Balance</label>
                        <input type="number" name="balance" id="" class="modalinput">
                    </div>

                    <div class="input">
                    <label for="status">Status</label>
                        <select name="status" id="" class="modalinput" required>
                            <option value="0">not paid</option>
                            <option value="1">paid</option>
                        </select>
                    </div>

                    <div class="input">
                    <label for="date">Date</label>
                        <input type="date" name="date_paid" id="" class="modalinput" required>
                    </div>
                </div>

                <div class="checksave">
                    <input type="checkbox" name="" id="savechanges" required>
                    <label for="savechanges">Save</label>
                </div>

                <input type="submit" value="Add Log" name="add-gen" class="upload-btn">

            </form>
            <a href="admin_gen_log.php" class="cancel">Cancel</a>
        </div>
    </div>
</div>
<?php
unset($_SESSION['modalAddLog']);
endif;
?>
    <script src="../js/admindash.js"></script>
</body>
</html>
