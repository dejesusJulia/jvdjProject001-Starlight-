<?php
    require('config/register.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway|Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fontawesome.com/icons/eye?style=solid">
    <script src="https://kit.fontawesome.com/83e68d843d.js" crossorigin="anonymous"></script>
</head>
<body>
    <section id="acc-choice">
        <div id="acc-choice-text">
            <h1>CHOOSE ACCOUNT TYPE</h1>
        </div>

        <div class="reg-container">
        <nav class="tab-choice">
            <div class="user selected">USER</div>
            <div class="admin">ADMIN</div>
        </nav>
        <div id="user" class="show">
            <form action="index_register.php" method="post">
                <!-- 1ST GROUP -->
               <div class="form-group-3">
                   <!-- Student Number -->
                    <div class="form-categ stunum" id="">
                        <label for="Student_num">Student Number</label>
                        <input type="text" name="usn" id="Student_num" placeholder="e.g., 2020-00000-ST-0" required>
                    </div>
                        <!-- Program List -->
                    <div class="form-categ" id="">
                        <label for="Program">Program</label>
                        <select name="upr" id="Program" required>
                            <option value="BBTE">Bachelor in Business Teacher Education</option>
                            <option value="BSA">Bachelor of Science in Accountancy</option>
                            <option value="BSECE">Bachelor of Science in Electronics and Communication Engineering</option>
                            <option value="BSEE">Bachelor of Science in Electrical Engineering</option>
                            <option value="BSEnt">Bachelor of Science in Entrepreneurship</option>
                            <option value="BSIE">Bachelor of Science in Industrial Engineering</option>
                            <option value="BSIT">Bachelor of Science in Information Technology</option>
                            <option value="BSP">Bachelor of Science in Psychology</option>
                            <option value="DICT">Diploma in Information and Communication Technology</option>
                            <option value="DOMT">Diploma in Office Management Technology</option>
                        </select>
                    </div>
                    <!-- Year & Section -->
                    <div class="form-categ" id="">
                        <label for="year_section">Year & Section</label>
                        <select name="uys" id="year_section" required>
                            <option value="1-1">Y1-S1</option>
                            <option value="1-2">Y1-S2</option>
                            <option value="2-1">Y2-S1</option>
                            <option value="2-2">Y2-S2</option>
                            <option value="3-1">Y3-S1</option>
                            <option value="3-2">Y3-S2</option>
                            <option value="4-1">Y4-S1</option>
                            <option value="4-2">Y4-S2</option>
                            <option value="5-1">Y5-S1</option>
                        </select>
                    </div>
                    
               </div>

               <!-- 2ND GROUP -->
               <div class="form-group-3">
                   <!-- Surname -->
                   <div class="form-categ">
                       <label for="Surname">Surname</label>
                       <input type="text" name="uln" id="Surname" required>
                   </div>
                   <!-- First Name -->
                   <div class="form-categ">
                       <label for="First_name">First Name</label>
                       <input type="text" name="ufn" id="First_name" required>
                   </div>
                   <!-- Middle Name -->
                   <div class="form-categ">
                       <label for="Middle_name">Middle Name </label>
                       <input type="text" name="umn" id="Middle_name" placeholder="(This field is optional)">
                   </div>
               </div>
                <!-- 3RD GROUP -->
               <div class="form-group-2">
                   <!-- Gender -->
                   <div class="form-categ">
                    <label for="gender">Gender</label>
                    <select name="ug" id="gender" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Others">Others</option>
                    </select>
                   </div>
                  <!-- Birthdate -->
                  <div class="form-categ">
                      <label for="Birthday">Birthdate</label>
                      <input type="date" name="ubday" id="Birthday" required>
                  </div>
               </div>

               <!-- 4TH GROUP -->
               <div class="form-group-2">
                   <!-- Email -->
                   <div class="form-categ">
                       <label for="email">Email</label>
                       <input type="email" name="uem" id="email" placeholder="please enter a valid email" required>
                   </div>
                   <!-- Password -->
                   <div class="form-categ">
                       <label for="password">Password</label>
                       <div class="passflex">
                        <input type="password" name="upw" id="user-pass" placeholder="enter 8 -15 characters" required>
                        <div id="showpassUser"> <i class="fas fa-eye"id="eye" id="eye" ></i> </div>
                       </div>
                   </div>
               </div>

               <div class="form-categ">
                   <input type="submit" value="REGISTER" name="user_submit" class="reg-btn" id="user-sub">
               </div>
            </form>
        </div>

        <!-- ADMIN -->
        <div id="admin">
            <form action="index_register.php" method="post">
                <!-- 1st group -->
                <div class="form-group-2">
                    <!-- student number -->
                    <div class="form-categ">
                        <label for="">Student Number</label>
                        <input type="text" name="asn" id="" placeholder="2020-00000-ST-0" required>
                    </div>
                    <!-- admin code --> 
                    <div class="form-categ">
                        <label for="">Admin Code</label>
                        <input type="text" name="acd" id="" placeholder="enter unique admin code" required>
                    </div>
                </div>
                <!-- 2nd group --> 
                <div class="form-group-2">
                    <!-- program --> 
                    <div class="form-categ">
                        <label for="">Program</label>
                        <select name="apr" id="" required>
                            <option value="BBTE">Bachelor in Business Teacher Education</option>
                            <option value="BSA">Bachelor of Science in Accountancy</option>
                            <option value="BSECE">Bachelor of Science in Electronics and Communication Engineering</option>
                            <option value="BSEE">Bachelor of Science in Electrical Engineering</option>
                            <option value="BSEnt">Bachelor of Science in Entrepreneurship</option>
                            <option value="BSIE">Bachelor of Science in Industrial Engineering</option>
                            <option value="BSIT">Bachelor of Science in Information Technology</option>
                            <option value="BSP">Bachelor of Science in Psychology</option>
                            <option value="DICT">Diploma in Information and Communication Technology</option>
                            <option value="DOMT">Diploma in Office Management Technology</option>
                        </select>
                    </div>
                    <!-- year_section --> 
                    <div class="form-categ">
                        <label for="">Year & Section</label>
                        <select name="ays" id="" required>
                            <option value="1-1">Y1-S1</option>
                            <option value="1-2">Y1-S2</option>
                            <option value="2-1">Y2-S1</option>
                            <option value="2-2">Y2-S2</option>
                            <option value="3-1">Y3-S1</option>
                            <option value="3-2">Y3-S2</option>
                            <option value="4-1">Y4-S1</option>
                            <option value="4-2">Y4-S2</option>
                        </select>
                    </div>
                </div>

                <!-- 3rd group --> 
                <div class="form-group-3">
                    <!-- last name -->
                    <div class="form-categ">
                        <label for="">Surname</label>
                        <input type="text" name="aln" id="" required>
                    </div>
                    <!-- first name --> 
                    <div class="form-categ">
                        <label for="">First Name</label>
                        <input type="text" name="afn" id="" required>
                    </div>
                    <!-- middle name --> 
                    <div class="form-categ">
                        <label for="">Middle Name</label>
                        <input type="text" name="amn" id="" placeholder="(This field is optional)">
                    </div>
                </div>
                <!-- 3rd group --> 
                <div class="form-group-2">
                    <!-- gender --> 
                    <div class="form-categ">
                        <label for="">Gender</label>
                        <select name="ag" id="" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                    <!-- birthday --> 
                    <div class="form-categ">
                        <label for="">Birthdate</label>
                        <input type="date" name="abday" id="" required>
                    </div>
                </div>
                <!-- 4th group --> 
                <div class="form-group-2">
                    <!-- email --> 
                    <div class="form-categ">
                        <label for="">Email</label>
                        <input type="email" name="aem" id="" required>
                    </div>
                    <!-- password --> 
                    <div class="form-categ">
                        <label for="">Password</label>
                        <div class="passflex">
                            <input type="password" name="apw" id="admin-pass" required>
                            <div id="showpassAdmin"> <i class="fas fa-eye"id="eye" id="eye" ></i> </div>
                        </div>
                    </div>
                </div>
                <div class="form-categ">
                    <input type="submit" value="SUBMIT" name="admin_submit" class="reg-btn" id="admin-sub"> 
                </div>
            </form>
        </div>
        </div>
    </section>
    <script src="js/reg.js"></script>
</body>
</html>