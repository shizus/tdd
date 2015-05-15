<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- Apple devices fullscreen -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Apple devices fullscreen -->
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />

	<title>Taller de Diseño</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- icheck -->
	<link rel="stylesheet" href="css/plugins/icheck/all.css">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Color CSS -->
	<link rel="stylesheet" href="css/themes.css">


	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>

	<!-- Nice Scroll -->
	<script src="js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
	<!-- Validation -->
	<script src="js/plugins/validation/jquery.validate.min.js"></script>
	<script src="js/plugins/validation/additional-methods.min.js"></script>
	<!-- icheck -->
	<script src="js/plugins/icheck/jquery.icheck.min.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/eakroko.js"></script>

	<!--[if lte IE 9]>
		<script src="js/plugins/placeholder/jquery.placeholder.min.js"></script>
		<script>
			$(document).ready(function() {
				$('input, textarea').placeholder();
			});
		</script>
	<![endif]-->


<script type="text/javascript">
$(document).ready(function() {
// Create two variable with the names of the months and days in an array
var monthNames = <?php echo json_encode($this->months); ?>; 
var dayNames= <?php echo json_encode($this->wday); ?>;

// Create a newDate() object
var newDate = new Date();
// Extract the current date from Date object
newDate.setDate(newDate.getDate());
// Output the day, date, month and year    
$('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

var minutes = new Date().getMinutes();
// Add a leading zero to the minutes value
$("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
var hours = new Date().getHours();
// Add a leading zero to the hours value
$("#hours").html(( hours < 10 ? "0" : "" ) + hours);
	
setInterval( function() {
	// Create a newDate() object and extract the minutes of the current time on the visitor's
	var minutes = new Date().getMinutes();
	// Add a leading zero to the minutes value
	$("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
    },1000);
	
setInterval( function() {
	// Create a newDate() object and extract the hours of the current time on the visitor's
	var hours = new Date().getHours();
	// Add a leading zero to the hours value
	$("#hours").html(( hours < 10 ? "0" : "" ) + hours);
    }, 1000);
	
}); 
function borrarSlide(id){
}
	
function borrarSlide(id) {
  if (confirm('Desea borrar este slide?')){   
		jQuery.post('Cpanel.php?op=6',{'id':id},function(data){
				$('#list_'+id).remove();
		});
	}
}
</script>
	

</head>
<body class='login'>
	<div id="navigation">
		<div class="container-fluid">
			
				<h1>
				<img src="../images/logo.png" alt=""/>
				</h1>
				<h2>
				Panel Administrador
				</h2>
		</div>
			<div class="infoBar">
				<span id="Date"></span> 
				<span id="hours"></span>:<span id="min"></span>hs
			</div>
	</div>
	<div class="wrapper">
		<h1>
		</h1>
		<div class="gradientLine">
		<div class="login-body">
			<h2>Iniciar sesi&oacute;n</h2>
		
			<form action="?a=usr&t=dologin" method='post' class='form-validate' id="test">
				<div class="form-group">
					<div class="email controls">
						<input type="text" name='user' placeholder="Usuario" class='form-control'>
					</div>
				</div>
				<div class="form-group">
					<div class="pw controls">
						<input type="password" name="password" placeholder="Clave" class='form-control'>
					</div>
				</div>
				<div class="submit" align="right">
					<button type="submit" value="INGRESAR">Ingresar</button>
				</div>
			</form>
			</div>
		</div>
	</div>
</body>

</html>
