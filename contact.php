<?php
ob_start();
putenv("error_reporting=E_ALL ^ E_NOTICE");
session_start();
error_reporting(0);
require_once("include/db_connect.php");

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
                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php"><h3>หน้าหลัก</h3></a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_1"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <h3>  สถานที่</h3>
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
           <a class="dropdown-item" href="index.php?pid=<?=$rsp['pid']?>"><?=$rsp['pname']?></a>
<?php

			$i++;
				}
			}
			?>

                                    </div>
                                </li>
                                
                                <li class="nav-item dropdown">
                                      <a class="nav-link dropdown-toggle " href="index2.php" ><h3>360 View</h3>
                                      </a>
                                  
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="contact.php"><h3>ติดต่อเรา</h3></a>
                                </li>

                                <li class="nav-item">
                                <?php
								if($_COOKIE['Cuid'] != ""){ 
									?>
                                     <a class="nav-link" href="adduser.php"><h3><font color = "red">ผู้ดูแลระบบ</font></h3></a>
                                    <?php }else{ ?>
                                       <a class="nav-link" href="login.php"><h3><font color = "red">เข้าสู่ระบบ</font></h3></a>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                   </nav>
                   
                        </div>
                    
                </div>
            </div>
        </div>
        <div class ="container p-3 my-3 " >
        <h1>Contact</h1><br>
        Facebook : Nut namasawee (นัท)   เบอร์โทร : 0946501881    <br> Facebook : F'Few surasie (ฟิว) เบอร์โทร : 081234567
        <!-- <br><br> เบอร์โทร :  0946501881 <br>เบอร์โทร :  081234567 -->
        </div>
        <div class ="container"><img src ="nut.jpg" width ="400" height ="400">
        <img src ="few.jpg" width ="400" height ="400">
        </div>
    </header>
    <!-- Header part end-->

    

  

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
