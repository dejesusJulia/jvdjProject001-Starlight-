<?php
session_start();
if(empty($_SESSION['id'])){
    header("Location:../index.php");
}else{
    require '../config/user_logic.php';
    include '../inc/user_header.php';
}
?>
    <!-- DASHBOARD -->
    <div class="container" id="dashCont">
        <!-- start of main section -->
        <section id="main-section">
            <!-- today section -->
            <h2>Today</h2>
            <div class="ms-box" id="today-sec">
                <?php if(isset($_SESSION['tsAvailable'])):?>
                <?php for($t = 0; $t < $tA; $t++):?>
                    <div class="ts-item-box">
                        <h2 class="ts-price"><?php echo 'Php ' .$todayArr[$t]['price'];?></h2>
                        <div class="ts-item-box-sub">
                            <h3 class="ts-desc"><?php echo $todayArr[$t]['description'];?></h3>
                            <small class="ts-date"><?php echo $todayArr[$t]['deadline'];?></small>
                        </div>
                    </div>
                <?php endfor;?>
                <?php unset($_SESSION['tsAvailable']);
                endif; ?>
                <?php if(isset($_SESSION['tsUnavailable'])):?>
                    <div class="ts-item-box" id="ts-unavailable">
                        <h2>Not Available</h2>
                    </div>
                <?php unset($_SESSION['tsUnavailable']);
                endif;?>
            </div>

            <!-- upcoming section -->
            <h2>Upcoming</h2>
            <div class="ms-box" id="upcoming-sec">
                <?php if(isset($_SESSION['usAvailable'])):?>
                <?php for($u = 0; $u < $uA; $u++):?>
                    <div class="us-item-box" id="us-available">
                        <h2 class="us-price"><?php echo 'Php '.$upcomingArr[$u]['price'];?></h2>
                        <div class="us-item-box-sub">
                            <h3 class="us-desc"><?php echo $upcomingArr[$u]['description'];?></h3>
                            <small class="us-date"><?php echo $upcomingArr[$u]['deadline'];?></small>
                        </div>
                    </div> 
                <?php endfor;?>
                <?php unset($_SESSION['usAvailable']);
                endif; ?>
                <?php if(isset($_SESSION['usUnavailable'])):?>
                    <div class="us-item-box" id="us-unavailable">
                        <h2>Not Available</h2>
                    </div>
                <?php unset($_SESSION['usUnavailable']); 
                endif;?>
            </div>
        </section>
        <!-- end of main section -->

        <aside id="overdue-section" class="aside">
            <h3>Overdue</h3>
            <?php if(isset($_SESSION['osAvailable'])):?>
            <ul class="overdue-list">
                <?php for($o = 0; $o < $oA; $o++):?>
                    <li class="overdue-list-item">
                        <p class="oli-desc"><?php echo $overdueArr[$o]['description'];?></p>
                        <small class="oli-fee"><?php echo 'Php'. $overdueArr[$o]['price'];?></small>
                    </li>
                <?php endfor;?>
            </ul>
            <?php unset($_SESSION['osAvailable']);
            endif;?>
            <?php if(isset($_SESSION['osUnavailable'])):?>
                <div class="os-item-box" id="os-unavailable">
                    <h2>Not Available</h2>
                </div>
            <?php unset($_SESSION['osUnavailable']);
            endif;?>
        </aside>       
    </div>

    <!-- SUMMARY -->
    <div class="container" id="summaryCont">
        <table class="table-sum">
            <th>Description</th>
            <th>Price</th>
            <th>Remitted</th>
            <th>Balance</th>
            <th>Status</th>
            <?php for($s = 0; $s < $gt; $s++):?>
            <tr>
                <td><?php echo $gtArr[$s]['description'];?></td>
                <td><?php echo $gtArr[$s]['price'];?></td>
                <td><?php echo $gtArr[$s]['remitted'];?></td>
                <td><?php echo $gtArr[$s]['balance'];?></td>
                <td>
                    <?php echo ($gtArr[$s]['status'] == 1) ? 'Paid': 'Not Paid';?>
                    <?php ?>
                </td>
            </tr>
            <?php endfor;?>
        </table>
    </div>

    <div class="container" id="editProf">
        <form action="user-home.php" method="post" id="editOne">
            <h3>Edit Profile</h3>
            <div class="form-field">
                <label for="studentnum">Student Number <small>*</small></label>
                <input type="text" name="studentNum" id="studentnum" value="<?php echo $userArr['student_num'];?>" required>
            </div>
            <div class="form-field">
                <label for="surname">Surname <small>*</small></label>
                <input type="text" name="surname" id="surname" value="<?php echo $userArr['surname'];?>" required>
            </div>
            <div class="form-field">
                <label for="firstname">First Name <small>*</small></label>
                <input type="text" name="firstName" id="firstname" value="<?php echo $userArr['first_name'];?>" required>
            </div>
            <div class="form-field">
                <label for="middlename">Middle Name</label>
                <input type="text" name="middleName" id="middlename" value="<?php echo $userArr['middle_name'];?>">
            </div>
            <div class="form-field">
                <label for="gender">Gender <small>*</small></label>
                <select name="gender" id="gender" required>
                    <?php
                    $gender = array('Male', 'Female', 'Others');
                    for($g = 0; $g < count($gender); $g++):
                    ?>
                        <option value="<?php echo $gender[$g];?>" <?php echo ($gender[$g] == $userArr['gender'])? 'selected' : ' ' ;?>><?php echo $gender[$g];?></option>
                    <?php endfor;?>
                </select>
            </div>

            <div class="form-field">
                <label for="bday">Birthdate <small>*</small></label>
                <input type="date" name="bday" id="bday" value="<?php echo $userArr['bday'];?>" required>
            </div>

            <div class="form-field">
                <label for="email">Email <small>*</small></label>
                <input type="email" name="email" id="email" value="<?php echo $userArr['email'];?>" required>
            </div>

            <input type="hidden" name="updateID" value="<?php echo $userArr['student_id'];?>">
            <div class="form-field-check">
                <input type="checkbox" name="" id="checkme" required>
                <label for="checkme">Save changes to profile</label>
            </div>
            <div class="form-field">
                <button type="submit" name="updateProfile">Update Profile</button>
            </div>
        </form>

        <form action="user-home.php" method="post" id="editTwo">
            <h3>Change Password</h3>
            <div class="form-field">
                <label for="pword">New Password <small>*</small></label>
                <input type="password" name="pword" id="pword" required>
            </div>
            <div class="form-field">
                <label for="cpw">Confirm Password <small>*</small></label>
                <input type="password" name="cpw" id="cpw" required>
            </div>

            <input type="hidden" name="updateID2" value="<?php echo $userArr['student_id'];?>">

            <div class="form-field">
                <button type="submit" name="updatePass">Update Password</button>
            </div>
        </form>
    </div>

    <?php include('../inc/user_footer.php');?>