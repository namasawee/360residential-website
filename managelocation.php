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
<!DOCTYPE html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>
	Image Marker
</title>
<link href="IMarkers/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

		<script type="text/javascript" src="IMarkers/js/KBmapmarkers.js"></script>
		<script type="text/javascript" src="IMarkers/js/KBmapmarkersCords.js"></script>

		<link href="IMarkers/css/KBmapmarkers.css" rel="stylesheet">
        
        <script type="text/javascript">
			function chack(){
			
				 if(document.form_location2.T360Name.value == "") { 
						alert("กรุณากำหนดชื่อตำแหน่ง !!!");
						return false;
				  }
		  
			}
			
		</script>
        
<style>

			body{
			    overflow-x: hidden;
				background-color: #FFFFFF;
				color: #392c20;
				margin: 0px;
				font-family: 'Roboto';
			}

			@font-face {
			  font-family: 'witcher';
			  src: url('IMarkers/thewitcher-4.ttf') format('truetype')

			}

			.KBmap__markerTitle{
				font-family: witcher;
				color: #56270c;
			}
			.KBmap__mapContainer{
				height: 100vh;
				max-height: 100vh;
			}
			.KBmap__mapHolder{
				height: 100%;
			}
			.KBmap__mapHolder img{
			    width: auto;
	    		height: 100%;
			}
h1 { text-align: center; margin-top: 0px; }
		</style>
        
        
           <style>
  .drag_elm {
    width: 30px;
    height: 35px;
    background-image: url("lo1.png");
  }

  .snippet_item {
    display: block;
    padding: 5px;
    margin-bottom: 5px;
    width: 200px;
    cursor: move;
  }

  .main {
    width: 80%;
    margin: 0 ;
    height: 400px;
    border: 1px solid black;
  }
  .col {
      float: right;
      padding: 5px 5px 5px 5px;
      margin: 5px 5px 5px 5px;
  }
  #col1 {
      width: 200px;
      height: auto;
      border: 1px solid black;
  }
  #col2 {
      width:350px;
      height: auto;
      border: 1px solid black;
  }
  #droppable {
     width: 30px;
     height: 340px;
     border: 1px solid black;
 }
 .right {
      float: right;
  }
  .left {
      float: left;
  }
  #contextmenu
   {
    display: none;
    position: absolute;
    z-index: 10;
    padding: 12px 0;
    width: 370px;
    background-color: #fff;
    border: solid 1px #dfdfdf;
    box-shadow: 1px 1px 2px #cfcfcf;
  }

  ul
  {
    list-style-type:none;
    padding:5px;
    margin:0;
  }


  .primary-header {
    padding: 24px 0;
    text-align: center;
    border-bottom: solid 2px #cfcfcf;
  }

  .primary-header__title {
    color: #393939;
    font-size: 36px;
  }

  .primary-header__title small {
    font-size: 18px;
    color: #898989;
  }
  #closeButton {
    position: absolute;
    top: 0;
    right: 0;
}
.save {
  cursor: pointer;
  width: 100%;
  height: 80px;
  background-color: #4CAF50;
  text-align: center;font-size: 20px;
}

.save:hover {
  background-color: #A9DFBF;
}
.view {
  cursor: pointer;
  width: 100%;
  height: 80px;
  background-color: #3498DB  ;
  text-align: center;font-size: 20px;
}

.view:hover {
  background-color: #85C1E9 ;
}

.drophere {
  cursor: pointer;
  width: 100%;
  height: 80px;
  background-color: #FF8B8B;
}

.drophere:hover {
  background-color: #CB4335 ;
}
input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

</style>
    
    
	</head>
	<body>
    
    
    <div id="contextmenu">
<label for="head">เพิ่มพิกัดใหม่</label>
<br>
<button id="closeButton" >X</button>
<br>
<!--<form action="managelocation.php?pid=2" accept="image/gif, image/jpeg" target="_self">-->
<form id="form_location2" name="form_location2" enctype="multipart/form-data" method="post" action="managelocation.php?pid=<?=$_GET['pid']?>" onSubmit="return chack();" >

<label for="img">ชื่อตำแหน่ง : </label>
<input type="text" class="form-control" id="T360Name" name="T360Name" value="" >
<br><br>
<label for="img">ข้อความ : </label>
<textarea name="T360" id="T360" rows="3" cols="30"></textarea>

<br><br>
<label for="img">รูปตัวอย่าง (260x270)px : </label>
<input id="fileuploadAlls" name="fileuploadAlls" type="file" value="" />

<br>
<label for="img">รูป 360 : </label>
<input id="fileuploadAll" name="fileuploadAll" type="file" value="" />


<input type="hidden" class="form-control" id="TX" name="TX" value="" > 
<input type="hidden" class="form-control" id="TY" name="TY" value="">
      
      <input type="hidden" id="DataAct" name="DataAct" value="AddData" />
   <input type="hidden" id="pid" name="pid" value="<?=$_GET['pid']?>" />
    <input type="hidden" id="id" name="id" value="<?=$id?>" />
   
<div class="row">
    <input type="submit" value="Submit">
</div>
</form>

</div>


    <?php
	$structureAll = './img/360IMG/';
	$structureAlls = './img/360TITLE/';
	
	if($_POST['DataAct']=="AddData"){
		
	$fileAll = $_FILES['fileuploadAll']['name'];
	$typefileAll = $_FILES['fileuploadAll']['type']; 
	$sizefileAll = $_FILES['fileuploadAll']['size']; 
	
	$fileAlls = $_FILES['fileuploadAlls']['name'];
	$typefileAlls = $_FILES['fileuploadAlls']['type']; 
	$sizefileAlls = $_FILES['fileuploadAlls']['size']; 
	
	$raddAll = rand();

	$ntype = end( explode('.',$fileAll));
	$ntypes = end( explode('.',$fileAll));

	$tempfileAll = $structureAll.$raddAll.".".$ntype;
	$fileAllsave = $raddAll.".".$ntype;
	
	$tempfileAlls = $structureAlls.$raddAll.".".$ntypes;
	$fileAllsaves = $raddAll.".".$ntypes;
		
		if($fileAll != ""){			
			copy($_FILES['fileuploadAll']['tmp_name'],$tempfileAll);
		}else{
		 $fileAllsave = "";
		}
		
		if($fileAlls != ""){			
			copy($_FILES['fileuploadAlls']['tmp_name'],$tempfileAlls);
		}else{
		 $fileAllsaves = "";
		}
	
		$data1 = array(  
		"pid"=>$_POST['pid'],  
		"360Name"=>$_POST['T360Name'],
		"pointX"=>$_POST['TX'],  
		"pointY"=>$_POST['TY'],  
		"image360"=>$fileAllsave, 
		"imagetitle"=>$fileAllsaves, 
		"T360"=>$_POST['T360'],
		); 
	

					insert("img360",$data1);
					echo "<script language='javascript'>";
					echo "alert('+++ ระบบได้ทำการบันทึกข้อมูลเรียบร้อยแล้ว +++');";
					echo "</script>";

	

	}


	$sqlp="SELECT * FROM plan WHERE pid='".$_GET['pid']."'"; 
			
			$qrp=select($sqlp); 
			$totalp=count($qrp); 
			$i=0; 
			if($totalp > 0){
	            while($i<count($qrp)) {
					$rsp=$qrp[$i];
					$pid = $rsp['pid'];
					$pname = $rsp['pname'];
					$pimages = $rsp['pimages'];
				$i++;
				
				}
			}
			
			
			if($_GET['id'] != ""){
			
				$sqli="SELECT * FROM img360 WHERE id='".$_GET['id']."'"; 
				$qri=select($sqli); 
				$totali=count($qri); 
				$i=0; 
				if($totali > 0)
				{
					while($i<count($qri)) 
					{
						$rsi=$qri[$i];
						$id = $rsi['id'];
						$image360 = $rsi['image360'];
						$imagetitle = $rsi['imagetitle'];
					    $i++;
					}
				}
			}
			
			
			
			 	if($_GET['Del'] == "Del"){
	
					if($image360 != ""){
					 	unlink($structureAll.$image360);
					}	
					if($imagetitle != ""){
					 	unlink($structureAlls.$imagetitle);
					}	
				
	  				delete("img360","id='".$_GET['id']."'");
					echo "<script language='javascript'>";
					echo "alert('+++ ระบบได้ทำการลบข้อมูลเรียบร้อยแล้ว +++');";
					echo "</script>";
  				 }
			?>
	
<div>
<table width="246" border="0">
  <tr>
    <td width="91" align="center"><a href="addplan.php"><img src="img/ct-Orage.png" title="กลับไปยัง Page ก่อนหน้า"></a></td>
    <td width="145" align="left">ไปยัง Page ก่อนหน้า</td>
  </tr>
  </table>
</div>

<h1>กำหนดรูปมุมมอง 360 องศา( <?=$pname?> )<a href="addplan.php">
  
</a></h1>

		<section class="KBmap" id="KBtestmap">
		</section>

	</body>
    

	<script>

		var json =
		{
			<?php
			
				$sqlL="SELECT * FROM img360 WHERE pid='".$_GET['pid']."'"; 
				$qrL=select($sqlL); 
				$totalL=count($qrL); 
				$i=0; 
				if($totalL > 0)
				{
					while($i<count($qrL)) 
					{
						$rsL=$qrL[$i];
	
			?>
			"POINT<?=$i?>": {
				"cordX": "<?=$rsL['pointX']?>",
				"cordY": "<?=$rsL['pointY']?>",
				"icon": "I01.png",
				"modal": {
					"title": "<?=$rsL['360Name']?>",
					"content": "<p><a href='managelocation.php?Del=Del&pid=<?=$_GET['pid']?>&id=<?=$rsL['id']?>'><img src='img/Delete.png' width='20' height='20'></a>Delete <a href='managelocation.php?pid=<?=$_GET['pid']?>&id=<?=$rsL['id']?>'><a href='VIEW360.php?id=<?=$rsL['id']?>' target='_blank'><img src='img/360.png'></a> View <br> </p>"
				}
			},
			<?php
			 			$i++;
					}
				}
			?>
			
			
		};

		(function($) {

			$(document).ready(function(){

				//createKBmap('KBtestmap', 'mapa.jpg');
				createKBmap('KBtestmap', './img/PLANIMG/<?=$pimages?>');

				KBtestmap.importJSON(json);

				KBtestmap.showAllMapMarkers();

			});

		})(jQuery);

	</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();


$(function() {
	$("#KBtestmap").click(function(e) {
	  //alert("X: " + mousePositionElement(e).x + "  Y: " + mousePositionElement(e).y);
		
	//-----------
	$(document).on('contextmenu','.KBmap__mapHolder', function(e) {
     e.preventDefault();
      e.stopPropagation();
          $('#contextmenu').css({
              top:e.pageY + 'px',
              left:e.pageX + 'px'
          }).show();

		$('#TX').val(mousePositionElement(e).x);
		$('#TY').val(mousePositionElement(e).y);

      return false;
   });
  
  //------------------
		
		
	});
	});

	
	


  //close
  document.getElementById('closeButton').addEventListener('click', function(e) {
      e.preventDefault();
      this.parentNode.style.display = 'none';
  }, false);

</script>
</html>
