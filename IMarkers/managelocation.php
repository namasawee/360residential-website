<!DOCTYPE html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>
	Image Marker
</title>
<link href="css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

		<script type="text/javascript" src="js/KBmapmarkers.js"></script>
		<script type="text/javascript" src="js/KBmapmarkersCords.js"></script>

		<link href="css/KBmapmarkers.css" rel="stylesheet">
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
			  src: url('thewitcher-4.ttf')  format('truetype')
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
h1 { text-align: center; margin-top: 120px; }
		</style>
	</head>
	<body>
     <form id="form_adduser" name="form_adduser" enctype="multipart/form-data" method="post" action="addlocation.php" >
    
    <div id="jquery-script-menu">
<div class="jquery-script-center">


     
<div>

<table width="703" border="0">
  <tr>
    <td width="124" align="right">&nbsp;ชื่อตำแน่ง :</td>
    <td width="425"><div> <input type="text" class="form-control" id="LName" name="LName" value="" ></div></td>
    <td width="140">&nbsp;</td>
  </tr>
  <tr>
    <td align="right">ตำแหน่ง X : </td>
    <td><input type="text" class="form-control" id="TX" name="TX" value="" > 
      Y : 
      <input type="text" class="form-control" id="TY" name="TY" value=""></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
    <button type="submit" name="submit" id="newsletter-submit" class="email_icon newsletter-submit button-contactForm">บันทึกตำแหน่ง</button>
   <button type="button" name="button" id="newsletter-submit" class="email_icon newsletter-submit button-contactForm">ยกเลิก</button>
    </td>
    <td>&nbsp;</td>
  </tr>
</table>

 
  
   
                           
</div>

<div class="jquery-script-clear"></div>
</div>
</div>

    
</form>


<h1>แผนผัง</h1>

		<section class="KBmap" id="KBtestmap">
		</section>

	</body>

	<script>

		var json =
		{
			"SUPASIN": {
				"cordX": "20",
				"cordY": "85",
				"icon": "map-marker.svg",
				"modal": {
					"title": "สุพศินn",
					"content": "<p>supasin<br />email: xxx@gmail.com<br />tel: 0880550400</p>"
				}
			},
			"mapMarker1": {
				"cordX": "54.25",
				"cordY": "18.59",
				"icon": "map-marker.svg",
				"modal": {
					"title": "Kaer Morhen",
					"content": "<p>Vesemir<br />email: vesemir@kaermorhen.pl<br />tel: 942 422 144</p>"
				}
			},
			"mapMarker2": {
				"cordX": "32.15",
				"cordY": "53.34",
				"icon": "map-marker.svg",
				"modal": {
					"title": "Wyzima",
					"content": "<p>Król Foltest<br />email: foltest@temeria.pl<br />tel: 654 342 674</p>"
				}
			},
			"mapMarker3": {
				"cordX": "49.93",
				"cordY": "53.93",
				"icon": "map-marker.svg",
				"modal": {
					"title": "Vengerberg",
					"content": "<p>Yennefer<br />email: yen@lozaczarodziejek.pl<br />tel: 864 464 743</p>"
				}
			},
			"mapMarker4": {
				"cordX": "19.85",
				"cordY": "72.73",
				"icon": "map-marker.svg",
				"modal": {
					"title": "Cintra",
					"content": "<p>Cirilla<br />email: ciri@cintra.pl<br />tel: 764 345 325</p>"
				}
			},
			"mapMarker5": {
				"cordX": "24.22",
				"cordY": "41.74",
				"icon": "map-marker.svg",
				"modal": {
					"title": "Novigrad",
					"content": "<p>Chapelle<br />email: chapelle@novigrad.pl<br />tel: 523 753 853</p>"
				}
			}
		};

		(function($) {

			$(document).ready(function(){

				//createKBmap('KBtestmap', 'mapa.jpg');
				createKBmap('KBtestmap', 'planhome.jpg');

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
		$('#TX').val(mousePositionElement(e).x);
		$('#TY').val(mousePositionElement(e).y);
	});
	});

	

</script>
</html>
