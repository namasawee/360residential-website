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
 
  
 $structureAll = './img/PLANIMG/';
 $structureAlls = './img/PLANTITLE/';
 
 
 $sql="SELECT * FROM plan WHERE pid='".$_GET['pid']."'"; 
$qr=select($sql); 
$total=count($qr); 
$i=0; 
			if($total > 0){
	            while($i<count($qr)) {
				$rs=$qr[$i];
					$pimages =$rs['pimages']; 
					$Pshowimage =$rs['Pshowimage']; 
					$Ptext =$rs['Ptext']; 
					$i++;
				}
			}
			
   if($_GET['Del'] == "Del"){
	
		if($pimages != ""){
	          unlink($structureAll.$pimages);
	      }	
		  if($Pshowimage != ""){
			  unlink($structureAlls.$Pshowimage);
	      }	
	  delete("plan","pid='".$_GET['pid']."'");
					echo "<script language='javascript'>";
					echo "alert('+++ ระบบได้ทำการลบข้อมูลเรียบร้อยแล้ว +++');";
					echo "</script>";
   }
   
   

if($_POST['DataAct']=="AddData"){
	
	$fileAlls = $_FILES['fileuploadAlls']['name'];
	$typefileAlls = $_FILES['fileuploadAlls']['type']; 
	$sizefileAlls = $_FILES['fileuploadAlls']['size']; 
	
	$fileAll = $_FILES['fileuploadAll']['name'];
	$typefileAll = $_FILES['fileuploadAll']['type']; 
	$sizefileAll = $_FILES['fileuploadAll']['size']; 
	$raddAll = rand();

	$ntypes = end( explode('.',$fileAlls));
	$ntype = end( explode('.',$fileAll));


	$tempfileAlls = $structureAlls.$raddAll.".".$ntypes;
	$fileAllsaves = $raddAll.".".$ntypes;
	
	$tempfileAll = $structureAll.$raddAll.".".$ntype;
	$fileAllsave = $raddAll.".".$ntype;
	
if($_POST['pid'] == ""){
		
		
		if($fileAlls != ""){			
		copy($_FILES['fileuploadAlls']['tmp_name'],$tempfileAlls);
		}else{
		 $fileAllsaves = "";
		}
		if($fileAll != ""){			
		copy($_FILES['fileuploadAll']['tmp_name'],$tempfileAll);
		}else{
		 $fileAllsave = "";
		}
	
	
		$data1 = array(  
		"pname"=>$_POST['pname'],  
		"pimages"=>$fileAllsave,  
		"Pshowimage"=>$fileAllsaves,
	    "Ptext"=>$_POST['Ptext'], 
		"aid"=>$_COOKIE['Caid'],
		); 
					insert("plan",$data1);
					echo "<script language='javascript'>";
					echo "alert('+++ ระบบได้ทำการบันทึกข้อมูลเรียบร้อยแล้ว +++');";
					echo "</script>";

	}else{



		$data2 = array(  
		"pname"=>$_POST['pname'],   
		"Ptext"=>$_POST['Ptext'], 
		); 
	    update("plan",$data2,"pid='".$_POST['pid']."'"); 
		
		
		if($fileAll != ""){
			
			if($_POST['pimages'] != ""){
				  unlink($structureAll.$_POST['pimages']);
			  }	
			  copy($_FILES['fileuploadAll']['tmp_name'],$tempfileAll);
			  
			$data4 = array(  
			"pimages"=>$fileAllsave, 
			);
			
			update("plan",$data4,"pid='".$_POST['pid']."'"); 
		}
		
		if($fileAlls != ""){
		
		 if($_POST['Pshowimage'] != ""){
			  unlink($structureAlls.$_POST['Pshowimage']);
	      }	
		  $data3 = array(  
			"Pshowimage"=>$fileAllsaves, 
			);
		  copy($_FILES['fileuploadAlls']['tmp_name'],$tempfileAlls);
			update("plan",$data3,"pid='".$_POST['pid']."'"); 
		}
		


		echo "<script language='javascript'>";
		echo "alert('+++ ระบบได้ทำการบันทึกแก้ไขข้อมูลเรียบร้อยแล้ว +++');";
		echo "</script>";
		

	}
	
	
}
	
	
	
	if($_GET['pid'] != ""){
	 
$sql="SELECT * FROM plan WHERE pid='".$_GET['pid']."'"; 

$qr=select($sql); 
$total=count($qr); 
$i=0; 
			if($total > 0){
	            while($i<count($qr)) {
				$rs=$qr[$i];
			   
			$pid = $rs['pid'];
			$pname = $rs['pname'];
			$pimages =$rs['pimages']; 
			$Pshowimage =$rs['Pshowimage']; 
			$Ptext =$rs['Ptext']; 
		
		
			$i++;
				}
			}
	
	
	}else{
	
	$pid = "";
	$pname =  "";
		$pimages = "";
		$Pshowimage = "";
		$Ptext = ""; 
	
	}
	
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
									  <?php if($_COOKIE['Culevel'] == "Y"){?>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
          				 <a class="dropdown-item" href="adduser.php?ADD=ADD">เพิ่มผู้ใช้งานระบบ</a>
                                    </div>
									  <?php } ?>
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
									
			$sqlp="SELECT * FROM plan WHERE aid='".$_COOKIE['Caid']."' order by pid ASC"; 
			
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
<!-- Start Align Area -->

     <form id="form_plan" name="form_plan" enctype="multipart/form-data" method="post" action="addplan.php" >
	<div class="whole-wrap">
		<div class="container box_1170">
        
         <?php
		   	if($_GET['ADD'] == "ADD"){
		   ?> 
        
		  <div class="section-top-border">
			<div class="row">
				<div class="col-lg-8 col-md-8">
					<h3 class="mb-30">เพิ่มข้อมูลสถานที่</h3>
                    
                    <div class="mt-10">
							<input type="text" name="pname" placeholder="ชื่อสถานที่"
								onfocus="this.placeholder = ''" onblur="this.placeholder = 'ชื่อสถานที่'" required
								class="single-input" value="<?=$pname?>">
						</div>
                        <br>
                        <div class="mt-10">
							<input type="text" name="Ptext" placeholder="คำอธิบาย"
								onfocus="this.placeholder = ''" onblur="this.placeholder = 'คำอธิบาย'" required
								class="single-input" value="<?=$Ptext?>">
						</div>
                        <br>
                     <div class="mt-10">
							 รูปตัวอย่างสถานที่ (500x350)px : 
							   <input id="fileuploadAlls" name="fileuploadAlls" type="file" value="" />
				        <span class="button-group-area mt-10">
						       <input type="hidden" id="Pshowimage" name="Pshowimage" value="<?=$Pshowimage?>" />
				       </span></div><br>
                    
                     <div class="mt-10">
							 รูปแปลนสถานที่ : 
							   <input id="fileuploadAll" name="fileuploadAll" type="file" value="" />
				        <span class="button-group-area mt-10">
						       <input type="hidden" id="pimages" name="pimages" value="<?=$pimages?>" />
				       </span></div>
						
					
				</div>
				
			</div>
		</div>
		  <div class="button-group-area mt-10">
            <input type="submit" name="submit" value="บันทึก" class="genric-btn primary-border e-large" />
           <a href="addplan.php" class="genric-btn success-border e-large">ยกเลิก</a>
           <input type="hidden" id="DataAct" name="DataAct" value="AddData" />
           <input type="hidden" id="pid" name="pid" value="<?=$_GET['pid']?>" />
           
              </div>
        <?php } ?>
        
		  <div class="section-top-border">
		  
				<div class="progress-table-wrap">
					<div class="progress-table">
						<div class="table-head">
							<div class="country">ชื่อสถานที่</div>
							<div class="country">ชื่อรูปแสดงหน้าหลัก</div>
							<div class="visit">ชื่อรูปแปลน</div>
							<div class="percentage"></div>
						</div>
                     
           
                        <?php
		    $sqls="SELECT * FROM plan WHERE aid='".$_COOKIE['Caid']."' ORDER BY pid ASC"; 
			$qrs=select($sqls); 
			$totals=count($qrs); 
			$i=0; 
			
			if($totals > 0){
	          
	          while($i<count($qrs)) {
				$rss=$qrs[$i];
	          
	          ?>
						<div class="table-row">
							<div class="country"><?=$rss['pname']?></div>
							<div class="country"><?=$rss['Pshowimage']?></div>
							<div class="visit"><?=$rss['pimages']?></div>
							<div class="percentage">
								<a class="btn btn-info" href="addplan.php?ADD=ADD&pid=<?=$rss['pid']?>" title="แก้ไขข้อมูล">
                <i class="glyphicon glyphicon-edit icon-white"></i>แก้ไข </a>
            <a class="btn btn-danger" href="addplan.php?Del=Del&pid=<?=$rss['pid']?>" onClick="javascript:return confirm('คุณแน่ในแล้วหรือว่าต้องการลบข้อมูล : <?=$rss['pname']?> !!!')" title="ลบข้อมูล">
                <i class="glyphicon glyphicon-trash icon-white"></i>ลบ</a>
                
							</div>
						</div>
		
        <?php
		$i++;
	 } 
	 ?>
     
      <?php
	      
	      }else{
	      
	      echo "ไม่พบข้อมูล !!!";
	      
	      }
		  
	      ?>
        
						
					</div>
				</div>
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
