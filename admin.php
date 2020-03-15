<?php
ob_start();
putenv("error_reporting=E_ALL ^ E_NOTICE");
session_start();
error_reporting(0);
require_once("include/db_connect.php");


if($_COOKIE['Cuid'] == ""){ 
		header("Location: login.php");
	}
	
	
$mysqli = connect();
 $sql="SET CHARACTER SET UTF8";  
 query($sql);  
 
 

?>
<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>web 360 residential</title>
    <!-- <link rel="icon" href="img/favicon.png"> -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.php"> <img src="img/logonut1.png" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
 
                                 <li class="nav-item dropdown">
                                      <a class="nav-link dropdown-toggle " href="adduser.php" ><h3>ผู้ใช้งานระบบ</h3>
                                      </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
          				 <a class="dropdown-item" href="adduser.php?ADD=ADD">เพิ่มผู้ใช้งานระบบ</a>
                                    </div>
                                </li>
                                
                                  <li class="nav-item dropdown">
                                      <a class="nav-link dropdown-toggle " href="addplan.php" ><h3>จัดการสถานที่</h3>
                                      </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
          				 <a class="dropdown-item" href="addplan.php?ADD=ADD">เพิ่มสถานที่</a>
                                    </div>
                                </li>
                                
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_1"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <h3>กำหนดรูปภาพ(360)</h3>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                    <?php
									
			$sqlp="SELECT * FROM plan order by pid ASC"; 
			
			$qrp=select($sqlp); 
			$totalp=count($qrp); 
			$i=0; 
			if($totalp > 0){
	            while($i<count($qrp)) {
				$rsp=$qrp[$i];

?>
           <a class="dropdown-item" href="managelocation.php?pid=<?=$rsp['pid']?>"><?=$rsp['pname']?></a>
<?php

			$i++;
				}
			}
			?>
                                    </div>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php"><h3><font color = "red">ออกจากระบบ</font></h3></a>
                                </li>
                            </ul>
                        </div>
                      
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container ">
                
            </div>
        </div>
    </header>
    <!-- Header part end-->

<br><br><br><br><br><br><br>




     <form id="form_user" name="form_user" enctype="multipart/form-data" method="post" action="adduser.php" >
     
     
     <!-- Start Align Area -->
	<div class="whole-wrap">
		<div class="container box_1170">
        
<div align="center">
                <br><br><br><br><br><br>
					<h3 class="mb-30">หน้าต่างข้อมูลผู้ใช้งานระบบ</h3>	
				</div>
            <br><br><br><br><br><br>
		
		  <div class="button-group-area mt-10">
           
              </div>
              

        
		</div>
	</div>
    
    </form>
                    
	<!-- End Align Area -->
   

   <footer class="footer_part">
		<div class="container">
			<div class="row"></div>
			<hr>
			<div class="row">
				<div class="col-lg-8">
					<div class="copyright_text">
						<P><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved   <i class="ti-heart" aria-hidden="true"></i> by <a href="#" target="_blank">( xxx )</a>
</P>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="footer_icon social_icon">
						<ul class="list-unstyled">
							<li><a href="#" class="single_social_icon"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" class="single_social_icon"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#" class="single_social_icon"><i class="fas fa-globe"></i></a></li>
							<li><a href="#" class="single_social_icon"><i class="fab fa-behance"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>

    <!-- jquery plugins here-->
    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="js/masonry.pkgd.js"></script>
    <!-- particles js -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- slick js -->
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
</body>

</html>
