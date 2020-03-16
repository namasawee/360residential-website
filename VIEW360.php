<?php
ob_start();
putenv("error_reporting=E_ALL ^ E_NOTICE");
session_start();
error_reporting(0);
require_once("include/db_connect.php");	
$mysqli = connect();
 $sql="SET CHARACTER SET UTF8";  
 query($sql);  
 
 $structureAll = 'img/360IMG/';
 
 $sqlL="SELECT * FROM img360 WHERE id='".$_GET['id']."'"; 
				$qrL=select($sqlL); 
				$totalL=count($qrL); 
				$i=0; 
				if($totalL > 0)
				{
					while($i<count($qrL)) 
					{
						$rsL=$qrL[$i];
						$pid = $rsL['pid'];
						$Name = $rsL['360Name'];
						$ViewMIG360 = $rsL['image360'];
						$T360 = $rsL['T360'];
						$i++;
					}
				}
			
			
			
				$sqlp="SELECT * FROM plan WHERE pid='".$pid."'"; 
			
			$qrp=select($sqlp); 
			$totalp=count($qrp); 
			$i=0; 
			if($totalp > 0){
	            while($i<count($qrp)) {
					$rsp=$qrp[$i];
					$pimages = $rsp['pimages'];
				$i++;
				
				}
			}
                
 
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>360 VIEW (<?=$Name?>)</title>
		<meta charset="utf-8">
		


<style>

*{margin:0;padding:0;}

body{
  
  width:100%;
  height:100%;
  margin: 0; overflow: hidden; background-color: #000; 
  
}



                        

</style>

   
   
   
   <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
        /* Note: Try to remove the following lines to see the effect of CSS positioning */
        .affix {
            top: 0;
            width: 100%;
            z-index: 9999 !important;
        }

        .affix + .container-fluid {
            padding-top: 50px;
        }
        </style>       

  
  
  <style>
.image-container {
    position: relative;
    width: 200px;
    height: 100%;
}
.image-container .after {
    position: absolute;
    top: 0;
    left: 10;
    width: 100%;
    height: 100%;
    display: none;
    color: #FFF;
}
.image-container:hover .after {
    display: block;
    background: rgba(0, 0, 0, .6);
}
</style>

</head>                  

<body>

       <div id="sence" class="image-container">
      
        <div class="after">
        <br>
         <?php
		
         $sqlp="SELECT * FROM img360 WHERE pid='".$pid."'"; 
				$qrp=select($sqlp); 
				$totalp=count($qrp); 
				$i=0; 
				if($totalp > 0)
				{
					while($i<count($qrp)) 
					{
						$rsp=$qrp[$i];
				?>
        <center><a href="VIEW360.php?id=<?=$rsp['id']?>" target="_parent"><br><button type="button" class="btn btn-success"><span>ห้อง <?=$rsp['360Name']?></span>
		</button></a>
		</center>
        
        <?php
			$i++;
			}
	
		
		?>
        
        <br>
         <?php
	   	if($T360 != ""){
	   ?>
        <br>[ อุปกร์ภายใน ]
        <br><br>
        
        
        
		<?php
		 echo $T360;
			}
		 ?>
        <br><br>
        <div align="center">
        <img src="img/PLANIMG/<?=$pimages?>" width="180" height="230" >
        </div>
        
        </div>
		<?php } ?>
       </div>
 
  
</body>


    <script src="js/three.min.js"></script>
	<script src="js/OrbitControls.js"></script>	
	<script src="js/Detector.js"></script>		
	<script>

		var webglEl = document.getElementById('sence');

		var width  = window.innerWidth,
			height = window.innerHeight;

		var scene = new THREE.Scene();

		var camera = new THREE.PerspectiveCamera(75, width / height, 1, 1000);
		camera.position.x = 0.1;

		var renderer = Detector.webgl ? new THREE.WebGLRenderer() : new THREE.CanvasRenderer();
		renderer.setSize(width, height);

		var sphere = new THREE.Mesh(
			new THREE.SphereGeometry(100, 20, 20),
			new THREE.MeshBasicMaterial({
				map: THREE.ImageUtils.loadTexture('<?=$structureAll.$ViewMIG360?>')
			})
		);
		sphere.scale.x = -1;
		scene.add(sphere);

		var controls = new THREE.OrbitControls(camera);
		controls.noPan = true;
		controls.noZoom = true; 
		controls.autoRotate = true;
		controls.autoRotateSpeed = 0.5;
		//controls.rotateLeft(3);
		controls.rotateUp(.5);

		webglEl.appendChild(renderer.domElement);

		render();

		function render() {
			controls.update();
			requestAnimationFrame(render);
			renderer.render(scene, camera);
		}

		function onMouseWheel(event) {
			event.preventDefault();
			
			if (event.wheelDeltaY) { // WebKit
				camera.fov -= event.wheelDeltaY * 0.05;
			} else if (event.wheelDelta) { 	// Opera / IE9
				camera.fov -= event.wheelDelta * 0.05;
			} else if (event.detail) { // Firefox
				camera.fov += event.detail * 1.0;
			}

			camera.fov = Math.max(40, Math.min(100, camera.fov));
			camera.updateProjectionMatrix();
		}

		document.addEventListener('mousewheel', onMouseWheel, false);
		document.addEventListener('DOMMouseScroll', onMouseWheel, false);

	</script>
    
    
     <script src="http://getbootstrap.com/2.3.2/assets/js/jquery.js"></script>
        <script src="/bootstrap/js/bootstrap.min.js"></script>
        
</html>
    