<?php
session_start();
$connect = mysqli_connect('localhost','root','','expenses');
if($connect){
	?>
	<script>
	alert('connection established');
	</script>
	<?php
}else{
	echo 'error';
}


?>
