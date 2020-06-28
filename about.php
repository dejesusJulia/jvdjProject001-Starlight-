<?php
session_start();
if(empty($_SESSION['id'])){
    // print_r($_SESSION['id']);
    header("Location: /index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About</title>
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Raleway|Roboto+Condensed&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/about.css">
</head>
<body>
    <!--HEADER/NAVIGATION PANE-->
    <header id="start-header" class="sticky">
      <div class="wrapper">
        <nav id="start-nav">
          <!--LOGO-->
          <a href="index.html" class="navbar-brand">
            <i class="icon ion-md-star"></i>
        </a>
        <!--NAVIGATION-->
          <ul class="nav-list">
            <li class="nav-item"> <a href="#" class="nav-link">HOME</a></li>

            <li class="nav-item"> <a href="#" class="nav-link">ABOUT</a></li>

            <li class="nav-item"> <a href="#" class="nav-link">SIGN OUT</a> </li>
          </ul>
            <!--HAMBURGER MENU-->
            <div class="hamburger">
              <span class="line"></span>
              <span class="line"></span>
              <span class="line"></span>
          </div>
        </nav>
      </div>
    </header><!--END OF HEADER/NAVIGATION PANE-->

    <!--MAIN CONTENT-->
  <div class="content">
    <section class="cream">
      <div class="about-wrap">
        <div class="intro">
          <h2>ABOUT US</h2>
          <div id="small">WHAT WE DO</div>
          <p>Starlight Finances is a experimental web application created to help students of Computer Society to improve organizational financial management. This system gives reminders and presents summary of fees to financial managers of an organization and its members. Treasurers and auditors will be able to organize fees and expenses more effectively. Members will be reminded and given a list of bills to pay.</p>
          <p>Starlight Group, the rookie development team behind the web application, originally intended to create the system for their class, BSIT 2-2. The team continues studying and training in full stack web development so that they can improve and innovate the system more.</p>
        </div>
      </div>
    </section>
    

    <div class="pimg1"></div>
    <section class="cream">
      <div class="about-wrap">
        <div class="flexbox-person">
          <div class="pic-wrap"><img src="images/glenn.jpg" width="300px" class="img-wrap"></div>
          <div class="textwrap">
            <h2>Glenn Rito</h2>
          <p>Glenn is the project manager and requirements analyst. He is responsible for planning, execution and monitoring of the whole project. While he does full stack web development, Glenn specializes in the server side.</p>
          </div>
        </div>
    </div>
    </section>
    

    <div class="pimg2"></div>

    <div class="dark">
      <div class="about-wrap">
        <div class="flexbox-person">
          <div class="pic-wrap"> <img src="images/josh.jpg" width="300px" class="img-wrap"> </div>
          <div class="textwrap">
            <h2>Mar Joshua Bathan</h2>
          <p>Joshua leads the team in back end web development. Both he and Glenn specializes in the server side, though they are still both involved in UI development.</p>
          </div>
        </div>
      </div>
    </div>
  
    <div class="pimg3"></div>

    <div class="cream">
      <div class="about-wrap">
        <div class="flexbox-person">
          <div class="pic-wrap"> <img src="images/juls.jpg" width="300px" class="img-wrap"> </div>
          <div class="textwrap">
            <h2>Julia De Jesus</h2>
          <p>Julia serves as the team's web administrator. She is responsible in maintaining the website's content and design; and for keeping them fresh, backed up, and functional. Although she does full stack, she specializes in UI design.</p>
          </div>
        </div>
      </div>
    </div>
   

    <div class="pimg4"></div>

    <div class="dark">
      <div class="about-wrap">
        <div class="flexbox-person">
          <div class="pic-wrap"><img src="images/karla.jpg" width="300px" class="img-wrap"></div>
          <div class="textwrap">
            <h2>Karla Guia</h2>
          <p>Karla is the team's UX designer. She focuses on making the website functional. She mostly does collaboration with Julia and Jane because they specialize in the client side development</p>
          </div>
        </div>
    </div>
    </div>
    
    <div class="pimg5"></div>
    <div class="cream">
      <div class="about-wrap cream">
        <div class="flexbox-person">
          <div class="pic-wrap"><img src="images/jane.jpg" width="300px" class="img-wrap"></div>
          <div class="textwrap">
            <h2>Jane Eimeren Nalda</h2>
          <p>Jane, along with Karla specializes in the UX design. They make sure the website is functional and user-friendly. She collaborates with Karla and Julia in client side development.</p>
          </div>
        </div>
    </div>
    </div>

    <div class="space"></div>
  </div>
    

    <!--FOOTER-->
    <div class="push fill-in"></div>
     <footer id="footer">
       <div id="explore">
         <h3 class="title">Explore</h3>
         <ul id="list">
             <li><a href="#">Home</a></li>
             <li><a href="#">About</a></li>
             <li><a href="index.html">Sign Out</a></li>
         </ul>
     </div>
     <div id="contact">
         <h3 class="title">Contact Us</h3>
         <ul id="list">
         <li><a href="#">sfg@gmail.com</a></li>
         <li><a href="#">name@email.com</a></li>
     </div>
     <div id="starlight">
         <li class="star"><h2>Starlight Finances</h2></li>
         <li>Tagline Here </li>
         <li>All Rights Reserved &copy;2020</li>
     </div>

       </div>
     </footer>
  <script src="js/main.js"></script>
    
</body>
</html>